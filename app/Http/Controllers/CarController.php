<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCarRequest;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::orderBy('id', 'DESC');

        if (Auth::user()->name === 'admin') {
            $cars->withTrashed();
        };
        $cars = $cars->with('brand', 'tags')->get();

        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        $brands = Brand::orderBy('title')->pluck('title', 'id');
        $tags = Tag::orderBy('title')->pluck('title', 'id');
        return view('cars.create', compact('brands', 'tags'));
    }

    public function store(SaveCarRequest $request)
    {
        $data = $this->dataWithImage($request);

        DB::transaction(function () use ($data, &$car) {
            $car = Car::create($data->except('tags')->toArray());
            $car->tags()->sync($data->get('tags'));
        });

        return redirect(route('cars.index'))->with('flash_message', __(
            'notification.cars.added',
            ['name' => $car->brand->title . ' ' . $car->model]
        ));
    }

    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    public function edit(Car $car)
    {
        $brands = Brand::orderBy('title')->pluck('title', 'id');
        $tags = Tag::orderBy('title')->pluck('title', 'id');
        return view('cars.edit', compact('car', 'brands', 'tags'));
    }

    public function update(SaveCarRequest $request, Car $car)
    {
        $data = $this->dataWithImage($request);

        DB::transaction(function () use ($data, $car) {
            $car->update($data->except('tags')->toArray());
            $car->tags()->sync($data->get('tags'));
            // $car->save();
        });

        return redirect(route('cars.show', $car->id))->with('flash_message', __(
            'notification.cars.updated',
            ['name' => $car->brand->title . ' ' . $car->model]
        ));
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect(route('cars.index'))->with('flash_message', __(
            'notification.cars.deleted',
            ['name' => $car->fullName()]
        ));
    }

    public function beforeDestroy(string $id)
    {
        $car = Car::withTrashed()->findOrFail($id);
        if ($car->trashed()) {
            Car::where('id', $id)->onlyTrashed()->forceDelete();
            return redirect(route('cars.index'))->with('flash_message', __(
                'notification.cars.force-deleted',
                ['name' => $car->fullName()]
            ));
        }
        return view('cars.delete', compact('car'));
    }

    public function restore(string $id)
    {
        $car = Car::onlyTrashed()->findOrFail($id);
        $car->restore();
        return redirect(route('cars.index'))->with('flash_message', __(
            'notification.cars.restored',
            ['name' => $car->fullName()]
        ));
    }
    private function dataWithImage(SaveCarRequest $request)
    {
        $path = '';

        if ($request->file('imagefile')) {
            $path = Storage::putFile('uploads', $request->file('imagefile'));
        }

        $data = collect($request->validated() + ['image' => $path]);

        return $data;
    }

}

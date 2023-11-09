<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('id','desc')->get();
        return view('brands.index', compact('brands'));
    }

    public function create()
    {
        return view('brands.create');
    }

    public function store(SaveBrandRequest $request)
    {
        $brand = Brand::create($request->validated());
        return redirect(route('brands.show', $brand->id))->with('flash_message', __(
            'notification.brands.added',
            ['name' => $brand->title]
        ));
    }

    public function show(Brand $brand)
    {
        return view('brands.show', compact('brand'));
    }

    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));
    }

    public function update(SaveBrandRequest $request, Brand $brand)
    {
        $brand->update($request->validated());
        $brand->save();

        return redirect(route('brands.show', $brand->id))->with('flash_message', __(
            'notification.brands.updated',
            ['name' => $brand->title]
        ));
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect(route('brands.index'))->with('flash_message', __(
            'notification.brands.deleted',
            ['name' => $brand->title]
        ));
    }

    public function beforeDestroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('brands.delete', compact('brand'));
    }
}

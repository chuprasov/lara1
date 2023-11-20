<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Car;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->isMethod('post') && $request->file('userfile')) {

            $path = Storage::putFile('uploads', $request->file('userfile'));

            $car = Car::findOrFail($request->id);
            $car->update(['image' => $path]);

            return redirect()->back();
        }
    }
}

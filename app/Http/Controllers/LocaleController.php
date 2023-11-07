<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function setLocale(string $locale)
    {
        $locales = array_keys(config('app-cars.locales'));

        if (!in_array($locale, $locales)) {
            $locale = config('app.locale');
        }

        // dd($locale);

        session(['locale' => $locale]);
        app()->setlocale($locale);

        return redirect()->back();
    }
}

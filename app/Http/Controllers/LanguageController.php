<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function changeLang($locale){
        if (! in_array($locale, ['en', 'np'])) {
            abort(404);
        }

        session()->put('applocale', $locale);
    }
}

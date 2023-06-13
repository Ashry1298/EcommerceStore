<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function changeLang($lang)
    {
        $lang == 'en' ? $lang = 'ar' : $lang = 'en';
        App::setLocale($lang);
        session()->put('lang', $lang);
        return redirect()->back();
    }
}

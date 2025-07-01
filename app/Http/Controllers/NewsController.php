<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function indexAppWaliSantri()
    {
        return view('news.index-app-wali-santri');
    }
}

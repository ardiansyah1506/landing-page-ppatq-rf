<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GaleriController extends Controller
{
    public function index(){
        $queryGaleri = DB::table('galeri')
        ->inRandomOrder()
        ->get();

        $data = [
            'galeri' => $queryGaleri,
        ];

        return view('galeri.index', $data);
    }
}

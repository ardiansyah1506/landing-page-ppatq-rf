<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GaleriFasilitasController extends Controller
{
    public function index(){
        $queryGaleri = DB::table('galeri')
        ->inRandomOrder()
        ->get();

        $queryFasilitas = DB::table('fasilitas')
        ->inRandomOrder()
        ->get();

        $data = [
            'galeri' => $queryGaleri,
            'fasilitas' => $queryFasilitas,
        ];

        return view('galeri-fasilitas.index', $data);
    }
}

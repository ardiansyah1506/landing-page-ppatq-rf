<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Crypt;

class GaleriFasilitasController extends Controller
{
    public function index(){
        $queryGaleri = DB::table('galeri')
        ->inRandomOrder()
        ->get()
        ->map(function ($item) {
            $item->id = Crypt::encryptString($item->id . "ppatq");
            return $item;
        });

        $queryFasilitas = DB::table('fasilitas')
        ->inRandomOrder()
        ->get()
        ->map(function ($item) {
            $item->id = Crypt::encryptString($item->id . "ppatq");
            return $item;
        });

        $data = [
            'galeri' => $queryGaleri,
            'fasilitas' => $queryFasilitas,
        ];

        return view('galeri-fasilitas.index', $data);
    }
}

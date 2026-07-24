<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CekSantriController extends Controller
{
    public function index()
    {
        return view('cek-santri.index');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'tanggal_lahir' => 'required|date',
            'kelas_santri' => 'required|string',
        ]);

        $data = [
            'tanggal_lahir' => $request->tanggal_lahir,
            'kelas_santri' => $request->kelas_santri,
        ];

        return view('cek-santri.index', compact('data'));
    }
}

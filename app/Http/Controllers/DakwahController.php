<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class DakwahController extends Controller
{
    public function detail($idEnkripsi)
    {
        try {
            $idAsli = Crypt::decryptString($idEnkripsi);
            $idDakwah = str_replace("ppatq", "", $idAsli);

            $data = DB::table('dakwah')
                ->where('dakwah.id', $idDakwah)
                ->first();
            
            if ($data) {
                $data->idEnkripsi = Crypt::encryptString($data->id . "ppatq");
            }

            $dataList = DB::table('dakwah')
                ->whereNull('dakwah.deleted_at')
                ->where('dakwah.id', '!=', $idDakwah)
                ->latest()
                ->limit(4)
                ->get()
                ->map(function ($item) {
                    $item->idEnkripsi = Crypt::encryptString($item->id . "ppatq");
                    return $item;
                });
    
            if (!$data) {
                return response()->json(['error' => 'Dakwah tidak ditemukan'], 404);
            }
            return view('dakwah.detail', compact('data','dataList'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

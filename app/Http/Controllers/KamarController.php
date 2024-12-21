<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class KamarController extends Controller
{
    public function index(){
        $tahunAjaran = DB::table('ref_tahun_ajaran')->latest()->first();

        $data = DB::table('ref_kamar')
            ->select(
                'ref_kamar.*',
                'employee_new.nama AS guru_murroby'
            )
            ->orderByRaw("CAST(SUBSTRING_INDEX(code, 'a', 1) AS UNSIGNED) ASC, code ASC")
            ->leftJoin('employee_new', 'ref_kamar.employee_id', '=', 'employee_new.id')
            ->whereIn('ref_kamar.id', function ($query) use ($tahunAjaran) {
                $query->select('kamar_id')
                    ->from('santri_kamar')
                    ->where('tahun_ajaran_id', $tahunAjaran->id);
            })
            ->get();

        return view('kamar.index', ['data' => $data]);
    }

    public function show($id){

        $tahunAjaran = DB::table('ref_tahun_ajaran')->latest()->first();

        $dataKamar = DB::table('ref_kamar')
        ->leftJoin('employee_new', 'ref_kamar.employee_id', '=', 'employee_new.id')
        ->where('ref_kamar.id', '=', $id)
        ->select(
            'employee_new.nama AS nama_murroby',
            'employee_new.photo AS foto_murroby',
            'ref_kamar.name AS nama_kamar'
        )
        ->first();

        $queryKamar = DB::table('santri_kamar')
        ->select(
            'santri_kamar.*',
            'santri_detail.nama AS namaSantri', 
            'santri_detail.photo AS fotoSantri', 
            'santri_detail.kelas AS kelasSantri', 
            'santri_detail.kecamatan AS asalSantri',
            'ref_kelas.code AS nama_kelas',
            'employee_new.nama AS guru_murroby',
            'ref_kamar.employee_id AS kamar_employee_id',  // Alias to differentiate
            'ref_kelas.employee_id AS kelas_employee_id',
            'ref_tahfidz.name AS kelasTahfidz'
            )
        ->leftJoin('santri_detail', 'santri_kamar.santri_id', '=', 'santri_detail.id')
        ->leftJoin('ref_tahfidz', 'santri_detail.tahfidz_id', '=', 'ref_tahfidz.id')
        ->leftJoin('ref_kamar', 'santri_kamar.kamar_id', '=', 'ref_kamar.id')
        ->leftJoin('ref_kelas', 'santri_detail.kelas', '=', 'ref_kelas.code')
        ->leftJoin('employee_new', 'ref_kamar.employee_id', '=', 'employee_new.id')
        ->where('santri_kamar.kamar_id', $id)
        ->where('santri_kamar.tahun_ajaran_id', $tahunAjaran->id)
        ;

        $query = $queryKamar->get();

        $jumlahIsi = $queryKamar->count();
        
        return view('kamar.detail', compact('query','dataKamar','jumlahIsi'));
    }
}

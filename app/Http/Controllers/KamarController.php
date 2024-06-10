<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class KamarController extends Controller
{
    public function index(){
        $data = DB::table('ref_kamar')->get();

        return view('kamar.index', ['data'=>$data]);
    }

    public function show($id){
        $dataKamar = DB::table('ref_kamar')
        ->leftJoin('employee_new', 'ref_kamar.employee_id', '=', 'employee_new.id')
        ->where('ref_kamar.id', '=', $id)
        ->select(
            'employee_new.nama AS nama_murroby',
            'employee_new.photo AS foto_murroby',
            'ref_kamar.name AS nama_kamar'
        )
        ->first();

        $query = DB::table('santri_detail')
        ->select(
            'santri_detail.nama', 
            'santri_detail.photo', 
            'santri_detail.kelas', 
            'santri_detail.kecamatan', 
            'ref_kamar.employee_id AS kamar_employee_id',  // Alias to differentiate
            'ref_kelas.employee_id AS kelas_employee_id',  // Alias to differentiate
            'ref_kelas.code AS nama_kelas',  // Alias to differentiate
            'employee_new.nama AS guru_murroby',  // Alias for first join to employee_new
        )
        ->leftJoin('ref_kamar', 'santri_detail.kamar_id', '=', 'ref_kamar.id')
        ->leftJoin('ref_kelas', 'santri_detail.kelas', '=', 'ref_kelas.code')
        ->leftJoin('employee_new', 'ref_kamar.employee_id', '=', 'employee_new.id') // Alias for first employee_new join
        ->where('ref_kamar.id', '=', $id)->get();

        $jumlahIsi = DB::table('santri_detail')
        ->where('santri_detail.kamar_id','=',$id)->count();
        
        return view('kamar.detail', compact('query','dataKamar','jumlahIsi'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class KelasController extends Controller
{
    public function index()
    {
        try {
            $data = DB::table('ref_kelas')
            ->select('ref_kelas.employee_id', 'employee_new.nama AS nama_guru', 'ref_kelas.id AS id_kelas', 'ref_kelas.name')
            ->leftJoin('employee_new', 'ref_kelas.employee_id','=','employee_new.id')
            ->get();

            return view('kelas.index', compact('data'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function detail($id)
    {
        try {
            $tahunAjaran = DB::table('ref_tahun_ajaran')->latest()->first();

            $kelasData = DB::table('ref_kelas')
            ->leftJoin('employee_new', 'ref_kelas.employee_id', '=', 'employee_new.id')
            ->where('ref_kelas.id', '=', $id)
            ->select(
                'employee_new.nama AS wali_kelas_nama',
                'employee_new.photo AS wali_kelas_photo',
                'ref_kelas.name AS nama_kelas'
            )
            ->first();

            $querySantriDetail = DB::table('santri_detail')
            ->select(
                'santri_detail.nama', 
                'santri_detail.photo', 
                'santri_detail.kelas', 
                'santri_detail.kecamatan', 
                'ref_kamar.employee_id AS kamar_employee_id', 
                'ref_kelas.employee_id AS kelas_employee_id', 
                'ref_kelas.code AS nama_kelas', 
                'employee_new.nama AS guru_murroby',
                'ref_tahfidz.name AS kelasTahfidz'
            )
            ->leftJoin('ref_kamar', 'santri_detail.kamar_id', '=', 'ref_kamar.id')
            ->leftJoin('ref_kelas', 'santri_detail.kelas', '=', 'ref_kelas.code')
            ->leftJoin('ref_tahfidz', 'santri_detail.tahfidz_id', '=', 'ref_tahfidz.id')
            ->leftJoin('santri_tahfidz', 'santri_detail.id', '=', 'santri_tahfidz.santri_id')
            ->leftJoin('employee_new', 'ref_kamar.employee_id', '=', 'employee_new.id')
            ->where('ref_kelas.id', '=', $id);

            $jumlahIsi = $querySantriDetail->count();
            $query = $querySantriDetail->get();

            // Mengembalikan data dalam format JSON
            return view('kelas.detail', compact('query','kelasData','jumlahIsi'));

        } catch (\Exception $e) {
            // Mengembalikan pesan error jika terjadi exception
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

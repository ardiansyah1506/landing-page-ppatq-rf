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
            ->select('ref_kelas.employee_id', 'employees.name AS nama_guru', 'ref_kelas.id AS id_kelas', 'ref_kelas.name')
            ->leftJoin('employees', 'ref_kelas.employee_id','=','employees.id')
            ->get();

            return view('kelas.index', compact('data'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function detail($id)
{
    try {
        $kelasData = DB::table('ref_kelas')
        ->leftJoin('employee_new', 'ref_kelas.employee_id', '=', 'employee_new.id')
        ->where('ref_kelas.id', '=', $id)
        ->select(
            'employee_new.nama AS wali_kelas_nama',
            'employee_new.photo AS wali_kelas_photo',
            'ref_kelas.code AS kode_kelas'
        )
        ->first();


        // Query untuk mendapatkan data santri dengan join pada tabel terkait
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
        ->where('ref_kelas.id', '=', $id)->paginate(8);


        // Mengembalikan data dalam format JSON
        return view('kelas.detail', compact('query','kelasData'));

    } catch (\Exception $e) {
        // Mengembalikan pesan error jika terjadi exception
        return response()->json(['error' => $e->getMessage()], 500);
    }
}
}

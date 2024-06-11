<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SantriController extends Controller
{
    public function index(){
        $query = DB::table('santri_detail')
        ->select(
            'santri_detail.nama', 
            'santri_detail.photo', 
            'santri_detail.kelas', 
            'santri_detail.kecamatan', 
            'ref_kamar.employee_id AS kamar_employee_id',  // Alias to differentiate
            'ref_kelas.employee_id AS kelas_employee_id',  // Alias to differentiate
            'guru_murroby.nama AS guru_murroby',  // Alias for first join to employee_new
            'wali_kelas.nama AS wali_kelas'  // Alias for second join to employee_new
        )
        ->leftJoin('ref_kamar', 'santri_detail.kamar_id', '=', 'ref_kamar.id')
        ->leftJoin('ref_kelas', 'santri_detail.kelas', '=', 'ref_kelas.code')
        ->leftJoin('employee_new AS guru_murroby', 'ref_kamar.employee_id', '=', 'guru_murroby.id') // Alias for first employee_new join
        ->leftJoin('employee_new AS wali_kelas', 'ref_kelas.employee_id', '=', 'wali_kelas.id'); // Alias for second employee_new join
    
    
    $data = $query->paginate(8);
    
            // dd($data);
        return view('santri.index', ['data' => $data]);
    }

    public function get_santri(Request $request)
    {
        try {
            // Mendapatkan kata kunci pencarian dari query string
            $search = $request->input('search');

            // Mengambil data dari tabel 'santri_detail' dengan pagination
            $query = DB::table('santri_detail')
            ->select(
                'santri_detail.nama', 
                'santri_detail.photo', 
                'santri_detail.kelas', 
                'santri_detail.kecamatan', 
                'ref_kamar.employee_id AS kamar_employee_id',  // Alias to differentiate
                'ref_kelas.employee_id AS kelas_employee_id',  // Alias to differentiate
                'guru_murroby.nama AS guru_murroby',  // Alias for first join to employee_new
                'wali_kelas.nama AS wali_kelas'  // Alias for second join to employee_new
            )
            ->leftJoin('ref_kamar', 'santri_detail.kamar_id', '=', 'ref_kamar.id')
            ->leftJoin('ref_kelas', 'santri_detail.kelas', '=', 'ref_kelas.code')
            ->leftJoin('employee_new AS guru_murroby', 'ref_kamar.employee_id', '=', 'guru_murroby.id') // Alias for first employee_new join
            ->leftJoin('employee_new AS wali_kelas', 'ref_kelas.employee_id', '=', 'wali_kelas.id'); // Alias for second employee_new join
    
            // Jika ada kata kunci pencarian, tambahkan kondisi untuk mencari
            if (!empty($search)) {
                $query->where(function($subQuery) use ($search) {
                    $subQuery->where('santri_detail.nama', 'like', '%' . $search . '%')
                             ->orWhere('santri_detail.kelas', 'like', '%' . $search . '%')
                             ->orWhere('santri_detail.kecamatan', 'like', '%' . $search . '%')
                             ->orWhere('guru_murroby.nama', 'like', '%' . $search . '%') // Correct alias used
                             ->orWhere('wali_kelas.nama', 'like', '%' . $search . '%'); // Correct alias used
                });
                $data = $query->get();
            }else{

                $data = $query->paginate(8);
            }
    
            // Mendapatkan hasil dengan pagination (10 item per halaman)
    
            // Kembalikan data dalam format JSON
            return response()->json($data);
    
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

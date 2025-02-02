<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengasuhStaffController extends Controller
{
    public function index()
    {
        return view("pengasuh-staff.index");
    }

    public function get_ustad(Request $request)
    {
        try {
            // Mendapatkan kata kunci pencarian dari query string
            $search = $request->input('search');

            // Mengambil data dari tabel 'santri_detail' dengan pagination
            $query = DB::table("employee_new")
            ->select("nama", "alhafidz", "photo", "jenis_kelamin", "structural_positions.name AS jabatan")
            ->leftJoin("structural_positions", "structural_positions.id", "employee_new.jabatan_new")
            ->whereIn("employee_new.jabatan_new", [7, 8, 14])
            ->inRandomOrder();

            if (!empty($search)) {
                $query->where(function($subQuery) use ($search) {
                    $subQuery->where('employee_new.nama', 'like', '%' . $search . '%')
                             ->orWhere('employee_new.jenis_kelamin', 'like', '%' . $search . '%')
                             ->orWhere('jabatan', 'like', '%' . $search . '%');
                });
            }
    
            // Mendapatkan hasil dengan pagination (10 item per halaman)
            $data = $query->paginate(4);
            // Kembalikan data dalam format JSON
            return response()->json($data);
    
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function get_murroby(Request $request)
    {
        try {
            // Mendapatkan kata kunci pencarian dari query string
            $search = $request->input('search');

            // Mengambil data dari tabel 'santri_detail' dengan pagination
            $query = DB::table("employee_new")
            ->select("nama", "alhafidz", "photo", "jenis_kelamin", "structural_positions.name AS jabatan")
            ->leftJoin("structural_positions", "structural_positions.id", "employee_new.jabatan_new")
            ->where("employee_new.jabatan_new", 12)
            ->inRandomOrder();

            if (!empty($search)) {
                $query->where(function($subQuery) use ($search) {
                    $subQuery->where('employee_new.nama', 'like', '%' . $search . '%')
                             ->orWhere('employee_new.jenis_kelamin', 'like', '%' . $search . '%')
                             ->orWhere('jabatan', 'like', '%' . $search . '%');
                });
            }
    
            // Mendapatkan hasil dengan pagination (10 item per halaman)
            $data = $query->paginate(4);
            // Kembalikan data dalam format JSON
            return response()->json($data);
    
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function get_staff(Request $request)
    {
        try {
            // Mendapatkan kata kunci pencarian dari query string
            $search = $request->input('search');

            // Mengambil data dari tabel 'santri_detail' dengan pagination
            $query = DB::table("employee_new")
            ->select("nama", "alhafidz", "photo", "jenis_kelamin", "structural_positions.name AS jabatan")
            ->leftJoin("structural_positions", "structural_positions.id", "employee_new.jabatan_new")
            ->whereIn("employee_new.jabatan_new", [9, 10, 11, 13, 15])
            ->inRandomOrder();

            if (!empty($search)) {
                $query->where(function($subQuery) use ($search) {
                    $subQuery->where('employee_new.nama', 'like', '%' . $search . '%')
                             ->orWhere('employee_new.jenis_kelamin', 'like', '%' . $search . '%')
                             ->orWhere('jabatan', 'like', '%' . $search . '%');
                });
            }
    
            // Mendapatkan hasil dengan pagination (10 item per halaman)
            $data = $query->paginate(4);
            // Kembalikan data dalam format JSON
            return response()->json($data);
    
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

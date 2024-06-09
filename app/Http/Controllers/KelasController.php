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
            ->select('ref_kelas.employee_id', 'employees.name AS nama_guru', 'ref_kelas.id', 'ref_kelas.name')
            ->leftJoin('employees', 'ref_kelas.employee_id','=','employees.id')
            ->get();
            return view('kelas.index', compact('data'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{
    public function index()
    {
        try {
            $data = DB::table('berita')
                ->select('berita.id','berita.kategori_id', 'berita.judul', 'berita.slug','berita.created_at', 'berita.thumbnail', 'berita.gambar_dalam', 'berita.isi_berita', 'berita.user_id', 'users.name AS nama_user', 'kategori_berita.nama_kategori AS nama_kategori')
                ->leftJoin('users', 'berita.user_id', '=', 'users.id')
                ->leftJoin('kategori_berita', 'berita.kategori_id', '=', 'kategori_berita.id')
                ->orderBy('berita.created_at', 'desc');
                $data = $data->paginate(6);
    
            return view('berita.index', compact('data'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function detail($id_berita)
    {
        try {
            $berita = DB::table('berita')
                ->select('berita.id', 'berita.judul', 'berita.slug', 'berita.created_at', 'berita.thumbnail', 'berita.gambar_dalam', 'berita.isi_berita', 'users.name AS nama_user', 'kategori_berita.nama_kategori AS nama_kategori')
                ->leftJoin('users', 'berita.user_id', '=', 'users.id')
                ->leftJoin('kategori_berita', 'berita.kategori_id', '=', 'kategori_berita.id')
                ->where('berita.id', $id_berita)
                ->first();

            $dataList = DB::table('berita')
                ->select('berita.id', 'berita.kategori_id', 'berita.judul', 'berita.slug', 'berita.created_at', 'berita.thumbnail', 'berita.gambar_dalam', 'berita.isi_berita', 'berita.user_id', 'users.name AS nama_user', 'kategori_berita.nama_kategori AS nama_kategori')
                ->leftJoin('users', 'berita.user_id', '=', 'users.id')
                ->leftJoin('kategori_berita', 'berita.kategori_id', '=', 'kategori_berita.id')
                ->latest()
                ->limit(4) // Panggil latest() setelah selesai menambahkan kondisi atau memilih kolom
                ->get();
    
            if (!$berita) {
                return response()->json(['error' => 'Berita tidak ditemukan'], 404);
            }
            return view('berita.detail', compact('berita','dataList'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
}

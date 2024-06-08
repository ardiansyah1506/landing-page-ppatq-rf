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
                ->select('berita.id','berita.kategori_id', 'berita.judul', 'berita.slug','berita.created_at', 'berita.thumbnail', 'berita.gambar_dalam', 'berita.isi_berita', 'berita.user_id', 'detail_user.nama AS nama_user', 'kategori_berita.nama_kategori AS nama_kategori')
                ->leftJoin('detail_user', 'berita.user_id', '=', 'detail_user.id')
                ->leftJoin('kategori_berita', 'berita.kategori_id', '=', 'kategori_berita.id');

                $data = $data->paginate(6);
    
            return view('berita.index', compact('data'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function detail($id_berita)
    {
        try {
            $data = DB::table('berita')
                ->select('berita.id', 'berita.kategori_id', 'berita.judul', 'berita.slug', 'berita.created_at', 'berita.thumbnail', 'berita.gambar_dalam', 'berita.isi_berita', 'berita.user_id', 'detail_user.nama AS nama_user', 'kategori_berita.nama_kategori AS nama_kategori')
                ->leftJoin('detail_user', 'berita.user_id', '=', 'detail_user.id')
                ->leftJoin('kategori_berita', 'berita.kategori_id', '=', 'kategori_berita.id')
                ->where('berita.id', $id_berita)
                ->get();
                $dataList = DB::table('berita')
                ->select('berita.id', 'berita.kategori_id', 'berita.judul', 'berita.slug', 'berita.created_at', 'berita.thumbnail', 'berita.gambar_dalam', 'berita.isi_berita', 'berita.user_id', 'detail_user.nama AS nama_user', 'kategori_berita.nama_kategori AS nama_kategori')
                ->leftJoin('detail_user', 'berita.user_id', '=', 'detail_user.id')
                ->leftJoin('kategori_berita', 'berita.kategori_id', '=', 'kategori_berita.id')
                ->latest() // Panggil latest() setelah selesai menambahkan kondisi atau memilih kolom
                ->get();
    
            if (!$data) {
                return response()->json(['error' => 'Berita tidak ditemukan'], 404);
            }
            return view('berita.detail', compact('data','dataList'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
}

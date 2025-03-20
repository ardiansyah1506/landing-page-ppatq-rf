<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Crypt;

class BeritaController extends Controller
{
    public function index()
    {
        try {
            $data = DB::table('berita')
            ->select(
                'berita.id',
                'berita.kategori_id',
                'berita.judul',
                'berita.slug',
                'berita.created_at',
                'berita.thumbnail',
                'berita.gambar_dalam',
                'berita.isi_berita',
                'berita.user_id',
                'users.name AS nama_user',
                'kategori_berita.nama_kategori AS nama_kategori'
            )
            ->leftJoin('users', 'berita.user_id', '=', 'users.id')
            ->leftJoin('kategori_berita', 'berita.kategori_id', '=', 'kategori_berita.id')
            ->whereNull('berita.deleted_at')
            ->orderBy('berita.created_at', 'desc')
            ->paginate(6);

            $modifiedItems = collect($data->items())->map(function ($item) {
                $item->id = Crypt::encryptString($item->id . "ppatq");
                return $item;
            });
            
            $data = new LengthAwarePaginator(
                $modifiedItems,
                $data->total(),
                $data->perPage(),
                $data->currentPage(),
                ['path' => request()->url(), 'query' => request()->query()]
            );
    
            return view('berita.index', compact('data'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function detail($idEnkripsi)
    {
        try {
            $idAsli = Crypt::decryptString($idEnkripsi);
            $id_berita = str_replace("ppatq", "", $idAsli);

            $berita = DB::table('berita')
                ->select('berita.id', 'berita.thumbnail', 'berita.judul', 'berita.slug', 'berita.created_at', 'berita.thumbnail', 'berita.gambar_dalam', 'berita.isi_berita', 'users.name AS nama_user', 'kategori_berita.nama_kategori AS nama_kategori')
                ->leftJoin('users', 'berita.user_id', '=', 'users.id')
                ->leftJoin('kategori_berita', 'berita.kategori_id', '=', 'kategori_berita.id')
                ->where('berita.id', $id_berita)
                ->first();

            $dataList = DB::table('berita')
                ->select('berita.id', 'berita.kategori_id', 'berita.judul', 'berita.slug', 'berita.created_at', 'berita.thumbnail', 'berita.gambar_dalam', 'berita.isi_berita', 'berita.user_id', 'users.name AS nama_user', 'kategori_berita.nama_kategori AS nama_kategori')
                ->leftJoin('users', 'berita.user_id', '=', 'users.id')
                ->leftJoin('kategori_berita', 'berita.kategori_id', '=', 'kategori_berita.id')
                ->whereNull('berita.deleted_at')
                ->where('berita.id', '!=', $id_berita)
                ->latest()
                ->limit(4)
                ->get()
                ->map(function ($item) {
                    $item->id = Crypt::encryptString($item->id . "ppatq");
                    return $item;
                });
    
            if (!$berita) {
                return response()->json(['error' => 'Berita tidak ditemukan'], 404);
            }
            return view('berita.detail', compact('berita','dataList'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    
    public function index(){
        try {
            $data = DB::table('berita')
                ->select('berita.id','berita.kategori_id', 'berita.judul', 'berita.slug','berita.created_at', 'berita.thumbnail', 'berita.gambar_dalam', 'berita.isi_berita', 'berita.user_id', 'users.name AS nama_user', 'kategori_berita.nama_kategori AS nama_kategori')
                ->leftJoin('users', 'berita.user_id', '=', 'users.id')
                ->leftJoin('kategori_berita', 'berita.kategori_id', '=', 'kategori_berita.id')
                ->orderBy('berita.created_at', 'desc');
                $data = $data->paginate(10);
    
            return view('HomePage.index', compact('data'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    public function About(){
        return view('About.index');
    }
    public function visimisi(){
        return view('visimisi.index');
    }
    public function sekapursirih(){
        return view('sekapur_sirih.index');
    }
 
    
}

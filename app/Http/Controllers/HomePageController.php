<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    
    public function index(){
        try {
        DB::connection()->getPdo();
        if(DB::connection()->getDatabaseName()){
            echo "Yes! Successfully connected to the DB: " . DB::connection()->getDatabaseName();
        }else{
            die("Could not find the database. Please check your configuration.");
        }
        } catch (\Exception $e) {
            die("Could not open connection to database server.  Please check your configuration.");
        }
        $totalSantri = DB::table('santri')->count();
        $totalPengajar = DB::table('tb_guru')->count(); 
        $totalAlumni = DB::table('tb_alumni')->count(); 

        $berita = DB::table('berita')
        ->select('berita.id', 'berita.kategori_id', 'berita.judul', 'berita.slug', 'berita.created_at', 'berita.thumbnail', 'berita.gambar_dalam', 'berita.isi_berita', 'berita.user_id', 'detail_user.nama AS nama_user', 'kategori_berita.nama_kategori AS nama_kategori')
        ->leftJoin('detail_user', 'berita.user_id', '=', 'detail_user.id')
        ->leftJoin('kategori_berita', 'berita.kategori_id', '=', 'kategori_berita.id')
        ->latest() // Panggil latest() setelah selesai menambahkan kondisi atau memilih kolom
        ->get(3);
        return view('HomePage.index', compact('totalSantri', 'totalPengajar', 'totalAlumni','berita'));
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

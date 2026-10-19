<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class HomePageController extends Controller
{
    
    public function index()
    {
        try {
                $data['beritas'] = DB::table('berita')
                ->select('id', 'judul', 'created_at', 'thumbnail', 'isi_berita')
                ->whereNull('deleted_at')
                ->orderBy('created_at', 'desc')
                ->paginate(3)
                ->withQueryString()
                ->through(function ($item) {
                    $item->id = Crypt::encryptString($item->id . "ppatq");
                    return $item;
                });

                // Tanggal mulai selalu >= hari ini, jadi urut tanggal_mulai sama dengan jarak terdekat
                $data['agendas'] = DB::table('agenda')
                ->select('judul', 'isi', 'tanggal_mulai')
                ->whereNull('deleted_at')
                ->where('tanggal_mulai', '>=', DB::raw('CURDATE()'))
                ->orderBy('tanggal_mulai')
                ->limit(5)
                ->get();

                $jumlahSantri = DB::table('santri_detail')
                ->where('status', 0)
                ->whereIn('jenis_kelamin', ['L', 'P'])
                ->selectRaw('jenis_kelamin, COUNT(*) AS jumlah')
                ->groupBy('jenis_kelamin')
                ->pluck('jumlah', 'jenis_kelamin');

                $data['jumlahSiswaLaki'] = $jumlahSantri['L'] ?? 0;
                $data['jumlahSiswaPerempuan'] = $jumlahSantri['P'] ?? 0;

                $jumlahGuru = DB::table('tb_guru')
                ->whereIn('jabatan_new', ['murobby', 'ustadz', 'tahfidz'])
                ->selectRaw("SUM(jabatan_new = 'murobby') AS murroby, COUNT(*) AS guru")
                ->first();

                $data['jumlahMurroby'] = (int) $jumlahGuru->murroby;
                $data['jumlahGuru'] = (int) $jumlahGuru->guru;

                $data['fasilitas'] = DB::table('fasilitas')
                ->select('nama', 'foto')
                ->where('published', 1)
                ->get();

                $data['galeri'] = DB::table('galeri')
                ->select('nama', 'foto')
                ->where('published', 1)
                ->get();

                $data['dakwah'] = DB::table('dakwah')
                    ->select('id', 'judul', 'isi_dakwah')
                    ->whereNull('deleted_at')
                    ->limit(4)
                    ->get()
                    ->map(function ($item) {
                        $item->idEnkripsi = Crypt::encryptString($item->id . "ppatq");
                        return $item;
                    });

            return view('HomePage.index', $data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    public function getSantriRandom(){
        $query = DB::table('santri_detail')
            ->select('nama', 'photo', 'kelas')
            ->whereNotNull('photo')
            ->where('photo', '!=', '');

        // Foto dicek langsung ke server manajemen, jadi dibatasi beberapa percobaan saja
        $santri = null;
        for ($i = 0; $i < 5; $i++) {
            $santri = $this->randomRow(clone $query);
            if (!$santri) {
                break;
            }

            if ($this->photoExists('https://manajemen.ppatq-rf.id/assets/img/upload/photo/' . $santri->photo)) {
                break;
            }
        }

        return response()->json($santri);
    }

    public function getPegawaiRandom(){
        $pegawai = $this->randomRow(
            DB::table('employee_new')->select('nama', 'jabatan', 'photo')
        );

        return response()->json($pegawai);
    }

    /**
     * Ambil satu baris acak lewat count + offset, tanpa ORDER BY RAND() yang mengurutkan seluruh tabel.
     */
    private function randomRow($query)
    {
        $total = (clone $query)->count();
        if ($total === 0) {
            return null;
        }

        return $query->offset(random_int(0, $total - 1))->limit(1)->first();
    }

    private function photoExists(string $url): bool
    {
        $context = stream_context_create(['http' => ['method' => 'HEAD', 'timeout' => 2]]);
        $headers = @get_headers($url, false, $context);

        return $headers !== false && str_contains($headers[0], '200');
    }
    
    public function About(){
        $data['about'] = DB::table('about')
        ->select('about.*')
        ->first();

        return view('About.index', $data);
    }
    public function visimisi(){
        return view('visimisi.index');
    }
    public function sekapursirih(){
        return view('sekapur_sirih.index');
    }
 
    
}

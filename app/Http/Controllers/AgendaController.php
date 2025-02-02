<?php

namespace App\Http\Controllers;

use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgendaController extends Controller
{
    private function extractParagraphHTML($html) 
    {
        // Membuat instance DOMDocument
        $dom = new DOMDocument();
    
        // Non-aktifkan error parsing HTML (HTML dari editor seperti Quill bisa tidak valid)
        libxml_use_internal_errors(true);
        $dom->loadHTML($html);
        libxml_clear_errors();
    
        // Ambil semua elemen <p>
        $pTags = $dom->getElementsByTagName('p');
    
        // Jika ada tag <p>, ambil outer HTML dari tag pertama
        if ($pTags->length > 0) {
            return $dom->saveHTML($pTags->item(0));
        }
        
        // Jika tidak ada, kembalikan string kosong
        return '';
    }


    public function index(){

        // Panggil paginate langsung, tanpa get()
        $queryAgenda = DB::table('agenda')
        ->select('id', 'judul', 'isi', 'tanggal_mulai', 'tanggal_selesai', 'gambar', 'created_at')
        ->whereNull('deleted_at')
        ->orderBy("created_at", "desc")
        ->paginate(6);

        // Untuk setiap record agenda, tambahkan properti baru berisi teks dari tag <p>
        foreach ($queryAgenda as $agendaItem) {
            $agendaItem->isi_paragraph = $this->extractParagraphHTML($agendaItem->isi);
        }

        $data['agenda'] = $queryAgenda;

        return view('agenda.index', $data);
    }
}

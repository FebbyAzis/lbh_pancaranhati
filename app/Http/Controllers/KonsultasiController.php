<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Konsultasi;
use Illuminate\Support\Facades\Storage;

class KonsultasiController extends Controller
{
    public function ajukan_konsultasi()
    {
        return view('users.konsultasi_hukum.ajukan_konsultasi');
    }

     public function submit(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'kategori' => 'required|string',
            'deskripsi' => 'required|string',
            'privasi' => 'required|in:Publik,Privat',
            'metode_tanggapan' => 'required|in:Otomatis,Manual',
            'kontak' => 'nullable|string',
            'dokumen' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc',
            'setuju_syarat' => 'accepted',
        ]);

        $dokumenPath = null;
        if ($request->hasFile('dokumen')) {
            $dokumenPath = $request->file('dokumen')->store('dokumen');
        }

        $idBaru = Konsultasi::insertGetId([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'dokumen' => $dokumenPath,
            'privasi' => $request->privasi,
            'metode_tanggapan' => $request->metode_tanggapan,
            'kontak' => $request->kontak,
            'setuju_syarat' => true,

        ]);
        
        if ($request->metode_tanggapan === 'otomatis') {
            return $this->sarankanTFIDF($request->deskripsi, $idBaru);
        }
      dd($idBaru);

        return redirect()->back()->with('Success', 'Konsultasi berhasil dikirim.');
    }

    // TF-IDF PHP Implementasi Manual
    public function sarankanTFIDF($teksBaru, $idBaru)
    {
        $dataLama = DB::table('konsultasi')
            ->where('id', '!=', $idBaru)
            ->pluck('deskripsi')
            ->toArray();

        $semuaTeks = array_merge($dataLama, [$teksBaru]);

        // Preprocessing: tokenisasi
        $token = function($text) {
            $text = strtolower(strip_tags($text));
            $text = preg_replace('/[^a-z0-9\s]/', '', $text);
            return array_filter(explode(' ', $text));
        };

        $tokenDocs = array_map($token, $semuaTeks);

        // Hitung TF
        $tf = [];
        foreach ($tokenDocs as $doc) {
            $count = array_count_values($doc);
            $total = count($doc);
            $tf[] = array_map(fn($v) => $v / $total, $count);
        }

        // Hitung IDF
        $df = [];
        foreach ($tokenDocs as $doc) {
            foreach (array_unique($doc) as $term) {
                $df[$term] = ($df[$term] ?? 0) + 1;
            }
        }

        $idf = [];
        $N = count($tokenDocs);
        foreach ($df as $term => $count) {
            $idf[$term] = log($N / $count);
        }

        // Hitung TF-IDF
        $tfidf = [];
        foreach ($tf as $docTF) {
            $vec = [];
            foreach ($idf as $term => $idfVal) {
                $vec[$term] = ($docTF[$term] ?? 0) * $idfVal;
            }
            $tfidf[] = $vec;
        }

        // Cosine similarity
        $cosine = function($a, $b) {
            $dot = 0;
            $magA = 0;
            $magB = 0;
            $terms = array_unique(array_merge(array_keys($a), array_keys($b)));
            foreach ($terms as $t) {
                $va = $a[$t] ?? 0;
                $vb = $b[$t] ?? 0;
                $dot += $va * $vb;
                $magA += $va ** 2;
                $magB += $vb ** 2;
            }
            return ($magA && $magB) ? $dot / (sqrt($magA) * sqrt($magB)) : 0;
        };

        $baruVec = array_pop($tfidf);
        $skor = [];
        foreach ($tfidf as $i => $v) {
            $skor[$i] = $cosine($baruVec, $v);
        }

        arsort($skor);
        $topIndexes = array_slice(array_keys($skor), 0, 3); // Ambil 3 teratas

        $hasil = [];
        foreach ($topIndexes as $i) {
            $hasil[] = $dataLama[$i];
        }

        // Simpan hasil saran ke database (opsional)
        DB::table('konsultasi')->where('id', $idBaru)->update([
            'tfidf_response' => implode("\n\n---\n\n", $hasil),
            'updated_at' => now(),
        ]);

        // Kembalikan view dengan hasil saran
        return view('konsultasi.hasil', [
            'judul' => 'Saran Otomatis Berdasarkan Masalah Anda',
            'deskripsi_user' => $teksBaru,
            'saran_terkait' => $hasil
        ]);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Konsultasi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class KonsultasiController extends Controller
{
    public function ajukan_konsultasi()
    {
        $user = Auth::user();
        $users = $user->id;
        return view('users.konsultasi_hukum.ajukan_konsultasi', compact('user', 'users'));
    }

    public function riwayat_layanan()
    {
        $user = Auth::user();
        $users = $user->id;
        $k = Konsultasi::where('users_id', $users)->orderBy('id', 'desc')->get();
        return view('users.konsultasi_hukum.riwayat_layanan', compact('user', 'users', 'k'));
    }

    public function pengajuan_konsultasi(Request $request)
    {
        $request->validate([
            'users_id' => 'required',
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string',
            'deskripsi' => 'required|string',
            'dokumen' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx,pdf|max:5120',
            'metode_tanggapan' => 'required|string',
            'kontak' => 'nullable|string',
            'status' => 'required',
            'notifikasi' => 'required',
        ]);

        $dokumen = null;
    if ($request->hasFile('dokumen')) {
        $file = $request->file('dokumen');
        $dokumen = time() . '_' . $file->getClientOriginalName();
        $file->move('photos', $dokumen);
    }

        Konsultasi::create([
            'users_id' => $request->users_id,
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'dokumen' => $dokumen,
            'metode_tanggapan' => $request->metode_tanggapan,
            'kontak' => $request->kontak,
            'status' => $request->status,
            'notifikasi' => $request->notifikasi,
        ]);

        return redirect()->back()->with('pengajuan_konsultasi', 'Konsultasi anda berhasil dikirim!');
    }

    public function konsultasi_otomatis(Request $request)
    {
        $request->validate([
            'users_id' => 'required',
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string',
            'deskripsi' => 'required|string',
            'metode_tanggapan' => 'required|string',
            'status' => 'required',
        ]);

        Konsultasi::create([
            'users_id' => $request->users_id,
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'metode_tanggapan' => $request->metode_tanggapan,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('konsultasi_otomatis', 'Konsultasi anda berhasil dikirim!');
    }

    // private function analisisTFIDF($deskripsi)
    // {
    //     // 👉 Dummy: logika TF-IDF nanti bisa kamu sambungkan ke dataset
    //     // misalnya bandingkan dengan daftar masalah hukum yang sudah ada
    //     if (str_contains(strtolower($deskripsi), 'warisan')) {
    //         return 'Saran: Anda dapat mengajukan gugatan perdata terkait sengketa warisan.';
    //     } elseif (str_contains(strtolower($deskripsi), 'pidana')) {
    //         return 'Saran: Masalah pidana dapat dilaporkan ke kepolisian.';
    //     }
    //     return 'Saran umum: Silakan konsultasi lebih lanjut dengan petugas.';
    // }

    public function bacaNotifikasiUser($id)
    {
        // cari konsultasi
        $k = Konsultasi::findOrFail($id);
    
        // update status notifikasi
        $k->update([
            'notifikasi' => 3
        ]);
    
        // redirect ke halaman detail konsultasi masuk
        return redirect()->route('konsultasiUser.detail', $id);
    }

    public function detail($id)
    {
        $k = Konsultasi::findOrFail($id);
        return view('users.konsultasi_hukum.detail', compact('k'));
    }
        

}
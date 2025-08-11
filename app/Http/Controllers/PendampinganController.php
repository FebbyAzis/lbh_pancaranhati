<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendampingan;
use App\Models\Users;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PendampinganController extends Controller
{
    public function ajukan_pendampingan()
    {
        $user = Auth::user();
        $users = $user->id;
        $p = Pendampingan::where('users_id', $users)->orderBy('id', 'desc')->get();
        return view('users.pendampingan.ajukan_pendampingan', compact('user', 'users', 'p'));
    }

    public function riwayat_layanan()
    {
        $user = Auth::user();
        $users = $user->id;
        $p = Pendampingan::where('users_id', $users)->orderBy('id', 'desc')->get();
        return view('users.pendampingan.riwayat_layanan', compact('user', 'users', 'p'));
    }

    public function detail_riwayat_layanan($id)
    {
        $p = Pendampingan::find($id);
   
        return view('users.pendampingan.detail_riwayat_layanan', compact('p'));
    }

     public function pengajuan_pendampingan(Request $request)
    {
        $request->validate([
            'users_id' => 'required',
            'judul_permohonan' => 'required',
            'kategori_masalah' => 'required',
            'detail_kasus' => 'required',
            'lokasi_pendampingan' => 'required',
            'tanggal_permintaan' => 'required',
            'urgensi' => 'required',
            'dokumen_pendukung' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,webp|max:5120',
            'kontak_aktif' => 'required',
            'persetujuan' => 'required',
        ]);

        $dokumen_pendukung = null;
    if ($request->hasFile('dokumen_pendukung')) {
        $file = $request->file('dokumen_pendukung');
        $dokumen_pendukung = time() . '_' . $file->getClientOriginalName();
        $file->move('photos', $dokumen_pendukung);
    }



        Pendampingan::create([
            'users_id' => $request->users_id,
            'judul_permohonan' => $request->judul_permohonan,
            'kategori_masalah' => $request->kategori_masalah,
            'detail_kasus' => $request->detail_kasus,
            'lokasi_pendampingan' => $request->lokasi_pendampingan,
            'tanggal_permintaan' => $request->tanggal_permintaan,
            'urgensi' => $request->urgensi,
            'dokumen_pendukung' => $dokumen_pendukung,
            'kontak_aktif' => $request->kontak_aktif,
            // 'persetujuan' => 'Setuju',

        ]);

        return redirect()->back()->with('Success', 'Pengajuan pendampingan berhasil dikirim.');
    }
}

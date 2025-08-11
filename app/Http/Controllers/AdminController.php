<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pendampingan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function pengajuan_layanan_hukum()
    {
        $p = Pendampingan::orderBy('id', 'desc')->get();
        return view('admin.pengajuan_layanan_hukum.index', compact('p'));
    }

    public function detail_pengajuan_layanan_hukum($id)
    {
        $user = Auth::user();
        $users = $user->id;
        $p = Pendampingan::with('jadwal.petugas')->find($id);
        return view('admin.pengajuan_layanan_hukum.detail', compact('p', 'user', 'users'));
    }

    public function jadwal($id)
    {
        $user = Auth::user();
        $users = $user->id;
        $p = Pendampingan::with('jadwal.petugas')->orderBy('id', 'desc')->get();
        return view('admin.pengajuan_layanan_hukum.detail', compact('p', 'user', 'users'));
    }

    public function jadwal_detail($id)
    {
        $user = Auth::user();
        $users = $user->id;
        $p = Pendampingan::with('jadwal.petugas')->find($id);
        $j = Jadwal::where('pendampingan_id', $id)->orderBy('id', 'desc')->get();
        return view('admin.pengajuan_layanan_hukum.jadwal_detail', compact('p', 'user', 'users', 'j'));
    }

    public function jadwal_pendampingan()
    {
        $user = Auth::user();
        $users = $user->id;
        $p = Pendampingan::with('jadwal.petugas')->orderBy('id', 'desc')->get();
        return view('admin.pengajuan_layanan_hukum.jadwal', compact('p', 'user', 'users'));
    }

    public function terima_pengajuan(Request $request, $id)
    {
         Pendampingan::where('id', $id)->update([
            'status' => 2,
            'catatan' => $request->catatan,
        ]);

        return redirect()->back()->with('diterima', 'Pengajuan layanan hukum telah diterima');
    }

    public function tolak_pengajuan(Request $request, $id)
    {
         Pendampingan::where('id', $id)->update([
            'status' => 3,
            'catatan' => $request->catatan,]);

        return redirect()->back()->with('ditolak', 'Pengajuan layanan hukum telah ditolak');
    }

    public function atur_jadwal(Request $request)
    {
        $save = new Jadwal;
        $save->pendampingan_id = $request->pendampingan_id; 
        $save->petugas_id = $request->petugas_id;
        $save->judul_acara = $request->judul_acara;
        $save->deskripsi = $request->deskripsi;
        $save->tanggal_mulai = $request->tanggal_mulai;
        $save->tanggal_selesai = $request->tanggal_selesai;
        $save->lokasi = $request->lokasi;
        $save->save(); 
        return redirect()->back()->with('jadwal', 'Jadwal berhasil dibuat!');
    }
}

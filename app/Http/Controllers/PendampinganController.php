<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendampingan;
use App\Models\Jadwal;
use App\Models\DetailJadwal;
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
            'surat_panggilan_sidang' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,webp|max:5120',
            'bukti_transaksi' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,webp|max:5120',
            'akta' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,webp|max:5120',
            'perjanjian' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,webp|max:5120',
            'ktp' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,webp|max:5120',
            'surat_kuasa' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,webp|max:5120',
            'bukti_lainnya' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,webp|max:5120',
            'kontak_aktif' => 'required',
            'persetujuan' => 'required',
        ]);

        $surat_panggilan_sidang = null;
    if ($request->hasFile('surat_panggilan_sidang')) {
        $file = $request->file('surat_panggilan_sidang');
        $surat_panggilan_sidang = time() . '_' . $file->getClientOriginalName();
        $file->move('photos', $surat_panggilan_sidang);
    }

    $bukti_transaksi = null;
    if ($request->hasFile('bukti_transaksi')) {
        $file = $request->file('bukti_transaksi');
        $bukti_transaksi = time() . '_' . $file->getClientOriginalName();
        $file->move('photos', $bukti_transaksi);
    }

    $akta = null;
    if ($request->hasFile('akta')) {
        $file = $request->file('akta');
        $akta = time() . '_' . $file->getClientOriginalName();
        $file->move('photos', $akta);
    }

    $perjanjian = null;
    if ($request->hasFile('perjanjian')) {
        $file = $request->file('perjanjian');
        $perjanjian = time() . '_' . $file->getClientOriginalName();
        $file->move('photos', $perjanjian);
    }

    $ktp = null;
    if ($request->hasFile('ktp')) {
        $file = $request->file('ktp');
        $ktp = time() . '_' . $file->getClientOriginalName();
        $file->move('photos', $ktp);
    }

    $surat_kuasa = null;
    if ($request->hasFile('surat_kuasa')) {
        $file = $request->file('surat_kuasa');
        $surat_kuasa = time() . '_' . $file->getClientOriginalName();
        $file->move('photos', $surat_kuasa);
    }

    $bukti_lainnya = null;
    if ($request->hasFile('bukti_lainnya')) {
        $file = $request->file('bukti_lainnya');
        $bukti_lainnya = time() . '_' . $file->getClientOriginalName();
        $file->move('photos', $bukti_lainnya);
    }


        Pendampingan::create([
            'users_id' => $request->users_id,
            'judul_permohonan' => $request->judul_permohonan,
            'kategori_masalah' => $request->kategori_masalah,
            'detail_kasus' => $request->detail_kasus,
            'lokasi_pendampingan' => $request->lokasi_pendampingan,
            'tanggal_permintaan' => $request->tanggal_permintaan,
            'urgensi' => $request->urgensi,
            'surat_panggilan_sidang' => $surat_panggilan_sidang,
            'bukti_transaksi' => $bukti_transaksi,
            'akta' => $akta,
            'perjanjian' => $perjanjian,
            'ktp' => $ktp,
            'surat_kuasa' => $surat_kuasa,
            'bukti_lainnya' => $bukti_lainnya,
            'kontak_aktif' => $request->kontak_aktif,
            // 'persetujuan' => 'Setuju',

        ]);

        return redirect()->back()->with('Success', 'Pengajuan pendampingan berhasil dikirim.');
    }

    public function jadwal_pendampingan()
    {
        $user = Auth::user();
        $users = $user->id;
        $p = Pendampingan::where('users_id', 4)->where('status', 2)->orderBy('id', 'desc')->get();
        $j = Jadwal::where('users_id', $users)->orderBy('id', 'desc')->get();
        return view('users.pendampingan.jadwal', compact('p', 'user', 'users', 'j'));
    }

    public function jadwal_detail($id)
    {
        $user = Auth::user();
        $users = $user->id;
        $j = Jadwal::findOrFail($id);
        $pp = Users::where('role', 'admin')->get();
        $dj = DetailJadwal::where('jadwal_id', $id)->orderBy('id', 'desc')->get();
        
        return view('users.pendampingan.jadwal_detail', compact('user', 'users', 'j', 'pp', 'dj'));
    }
}

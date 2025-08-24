<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\DetailJadwal;
use App\Models\Pendampingan;
use App\Models\User;
use App\Models\Users;
use App\Models\Dokumen;
use App\Models\Konsultasi;
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
        $pp = Users::where('role', 'admin')->get();
        return view('admin.pengajuan_layanan_hukum.detail', compact('p', 'user', 'users', 'pp'));
    }

    public function jadwal($id)
    {
        $user = Auth::user();
        $users = $user->id;
        $p = Pendampingan::with('jadwal.petugas')->orderBy('id', 'desc')->get();
        $pp = Users::where('role', 'admin')->get();
        
        return view('admin.pengajuan_layanan_hukum.detail', compact('p', 'pp', 'user', 'users'));
    }

    public function jadwal_detail($id)
    {
        $user = Auth::user();
        $users = $user->id;
        $j = Jadwal::findOrFail($id);
        $pp = Users::where('role', 'admin')->get();
        $dj = DetailJadwal::where('jadwal_id', $id)->orderBy('id', 'desc')->get();
        
        return view('admin.pengajuan_layanan_hukum.jadwal_detail', compact('user', 'users', 'j', 'pp', 'dj'));
    }

    public function detail_kegiatan($id)
    {
        $user = Auth::user();
        $users = $user->id;
        // $j = Jadwal::findOrFail($id);
        $pp = Users::where('role', 'admin')->get();
        $dj = DetailJadwal::find($id);
        
        return view('admin.pengajuan_layanan_hukum.detail_kegiatan', compact('user', 'users', 'dj', 'pp'));
    }

    public function jadwal_pendampingan()
    {
        $user = Auth::user();
        $users = $user->id;
        $p = Pendampingan::with('jadwal.petugas')->where('status', 2)->orderBy('id', 'desc')->get();
        $j = Jadwal::with('users')->get();
        return view('admin.pengajuan_layanan_hukum.jadwal', compact('p', 'user', 'users', 'j'));
    }

    public function terima_pengajuan(Request $request, $id)
    {

        $request->validate([
            
            'dokumen_admin' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx,webp|max:5120',

        ]);

        $dokumen_admin = null;
    if ($request->hasFile('dokumen_admin')) {
        $file = $request->file('dokumen_admin');
        $dokumen_admin = time() . '_' . $file->getClientOriginalName();
        $file->move('photos', $dokumen_admin);
    }


         Pendampingan::where('id', $id)->update([
            'status' => 2,
            'catatan' => $request->catatan,
            'dokumen_admin' => $dokumen_admin,
        ]);

        return redirect()->back()->with('diterima', 'Pengajuan layanan hukum telah diterima');
    }

    public function tolak_pengajuan(Request $request, $id)
    {
         Pendampingan::where('id', $id)->update([
            'status' => 3,
            'catatan' => $request->catatan,
            'dokumen_admin' => $request->dokumen_admin,
        ]);

        return redirect()->back()->with('ditolak', 'Pengajuan layanan hukum telah ditolak');
    }

    public function atur_jadwal(Request $request)
    {
        $save = new Jadwal;
        $save->pendampingan_id = $request->pendampingan_id; 
        $save->users_id = $request->users_id;
        $save->judul_acara = $request->judul_acara;
        $save->deskripsi = $request->deskripsi;
        $save->tanggal_mulai = $request->tanggal_mulai;
        $save->tanggal_selesai = $request->tanggal_selesai;
        $save->lokasi = $request->lokasi;
        $save->save(); 
        return redirect()->back()->with('jadwal', 'Jadwal berhasil dibuat!');
    }

    public function tambah_jadwal(Request $request)
    {
        $save = new DetailJadwal;
        $save->jadwal_id = $request->jadwal_id;
        $save->users_id = $request->users_id;  
        $save->nama_kegiatan = $request->nama_kegiatan;
        $save->tanggal_waktu = $request->tanggal_waktu;
        $save->lokasi = $request->lokasi;
        $save->catatan_petugas = $request->catatan_petugas;
     
        $save->petugas_pendamping = implode(', ', $request->petugas_pendamping);
        $save->save(); 
        return redirect()->back()->with('detailjadwal', 'Jadwal berhasil ditambahkan!');
    }

    public function edit_detail_kegiatan(Request $request, $id)
    {

        DetailJadwal::where('id', $id)->update([
            'nama_kegiatan' => $request->nama_kegiatan,
            'petugas_pendamping' => implode(', ', $request->petugas_pendamping),
            'tanggal_waktu' => $request->tanggal_waktu,
            'lokasi' => $request->lokasi,
            'catatan_petugas' => $request->catatan_petugas,
           
           
        ]);

        return redirect()->back()->with('edit_kegiatan', 'Jadwal Kegiatan berhasil diubah!');
    }

    public function edit_jadwal(Request $request, $id)
    {

        Jadwal::where('id', $id)->update([
            'judul_acara' => $request->judul_acara,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'lokasi' => $request->lokasi,
           
        ]);

        return redirect()->back()->with('edit_jadwal', 'Jadwal Kegiatan berhasil diubah!');
    }

    public function update_kegiatan(Request $request, $id)
    {

        DetailJadwal::where('id', $id)->update([
            'status_jadwal' => '2',
        ]);

        return redirect()->back()->with('update_status', 'Jadwal kegiatan telah dinyatakan selesai!');
    }

    public function update_jadwal(Request $request, $id)
    {

        Jadwal::where('id', $id)->update([
            'status' => '2',
        ]);

        return redirect()->back()->with('update_jadwal', 'Jadwal telah dinyatakan tuntas!');
    }

    public function dokumen()
    {
        $dk = Dokumen::orderBy('id', 'desc')->get();
     
        return view('admin.dokumen', compact('dk'));
    }
    public function dokumen_hukum()
    {
        $dk = Dokumen::orderBy('id', 'desc')->get();
     
        return view('users.dokumen_hukum', compact('dk'));
    }

    public function tambah_dokumen(Request $request)
    {
        $this->validate($request,[
            'judul_dokumen' => 'required',
            'deskripsi' => 'required',
            'dokumen' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx,webp|max:5120',
            
         
        ]);

        $file = $request->file('dokumen');
        $nama_file = time().'_'.$file->getClientOriginalName();
        $tujuan_upload = 'photos';
        $file->move($tujuan_upload,$nama_file);

        Dokumen::create([
            'judul_dokumen' => $request->judul_dokumen, 
            'deskripsi' => $request->deskripsi,
            'dokumen' => $nama_file,
        ]);

        return redirect()->back()->with('tambah_dokumen', 'Dokumen Berhasil Ditambahkan!');
    }

    public function edit_dokumen(Request $request, $id)
    {
        $this->validate($request, [
            'judul_dokumen' => 'required',
            'deskripsi' => 'required',
            'dokumen' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx,webp|max:5120'
        ]);
    
        $jenisTas = Dokumen::findOrFail($id);
    
        // Jika ada dokumen baru di-upload
        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $nama_file = time().'_'.$file->getClientOriginalName();
            $tujuan_upload = 'photos';
            $file->move($tujuan_upload, $nama_file);
    
            // Hapus dokumen lama jika ada
            $dokumen_lama = public_path('photos/'.$jenisTas->dokumen);
            if (file_exists($dokumen_lama)) {
                unlink($dokumen_lama);
            }
    
            // Update dengan dokumen baru
            $jenisTas->dokumen = $nama_file;
        }
    
        $jenisTas->judul_dokumen = $request->judul_dokumen;
        $jenisTas->deskripsi = $request->deskripsi;
        $jenisTas->save();
        
        return redirect()->back()->with('edit_dokumen', 'Dokumen berhasil diubah!');
    }

    public function hapus_dokumen(Request $request, $id)
    {

        Dokumen::where('id', $id)->delete();

        return redirect()->back()->with('hapus_dokumen', 'Dokumen berhasil dihapus!');
    }


    public function konsultasi_masuk()
    {
        $km = Konsultasi::where('metode_tanggapan', 'Manual')->orderBy('id', 'desc')->get();
        $ko = Konsultasi::where('metode_tanggapan', 'Otomatis')->orderBy('id', 'desc')->get();
        return view('admin.konsultasi.konsultasi_masuk', compact('km', 'ko'));
    }

    public function detail_konsul_masuk($id)
    {
        $k = Konsultasi::find($id);
        return view('admin.konsultasi.detail', compact('k'));
    }

    public function bacaNotifikasi($id)
    {
        // cari konsultasi
        $k = Konsultasi::findOrFail($id);
    
        // update status notifikasi
        $k->update([
            'notifikasi' => 2
        ]);
    
        // redirect ke halaman detail konsultasi masuk
        return redirect()->route('detail.konsultasi', $id);
    }

    public function bacaNotifikasiPendampingan($id)
    {
        // cari konsultasi
        $k = Pendampingan::findOrFail($id);
    
        // update status notifikasi
        $k->update([
            'notifikasi' => 2
        ]);
    
        // redirect ke halaman detail konsultasi masuk
        return redirect()->route('detail.pendampingan', $id);
    }

    public function detail($id)
{
    $k = Konsultasi::findOrFail($id);
    return view('admin.konsultasi.detail', compact('k'));
}
    
public function jawab_konsultasi(Request $request, $id)
{

    $request->validate([
        
        'dokumen_jawaban' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx,webp|max:5120',

    ]);

    $dokumen_jawaban = null;
if ($request->hasFile('dokumen_jawaban')) {
    $file = $request->file('dokumen_jawaban');
    $dokumen_jawaban = time() . '_' . $file->getClientOriginalName();
    $file->move('photos', $dokumen_jawaban);
}


     Konsultasi::where('id', $id)->update([
        'status' => 2,
        'jawaban' => $request->jawaban,
        'dokumen_jawaban' => $dokumen_jawaban,
    ]);

    return redirect()->back()->with('jawab_konsultasi', 'Konsultasi telah terjawab!');
}
}

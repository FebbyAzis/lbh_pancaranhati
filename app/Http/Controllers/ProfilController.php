<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Users;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function profil()
    {
        $user = Auth::user();
        $users = $user->id;
        return view('profil',compact('user', 'user'));
    }

    public function edit_data(Request $request, $id)
    {

        Users::where('id', $id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'no_tlp' => $request->no_tlp,
            'ttl' => $request->ttl,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
        ]);

        return redirect()->back()->with('edit_data', 'Data anda berhasil diubah!');
    }

    public function edit_foto(Request $request, $id)
    {
        $this->validate($request, [
            'foto_profil' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:5120'
        ]);
    
        $jenisTas = Users::findOrFail($id);
    
        // Jika ada foto_profil baru di-upload
        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $nama_file = time().'_'.$file->getClientOriginalName();
            $tujuan_upload = 'photos';
            $file->move($tujuan_upload, $nama_file);
    
            // Hapus foto_profil lama jika ada
            if (!empty($jenisTas->foto_profil)) {
                $foto_profil_lama = public_path('photos/'.$jenisTas->foto_profil);
                if (file_exists($foto_profil_lama) && is_file($foto_profil_lama)) {
                    unlink($foto_profil_lama);
                }
            }
    
            // Update dengan foto_profil baru
            $jenisTas->foto_profil = $nama_file;
        }
        $jenisTas->save();
        
        return redirect()->back()->with('edit_foto', 'Foto profil berhasil diubah!');
    }
}

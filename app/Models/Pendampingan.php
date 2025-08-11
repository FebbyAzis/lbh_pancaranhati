<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jadwal;
use App\Models\Users;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pendampingan extends Model
{
    use HasFactory;

   protected $table = 'pendampingan';

    protected $fillable = [
        'users_id',
        'judul_permohonan',
        'kategori_masalah',
        'detail_kasus',
        'lokasi_pendampingan',
        'tanggal_permintaan',
        'urgensi',
        'dokumen_pendukung',
        'kontak_aktif',
        // 'persetujuan',
        'status',
        'tanggal_pelaksanaan',
        'petugas', // jika Anda tambahkan kolom ini
        
    ];

   public function jadwal()
{
    return $this->hasOne(Jadwal::class, 'pendampingan_id');
}

}

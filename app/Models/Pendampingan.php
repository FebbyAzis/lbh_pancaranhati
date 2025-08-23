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
        'surat_panggilan_sidang',
        'bukti_transaksi',
        'akta',
        'perjanjian',
        'ktp',
        'bukti_lainnya',
        'kontak_aktif',
        // 'persetujuan',
        'status',
        'catatan',
        'dokumen_admin',
        'notifikasi', // jika Anda tambahkan kolom ini
        
    ];

   public function jadwal()
{
    return $this->hasOne(Jadwal::class, 'pendampingan_id');
}

protected static function booted()
{
    static::created(function ($pendampingan) {
        // kirim notifikasi saat data baru ditambahkan
        foreach (\App\Models\Users::all() as $user) {
            $user->notify(new \App\Notifications\DataChangedNotification('Pendampingan', 'ditambahkan'));
        }
    });

    static::updated(function ($pendampingan) {
        foreach (\App\Models\Users::all() as $user) {
            $user->notify(new \App\Notifications\DataChangedNotification('Pendampingan', 'diubah'));
        }
    });
}

}

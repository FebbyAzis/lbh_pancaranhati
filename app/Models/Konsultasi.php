<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Users;

class Konsultasi extends Model
{
    use HasFactory;

   protected $table = 'konsultasi';

    protected $fillable = [
        'users_id',
        'judul',
        'kategori',
        'deskripsi',
        'dokumen',
        'metode_tanggapan',
        'kontak', 
        'status',
        'jawaban',
        'notifikasi',// jika Anda tambahkan kolom ini
    ];

     public function users(): BelongsTo
    {
        return $this->belongsTo(Users::class);
    }

    protected static function booted()
{
    static::created(function ($konsultasi) {
        foreach (\App\Models\Users::all() as $user) {
            $user->notify(new \App\Notifications\DataChangedNotification('Konsultasi', 'ditambahkan'));
        }
    });

    static::updated(function ($konsultasi) {
        foreach (\App\Models\Users::all() as $user) {
            $user->notify(new \App\Notifications\DataChangedNotification('Konsultasi', 'diubah'));
        }
    });
}

}

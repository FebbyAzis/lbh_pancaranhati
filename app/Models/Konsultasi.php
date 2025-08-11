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
        'judul',
        'kategori',
        'deskripsi',
        'dokumen',
        'privasi',
        'metode_tanggapan',
        'kontak',
        'setuju_syarat',
        'tfidf_response', // jika Anda tambahkan kolom ini
    ];

     public function users(): BelongsTo
    {
        return $this->belongsTo(Users::class);
    }
}

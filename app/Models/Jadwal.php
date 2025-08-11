<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Users;
use App\Models\Pendampingan;


class Jadwal extends Model
{
    use HasFactory;

   protected $table = 'jadwal';

    protected $fillable = [
        'pendampingan_id',
        'petugas_id',
        'judul_acara',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'lokasi',
        'status',
        
    ];

    public function petugas(): BelongsTo
    {
        return $this->belongsTo(Users::class, 'petugas_id');
    }

    public function pendampingan(): BelongsTo
{
    return $this->belongsTo(Pendampingan::class, 'pendampingan_id');
}
}

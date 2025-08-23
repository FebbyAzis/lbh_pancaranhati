<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Jadwal;
use App\Models\DetailJadwal;
use App\Models\Konsultasi;
use App\Models\Pendampingan;
use Illuminate\Notifications\Notifiable;

class Users extends Model
{
    use HasFactory;
    use Notifiable;

   protected $table = 'users';

    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'role',
        'no_tlp',
        'ttl',
        'jenis_kelamin',
        'alamat',
        'foto_profil'
    ];

    public function jadwal(): HasMany
    {
        return $this->hasMany(Jadwal::class);
    }

    public function konsultasi(): HasMany
    {
        return $this->hasMany(Konsultasi::class);
    }

    public function detail_jadwal(): HasMany
    {
        return $this->hasMany(DetailJadwal::class);
    }


}

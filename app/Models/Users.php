<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Jadwal;
use App\Models\Konsultasi;
use App\Models\Pendampingan;

class Users extends Model
{
    use HasFactory;

   protected $table = 'users';

    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'role',
        
    ];

    public function jadwal(): HasMany
    {
        return $this->hasMany(Jadwal::class);
    }

    public function konsultasi(): HasMany
    {
        return $this->hasMany(Konsultasi::class);
    }


}

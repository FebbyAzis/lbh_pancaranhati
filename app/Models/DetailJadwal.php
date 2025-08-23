<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Users;

class DetailJadwal extends Model
{
    use HasFactory;

    protected $table = 'detail_jadwal';

    public function users(): BelongsTo
{
    return $this->belongsTo(Users::class);
}

protected static function booted()
{
    static::created(function ($jadwal) {
        foreach (\App\Models\Users::all() as $user) {
            $user->notify(new \App\Notifications\DataChangedNotification('Detail Jadwal', 'ditambahkan'));
        }
    });

    static::updated(function ($jadwal) {
        foreach (\App\Models\Users::all() as $user) {
            $user->notify(new \App\Notifications\DataChangedNotification('Detail Jadwal', 'diubah'));
        }
    });
}

}

<?php

namespace App\Models;


use App\User;
use Illuminate\Database\Eloquent\Model;

class LegalEntity extends Model
{
    // Указываем, какие атрибуты можно массово назначать
    protected $fillable = [
        'name',
        'inn',
        'phone',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

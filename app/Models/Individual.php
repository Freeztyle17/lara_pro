<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Individual extends Model
{
    // Указываем, какие атрибуты можно массово назначать
    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'passport_series',
        'passport_number',
        'phone',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

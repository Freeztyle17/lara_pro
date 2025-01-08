<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conservation extends Model
{
    use HasFactory;

    protected $fillable = ['warehouse_id', 'user_id'];

    // Связь с моделью Warehouse
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    // Связь с моделью User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

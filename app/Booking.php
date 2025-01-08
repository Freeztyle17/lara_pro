<?php

namespace App;

use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['user_id', 'slot_id', 'status', 'start_date', 'end_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function slot()
    {
        return $this->belongsTo(Slot::class);
    }

    public function warehouse()
    {
        return $this->slot->warehouse(); // Используем связь с Slot для получения Warehouse
    }
}

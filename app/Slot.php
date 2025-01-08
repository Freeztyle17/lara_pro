<?php

namespace App;

use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $fillable = ['warehouse_id', 'row', 'column', 'status'];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}

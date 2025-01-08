<?php

namespace App\Models;


use App\Slot;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{

    protected $fillable = ['name', 'city', 'address', 'size', 'description', 'img_numb'];

    public function slots()
    {
        return $this->hasMany(Slot::class);
    }

}

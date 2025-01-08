<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $fillable = ['user_id', 'slot_id', 'destination', 'cost'];
}

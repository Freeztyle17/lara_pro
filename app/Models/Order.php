<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Указываем, какие атрибуты можно массово назначать
    protected $fillable = [
        'warehouse_district_id',
        'warehouse_zone_id',
        'warehouse_id',
        'section_id',
        'user_id',
        'reservation_start',
        'reservation_end',
    ];

    // Определяем отношение "принадлежит" к модели WarehouseDistrict
    public function warehouseDistrict()
    {
        return $this->belongsTo(WarehouseDistrict::class);
    }

    // Определяем отношение "принадлежит" к модели WarehouseZone
    public function warehouseZone()
    {
        return $this->belongsTo(WarehouseZone::class);
    }

    // Определяем отношение "принадлежит" к модели Warehouse
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    // Определяем отношение "принадлежит" к модели Section
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    // Определяем отношение "принадлежит" к модели User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

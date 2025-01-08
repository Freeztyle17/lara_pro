<?php

use Illuminate\Database\Seeder;
use App\Models\Warehouse;

class WarehouseSeeder extends Seeder
{
    public function run()
    {
        factory(Warehouse::class, 12)->create();
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Models\City;


class CitySeeder extends Seeder
{
    public function run()
    {
        factory(City::class, 3)->create();
    }
}

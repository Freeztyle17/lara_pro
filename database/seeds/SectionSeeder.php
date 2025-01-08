<?php

use Illuminate\Database\Seeder;
use App\Models\Section;
use App\Models\Warehouse;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $warehouses = Warehouse::all();

        $warehouses->each(function ($warehouse) {
            factory(Section::class, 4)->create([
                'warehouse_id' => $warehouse->id,
            ]);
        });
    }
}

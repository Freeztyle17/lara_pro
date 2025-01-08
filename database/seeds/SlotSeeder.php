<?php


use App\Slot;
use App\Models\Warehouse;
use Illuminate\Database\Seeder;

class SlotSeeder extends Seeder
{
    public function run()
    {
        // Для каждого склада создаем места
        Warehouse::all()->each(function ($warehouse) {

            for ($row = 1; $row <= 8; $row++) {
                for ($column = 1; $column <= 12; $column++) {
                    factory(Slot::class)->create([
                        'warehouse_id' => $warehouse->id,
                        'row' => $row,
                        'column' => $column,
                        'status' => ['available', 'booked'][rand(0, 1)],
                    ]);
                }
            }
        });
    }
}

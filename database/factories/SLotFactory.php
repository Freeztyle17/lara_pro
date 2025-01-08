<?php

namespace Database\Factories;

use App\Slot;
use App\Models\Warehouse;
use Faker\Generator as Faker;

$factory->define(Slot::class, function (Faker $faker) {

    return [
        'warehouse_id' => (Warehouse::class), // Создает склад для места
        'row' => $this->faker->numberBetween(1, 8),
        'column' => $this->faker->numberBetween(1, 12),
        'status' => $this->faker->randomElement(['available', 'booked']),
    ];
});

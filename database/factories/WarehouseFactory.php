<?php
namespace Database\Factories;

use Faker\Generator as Faker;
use App\Models\Warehouse;

$factory->define(Warehouse::class, function (Faker $faker) {

    $cities = ["Москва", "Саратов", "Волгоград", "Пенза"];

    return [
        'name' => $this->faker->company() . '-WH-' . $faker->numberBetween(1, 100),
        'city' => $this->faker->randomElement($cities),
        'address' => $this->faker->streetAddress(),
        'size' => $faker->numberBetween(1, 20) . " по " . $faker->numberBetween(10, 100) . "м²",
        'description' => $this->faker->paragraph(),
        'img_numb' => $faker->numberBetween(1, 20) . ".jpg",
    ];
});

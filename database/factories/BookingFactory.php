<?php

namespace Database\Factories;

use App\Booking;
use App\Slot;
use App\User;
use Faker\Generator as Faker;

$factory->define(Booking::class, function (Faker $faker) {

    return [
        'user_id' => factory(User::class), // Создает пользователя для бронирования
        'slot_id' => factory(Slot::class), // Создает место для бронирования
        'status' => $this->faker->randomElement(['pending', 'confirmed']),
        'start_date' => $this->faker->dateTimeBetween('now', '+1 month'),
        'end_date' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
    ];
});

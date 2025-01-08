<?php

namespace Database\Factories;
use Faker\Generator as Faker;
use App\RegisterAdmin;

$factory->define(RegisterAdmin::class, function (Faker $faker) {
return [
'first_name' => $faker->firstName,
'last_name' => $faker->lastName,
'phone' => $faker->phoneNumber,
'address' => $faker->address,
'user_id_fk' => null,
];
});

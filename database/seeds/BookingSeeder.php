<?php


use App\RegisterAdmin;
use App\Slot;
use App\User;
use App\Booking;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    public function run()
    {
        // Создаем пользователей и бронирования
        factory(User::class, 10)->create()->each(function ($user) {
            Slot::inRandomOrder()->take(10)->get()->each(function ($slot) use ($user) {
                factory(Booking::class)->create([
                    'user_id' => $user->id,
                    'slot_id' => $slot->id,
                ]);
            });
        });
        $user = factory(User::class)->create([
            'password' => bcrypt('5242') ,
            'role_id_fk'=>1
        ]); // Создаём пользователя
        factory(RegisterAdmin::class)->create([
            'user_id_fk' => $user->id, // Связываем с пользователем
        ]);
    }
}

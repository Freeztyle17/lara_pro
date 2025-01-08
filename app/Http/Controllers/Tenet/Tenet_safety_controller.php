<?php

namespace App\Http\Controllers\Tenet;

use App\Booking;
use App\SafeSelection;
use Illuminate\Http\Request;

class Tenet_safety_controller
{
    public function showSafes()
    {

        // Получение ID текущего пользователя
        $userId = auth()->id();

        // Получаем все бронирования текущего пользователя и связанные с ними слоты
        $userBookedSlots = Booking::with('slot')
            ->where('user_id', $userId)  // Фильтруем по пользователю
            ->get(); // Получаем все бронирования пользователя

        $safeCosts = [
            'small' => 5000,
            'medium' => 10000,
            'large' => 20000,
        ];

        return view('Tenet.tenet_safety_select', compact('userBookedSlots', 'safeCosts'));
    }

    public function storeSafeSelection(Request $request)
    {
        $validated = $request->validate([
            'safe_type' => 'required|in:small,medium,large'
        ]);

        $safeCosts = [
            'small' => 5000,
            'medium' => 10000,
            'large' => 20000,
        ];

        $selectedSafe = $request->input('safe_type');
        $cost = $safeCosts[$selectedSafe];

        // Логика сохранения выбора в базе данных
        SafeSelection::create([
            'user_id' => auth()->id(),
            'slot_id' => $request->get('slot_id'),
            'position' => $request->get('position'),
            'safe_type' => $selectedSafe,
            'cost' => $cost,
        ]);

        return back()->with('success', 'Вы успешно выбрали сейф!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Models\Warehouse;
use App\Slot;
use App\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function showRates()
    {

        // Получение ID текущего пользователя
        $userId = auth()->id();

        // Получаем все бронирования текущего пользователя и связанные с ними слоты
        $userBookedSlots = Booking::with('slot')
            ->where('user_id', $userId)  // Фильтруем по пользователю
            ->get(); // Получаем все бронирования пользователя

        $rates = [
        'city' => 1000,
        'region' => 5000,
        'country' => 15000,
        ];

        return view('Tenet.transport_select', compact('userBookedSlots', 'rates'));
    }

    public function ship(Request $request)
    {
        $request->validate([
            'slot_id' => 'required|exists:slots,id',
            'destination' => 'required|string|max:255',
            'rate_type' => 'required|in:city,region,country',
        ]);

        $rateCost = [
            'city' => 1000,
            'region' => 5000,
            'country' => 15000,
        ][$request->rate_type];

        // Логика оформления транспортировки
        Transport::create([
            'user_id' => auth()->id(),
            'slot_id' => $request->slot_id,
            'destination' => $request->destination,
            'cost' => $rateCost,
        ]);

        return redirect()->route('transport.rates')->with('success', 'Транспортировка оформлена успешно!');
    }

    public function transport_view() {
        return view('Tenet.transport_select');
    }
}

<?php
namespace App\Http\Controllers;


use App\Booking;
use App\Conservation;
use App\Models\Warehouse;
use App\Slot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function reserve(Request $request)
    {
        $slotIds = explode(',', $request->get('slots'));

        $slots = Slot::whereIn('id', $slotIds)->get();
        foreach ($slots as $slot) {
            if($slot->status != 'available') {
                return back()->withErrors(['message' => 'Некоторые из выбранных слотов уже заняты.']);
            }

            // Записать в таблицу Booking
            Booking::create([
                'slot_id' => $slot->id,
                'user_id' => Auth::id(),
                'start_date' => now(),
                'end_date' => now(),
            ]);
        }

        Slot::whereIn('id', $slotIds)->update(['status' => 'booked']);

        return back()->with('success', 'Слоты успешно забронированы');
    }
}

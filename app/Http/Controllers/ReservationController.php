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
    public function showBookings()
    {
        // Получаем все бронирования для текущего пользователя
        $userBookings = Booking::where('user_id', auth()->id())
            ->with('slot.warehouse') // Подгружаем склады через слот
            ->paginate(10);

        return view('Tenet.tenet_user_services', compact('userBookings'));
    }

    public function reserve(Request $request)
    {
        $slotIds = explode(',', $request->get('slots'));
        $slotsStartDate = $request->get('start_date');
        $slotsEndDate = $request->get('end_date');


        $slots = Slot::whereIn('id', $slotIds)->get();
        foreach ($slots as $slot) {
            if($slot->status != 'available') {
                return back()->withErrors(['message' => 'Некоторые из выбранных слотов уже заняты.']);
            }

            // Записать в таблицу Booking
            Booking::create([
                'slot_id' => $slot->id,
                'user_id' => Auth::id(),
                'start_date' => $slotsStartDate,
                'end_date' => $slotsEndDate,
            ]);
        }

        Slot::whereIn('id', $slotIds)->update(['status' => 'booked']);

        return back()->with('success', 'Слоты успешно забронированы');
    }
}

<?php

namespace App\Http\Controllers;


use App\Booking;
use App\Models\Warehouse;
use App\Slot;
use Illuminate\Http\Request;

class WarehouseDistrictController extends Controller
{
    public function showWarehouses($districtId)
    {


        $warehouse = Warehouse::with('slots')->find($districtId);
        $slots = Slot::where('warehouse_id', $districtId)->get();

        // Получение ID текущего пользователя
        $userId = auth()->id();

        // Получение списка ID слотов, арендованных текущим пользователем
        $userBookedSlots = Booking::where('user_id', $userId)
            ->whereHas('slot', function ($query) use ($districtId) {
                $query->where('warehouse_id', $districtId);
            })
            ->pluck('slot_id')
            ->toArray();

        return view('Tenet.select', compact('warehouse', 'slots', 'userBookedSlots'));
    }

    public function filterSlots(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Получаем все слоты с их статусами
        $slots = Slot::all()->map(function ($slot) use ($startDate, $endDate) {
            $isBooked = Booking::where('slot_id', $slot->id)
                ->where(function ($query) use ($startDate, $endDate) {
                    $query->whereBetween('start_date', [$startDate, $endDate])
                        ->orWhereBetween('end_date', [$startDate, $endDate])
                        ->orWhere(function ($query) use ($startDate, $endDate) {
                            $query->where('start_date', '<=', $startDate)
                                ->where('end_date', '>=', $endDate);
                        });
                })
                ->exists();

            return [
                'id' => $slot->id,
                'row' => $slot->row,
                'column' => $slot->column,
                'status' => $isBooked ? 'booked' : 'free',
            ];
        });

        return response()->json($slots);
    }

    public function reserve(Request $request)
    {
        $slotIds = explode(',', $request->get('slots'));

        $slots = Slot::whereIn('id', $slotIds)->get();
        foreach ($slots as $slot) {
            if($slot->status != 'available') {
                return back()->withErrors(['message' => 'Некоторые из выбранных слотов уже заняты.']);
            }
        }

        Slot::whereIn('id', $slotIds)->update(['status' => 'booked']);

        return back()->with('success', 'Слоты успешно забронированы');
    }
}

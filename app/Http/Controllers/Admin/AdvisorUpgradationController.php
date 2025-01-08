<?php

namespace App\Http\Controllers\Admin;
use App\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\User;

class AdvisorUpgradationController extends Controller
{
    public function advisor_upgrade_view(){
        $perPage = 10;
        $bookings = Booking::where('status', 'pending')->paginate($perPage);
        return view('Admin.advisor_upgradation', compact('bookings'));
    }
    public function admin_upgrade_to_advisor(Request $req,$id) {
        $req->validate([
            'status' => 'required|in:confirmed,cancelled',
        ]);
        $booking = Booking::findOrFail($id);
        if ($req->status === 'confirmed') {
            $booking->slot->status = 'booked';
            $booking->slot->save();
        }
        $booking->status = $req->status;
        $booking->save();
            return redirect()->back();
    }
}

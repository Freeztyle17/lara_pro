<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TenetInfoController extends Controller
{
    public function tenet_info_view(){
        $perPage = 10;
        $bookings = Booking::paginate($perPage);
        return view('Admin.tenet_info',compact('bookings'));
    }
}

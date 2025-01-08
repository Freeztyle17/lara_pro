<?php

namespace App\Http\Controllers\Tenet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Tenet_Dashboard_controller extends Controller
{
    public function dashboard_view() {
        return view('Tenet.tenet_dashboard');
    }

    public function index(Request $request)
    {
        // Получаем все склады, если фильтр не задан
        $warehouses = \App\Models\Warehouse::query();

        // Если передан параметр города, фильтруем по нему
        if ($request->has('city') && $request->city != '') {
            $warehouses->where('city', $request->city);
        }

        // Получаем все склады с фильтром
        $warehouses = $warehouses->get();

        return view('Tenet.tenet_dashboard', compact('warehouses'));
    }
}

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
    // Получаем города из запроса
    $city = $request->get('city');
    
    // Фильтруем склады по городу, если он выбран
    $warehouses = \App\Models\Warehouse::when($city, function ($query, $city) {
        return $query->where('city', $city);
    })->get();

    return view('warehouses.index', compact('warehouses'));
}
}

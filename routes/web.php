<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');

// jeneral route
Route::get('about','LinkController@about')->name('about');
Route::get('blog','LinkController@blog')->name('blog');
Route::get('contact','LinkController@contact')->name('contact');
Route::get('index','LinkController@index')->name('index');
Route::get('postdetail','LinkController@postdetail')->name('postdetail');
Route::get('postpage','LinkController@postpage')->name('postpage');
Route::post('profile_pic','SearchPropertyController@profile_picture')->name('profile_picture');
// Route For Search Property
Route::post('search','SearchPropertyController@search_property')->name('search_property');
//Login
Route::post('Dashboard','Advisor\RegisterForAdvisorController@login')->name('login');
// Route For Tenet
Route::get('TenetForm','Tenet\RegisterForTenetController@signup')->name('signuptenet');
Route::post('TenetRegister','Tenet\RegisterForTenetController@registerfortenet')->name('registerfortenet');
Route::get('dashboard','Tenet\Tenet_Dashboard_controller@dashboard_view')->name('tenet_dashboard_view');
//Route::get('userServices','Tenet\Tenet_UserServices_controller@userServices_view')->name('tenet_user_services_view');
Route::get('userServices','ReservationController@showBookings')->name('tenet_user_services_view');

Route::get('tenet_profile','Tenet\Tenet_Profile_Controller@tenet_profile')->name('tenet_profile');
Route::get('conversation','Tenet\Tenet_Conversation_Controller@tenet_conversation')->name('tenet_conversation');
Route::resource('update_tenet','UpdateTenetProfileController');
Route::get('inbox/{id}','MessageController@inbox')->name('con');
Route::get('message/{id}','MessageController@messagebox')->name('inbox');
Route::post('messageinsert','MessageController@insert')->name('sendmessage');
Route::get('applicant/message/{id}','MessageController@messagebox')->name('showmessagebox'); // Change route for adivsor conversation to this.
Route::post('usertyping','MessageController@typing')->name('usertyping');
Route::post('usernottyping','MessageController@nottyping')->name('usernottyping');
Route::post('readuserstatus','MessageController@readuserstatus')->name('readuserstauts');
Route::post('readusermessage','MessageController@readusermessage')->name('readusermessage');
Route::post('readunseenmessage','MessageController@readunseenmessage')->name('readunseenmessage');
// Route::get('Dashboard','Tenet\RegisterForTenetController@signin')->name('tenet_dash');

//Route::get('','TransportController@transport_view')->name('tenet_transport_view');
Route::get('tenet_transport_view', 'TransportController@showRates')->name('tenet_transport_view');
Route::get('tenet_safety_select_view', 'Tenet\Tenet_safety_controller@showSafes')->name('tenet_safety_select_view');
Route::post('tenet_safety_select_view/save_safety_select', 'Tenet\Tenet_safety_controller@storeSafeSelection')->name('save_safety_select');
Route::get('/warehouses', [WarehouseController::class, 'index'])->name('warehouses.index');

// Route For Admin
Route::get('Admin','Admin\RegisterForAdminController@signup')->name('signupadmin');
Route::post('AdminRegister','Admin\RegisterForAdminController@registerforadmin')->name('registerforadmin');
Route::get('admin/dashboard','Admin\AdminDashboardController@admin_dashboard')->name('admin_dashboard');
Route::get('admin/advisor_upgrade','Admin\AdvisorUpgradationController@advisor_upgrade_view')->name('advisor_upgrade');
Route::get('admin/tenet_info','Admin\TenetInfoController@tenet_info_view')->name('tenet_info');
Route::get('admin/advisor_info','Admin\AdvisorInfoController@advisor_info_view')->name('advisor_info');
Route::get('admin/profile','Admin\AdminProfileController@admin_profile')->name('admin_profile');
Route::resource('admin_advisor_handler','AdminHandlerController');
Route::resource('admin_tenet_handler','AdminTenetController');
Route::resource('update_admin_profile','UpdateAdminProfileController');
Route::patch('advisor_upgrade/{booking}','Admin\AdvisorUpgradationController@admin_upgrade_to_advisor')->name('advisor_upgrade_id');



// Route For Advisor
Route::get('AdvisorForm','Advisor\RegisterForAdvisorController@signup')->name('signupadvisor');
Route::post('AdvisorRegister','Advisor\RegisterForAdvisorController@registerforadvisor')->name('registerforadvisor');
Route::get('Dashboard','Advisor\AdvisorDashboardController@advisor_dashboard')->name('advisor_dashboard');
Route::post('jazz_id','Advisor\AdvisorDashboardController@jazz_id')->name('jazz_id');
Route::get('Advisor_Post','Advisor\AdvisorPostController@advisor_post')->name('advisor_post');
Route::get('Advisor_Conversation','Advisor\AdvisorConversationController@advisor_conversation')->name('advisor_conversation');
Route::post('post','Advisor\AdvisorPostController@post')->name('post');
Route::resource('advisorpost','DeleteAdvisorPostController');
Route::get('Advisor_Profile','Advisor\AdvisorProfileController@advisor_profile')->name('advisor_profile');
Route::resource('advisor_update_profile','UpdateProfileAdvisorPostController');

use App\Booking;
use App\Http\Controllers\WarehouseDistrictController;
Route::get('warehouse-district/{id}/warehouses', [WarehouseDistrictController::class, 'showWarehouses'])->name('district.warehouses');
//Route::post('reserve', [WarehouseDistrictController::class, 'reserve'])->name('reserve.slots');

use App\Http\Controllers\TransportController;


Route::post('/transport/ship', 'TransportController@ship')->name('transport.ship');

use App\Models\Warehouse;
use App\Conservation;
use Illuminate\Support\Facades\Auth;

//Route::post('/reserve', function (Request $request) {
//    $selectedSlotsIds = $request->input('slots');  // Массив ID складов
//    $user = Auth::user();
//
//    foreach ($selectedSlotsIds as $slotId) {
//        // Обновляем статус склада на забронированный
//        $slot = Slot::find($slotId);
//        $slot->status = 'booked';
//        $slot->save();
//
//        // Создаем запись в таблице бронирования
//        Booking::create([
//            'slot_id' => $slotId,
//            'user_id' => $user->id,
//        ]);
//    }
//
//    return redirect()->route('district.warehouses', ['districtId' => $request->districtId]);
//});

use App\Http\Controllers\ReservationController;

Route::post('/reserve', [ReservationController::class, 'reserve'])->name('reserve');
Route::post('/api/filter-slots', [WarehouseDistrictController::class, 'filterSlots'])->name('filter-slots');


Route::get('dash', function () {
    return view('Advisor.advisorinbox');
});




Route::get('logout',function(){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('home');
})->name('logout');



Route::get('test', function () {


    dd($user_data);

});


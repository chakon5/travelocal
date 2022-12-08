<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserCRUDController;
use App\Http\Controllers\EntController;


// ------------------------------------------------
use App\Http\Controllers\TyperoomController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TypetravelController;
use App\Http\Controllers\ActtravelController;
use App\Http\Controllers\MenufoodController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\PackageController;

use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingpayController;

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GuideController;

use App\Http\Controllers\Dashboard;
// ------------------------------------------------

use App\Models\user;
use App\Models\entrepreneur;

// ------------------------------------------------
use App\Models\Typeroom;
use App\Models\Room;
use App\Models\Typetravel;
use App\Models\acttravel;
use App\Models\menufood;
use App\Models\activity;
use App\Models\package;

use App\Models\booking;
use App\Models\Bookingpay;

use App\Models\Employee;
use App\Models\guide;
// ------------------------------------------------

Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::resource('user', UserCRUDController::class)->middleware('is_admin');
    // Route::resource('typetravels', Type_travelCRUDController::class)->middleware('is_admin');
    Route::resource('acttravel', ActtravelController::class)->middleware('is_admin');
    Route::resource('menufood', MenufoodController::class)->middleware('is_admin');
    Route::resource('activity', ActivityController::class)->middleware('is_admin');
    // Route::resource('typeroom', TyperoomController::class)->middleware('is_admin');
    // Route::resource('room', RoomController::class)->middleware('is_admin');
    Route::resource('entrepreneur', EntController::class)->middleware('is_admin');
    // Route::resource('guide', GuideController::class)->middleware('is_admin');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function() {
//typeroom :: ประเภทห้องพัก
Route::get('/typeroom',[TyperoomController::class,'index'])->name('typeroom');
Route::get('/typeroom/create',[TyperoomController::class,'create'])->name('createTyperoom');
Route::post('/typeroom/add',[TyperoomController::class,'store'])->name('addTyperoom');
Route::get('/typeroom/edit/{id}',[TyperoomController::class,'edit']);
Route::post('/typeroom/update/{id}',[TyperoomController::class,'update'])->name('updateTyperoom');
Route::get('/typeroom/delete/{id}',[TyperoomController::class,'destroy']);

//room :: ห้องพัก
Route::get('/room',[RoomController::class,'index'])->name('room');
Route::get('/room/create',[RoomController::class,'create'])->name('createRoom');
Route::post('/room/add',[RoomController::class,'store'])->name('addRoom');
Route::get('/room/edit/{id}',[RoomController::class,'edit']);
Route::post('/room/update/{id}',[RoomController::class,'update'])->name('updateRoom');
Route::get('/room/delete/{id}',[RoomController::class,'destroy']);

Route::get('/room/detail',[RoomController::class,'detail'])->name('inventoryRoom');
Route::get('/change-status/{id}',[RoomController::class,'changeStatus']);

//typetravel :: ประเภทการท่องเที่ยว
Route::get('/typetravel',[TypetravelController::class,'index'])->name('typetravel');
Route::get('/typetravel/create',[TypetravelController::class,'create'])->name('createTypetravel');
Route::post('/typetravel/add',[TypetravelController::class,'store'])->name('addTypetravel');
Route::get('/typetravel/edit/{id}',[TypetravelController::class,'edit']);
Route::post('/typetravel/update/{id}',[TypetravelController::class,'update'])->name('updateTypetravel');
Route::get('/typetravel/delete/{id}',[TypetravelController::class,'destroy']);

//Acttravel :: กิจกรรมการเที่ยว
Route::get('/acttravel',[ActtravelController::class,'index'])->name('acttravel');
Route::get('/acttravel/create',[ActtravelController::class,'create'])->name('createActtravel');
Route::post('/acttravel/add',[ActtravelController::class,'store'])->name('addActtravel');
Route::get('/acttravel/edit/{id}',[ActtravelController::class,'edit']);
Route::post('/acttravel/update/{id}',[ActtravelController::class,'update'])->name('updateActtravel');
Route::get('/acttravel/delete/{id}',[ActtravelController::class,'destroy']);

//Menufood :: อาหาร
Route::get('/menufood',[MenufoodController::class,'index'])->name('menufood');
Route::get('/menufood/create',[MenufoodController::class,'create'])->name('createMenufood');
Route::post('/menufood/add',[MenufoodController::class,'store'])->name('addMenufood');
Route::get('/menufood/edit/{id}',[MenufoodController::class,'edit']);
Route::post('/menufood/update/{id}',[MenufoodController::class,'update'])->name('updateMenufood');
Route::get('/menufood/delete/{id}',[MenufoodController::class,'destroy']);

//Activity :: กิจกรรมเสริม
Route::get('/activity',[ActivityController::class,'index'])->name('activity');
Route::get('/activity/create',[ActivityController::class,'create'])->name('createActivity');
Route::post('/activity/add',[ActivityController::class,'store'])->name('addActivity');
Route::get('/activity/edit/{id}',[ActivityController::class,'edit']);
Route::post('/activity/update/{id}',[ActivityController::class,'update'])->name('updateActivity');
Route::get('/activity/delete/{id}',[ActivityController::class,'destroy']);


//Package :: แพ็คเกจท่องเที่ยว
Route::get('/package',[PackageController::class,'index'])->name('package');
Route::get('/package/create',[PackageController::class,'create'])->name('createPackage');
Route::post('/package/add',[PackageController::class,'store'])->name('addPackage');
Route::get('/package/edit/{id}',[PackageController::class,'edit']);
Route::post('/package/update/{id}',[PackageController::class,'update'])->name('updatePackage');
Route::get('/package/delete/{id}',[PackageController::class,'destroy']);

// ---------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------
//Booking :: การจอง
Route::get('/booking',[BookingController::class,'index'])->name('booking');
Route::get('/bookingpackage',[BookingController::class,'indexpackage'])->name('bookingpackage');
Route::get('/bookingroom',[BookingController::class,'indexroom'])->name('bookingroom');
Route::get('/booking/create',[BookingController::class,'create'])->name('createBooking');
Route::post('/booking/add',[BookingController::class,'store'])->name('addBooking');
Route::get('/booking/edit/{id}',[BookingController::class,'edit']);
Route::post('/booking/update/{id}',[BookingController::class,'update'])->name('updateBooking');
Route::get('/booking/delete/{id}',[BookingController::class,'destroy']);

Route::get('/booking/detailBooking/{id}',[BookingController::class,'detail'])->name('detailBooking');
//Status Update :: อัพเดทสถานะการจอง
Route::get('/change-statusbk/{id}',[BookingController::class,'changeStatusBooking']);

// Route::post('/booking/next',[BookingController::class,'next'])->name('nextBooking');

//BookingPay :: การชำระเงิน
Route::get('/bookingpay',[BookingpayController::class,'index'])->name('bookingpay');
Route::get('/bookingpay/create',[BookingpayController::class,'create'])->name('createBookingpay');
Route::post('/bookingpay/add',[BookingpayController::class,'store'])->name('addBookingpay');
Route::get('/bookingpay/edit/{id}',[BookingpayController::class,'edit']);
Route::post('/bookingpay/update/{id}',[BookingpayController::class,'update'])->name('updateBookingpay');
Route::get('/bookingpay/delete/{id}',[BookingpayController::class,'destroy']);

//Payment :: ดูสถานะการชำระเงิน
Route::get('/payment/detailPayment/{id}',[BookingpayController::class,'detail'])->name('detailPayment');
//Status Update :: อัพเดทสถานะการชำระเงิน
Route::get('/change-statusbp/{id}',[BookingpayController::class,'changeStatusBookingpay']);

// ---------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------

//Employee :: พนักงาน
Route::get('/employee',[EmployeeController::class,'index'])->name('employee');
Route::get('/employee/create',[EmployeeController::class,'create'])->name('createEmployee');
Route::post('/employee/add',[EmployeeController::class,'store'])->name('addEmployee');
Route::get('/employee/edit/{id}',[EmployeeController::class,'edit']);
Route::post('/employee/update/{id}',[EmployeeController::class,'update'])->name('updateEmployee');
Route::get('/employee/delete/{id}',[EmployeeController::class,'destroy']);

// Guide :: ไกด์นำเที่ยว
Route::get('/guide',[GuideController::class,'index'])->name('guide');
Route::get('/guide/create',[GuideController::class,'create'])->name('createGuide');
Route::post('/guide/add',[GuideController::class,'store'])->name('addGuide');
Route::get('/guide/edit/{id}',[GuideController::class,'edit']);
Route::post('/guide/update/{id}',[GuideController::class,'update'])->name('updateGuide');
Route::get('/guide/delete/{id}',[GuideController::class,'destroy']);

//Status Update :: อัพเดทสถานะไกด์ ว่าง-ไม่ว่าง
Route::get('/change-statusguide/{id}',[GuideController::class,'changeStatusGuide']);

});
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
    return view('welcome');
});

Auth::routes();
//Front-End Web Customer
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/bookpg', [App\Http\Controllers\HomeController::class, 'bookpg'])->name('bookpg');
Route::get('/bookactivity', [App\Http\Controllers\HomeController::class, 'bookactivity'])->name('bookactivity');
Route::get('/bookroom', [App\Http\Controllers\HomeController::class, 'bookroom'])->name('bookroom');

Route::get('/showbooking', [App\Http\Controllers\HomeController::class, 'showbooking'])->name('showbooking');
Route::get('/showbookroom', [App\Http\Controllers\HomeController::class, 'showbookroom'])->name('showbookroom');
Route::get('/showpackage/package/{id}', [App\Http\Controllers\HomeController::class, 'showpackage']);
Route::get('/showroom/room/{id}', [App\Http\Controllers\HomeController::class, 'showroom']);
Route::get('/showbooking/payment/{id}',[HomeController::class,'payment']);

Route::get('/payment', [App\Http\Controllers\HomeController::class, 'payment'])->name('payment');
Route::post('/payment/add',[BookingpayController::class,'store'])->name('addPayment');
// Route::get('/payment/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('payment');
Route::get('/showpayment', [App\Http\Controllers\HomeController::class, 'showpayment'])->name('showpayment');


//Back-End
// Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('admin/home', [Dashboard::class, 'index'])->name('admin.home')->middleware('is_admin');
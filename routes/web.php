<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserCRUDController;

use App\Http\Controllers\ActtravelController;
use App\Http\Controllers\MenufoodController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\EntController;
use App\Http\Controllers\GuideController;

// ------------------------------------------------
use App\Http\Controllers\TyperoomController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TypetravelController;
// ------------------------------------------------

use App\Models\user;

use App\Models\acttravel;
use App\Models\menufood;
use App\Models\activity;
use App\Models\entrepreneur;
use App\Models\guide;

// ------------------------------------------------
use App\Models\Typeroom;
use App\Models\Room;
use App\Models\Typetravel;
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
    Route::resource('guide', GuideController::class)->middleware('is_admin');
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

//typetravel :: ประเภทการท่องเที่ยว
Route::get('/typetravel',[TypetravelController::class,'index'])->name('typetravel');
Route::get('/typetravel/create',[TypetravelController::class,'create'])->name('createTypetravel');
Route::post('/typetravel/add',[TypetravelController::class,'store'])->name('addTypetravel');
Route::get('/typetravel/edit/{id}',[TypetravelController::class,'edit']);
Route::post('/typetravel/update/{id}',[TypetravelController::class,'update'])->name('updateTypetravel');
Route::get('/typetravel/delete/{id}',[TypetravelController::class,'destroy']);

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

//Back-End
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');







Route::get('/customerdb', [App\Http\Controllers\HomeController::class, 'customerdb'])->name('customerdb');
Route::get('/customerinsert', [App\Http\Controllers\HomeController::class, 'customerinsert'])->name('customerinsert');

Route::middleware(['auth:sanctum', 'verified'])->get('/customerdb', function () {
    $users=DB::table('users')->get();
    return view('customerdb',compact('users'));
})->name('customerdb');
<?php

use App\Http\Controllers\DashBoard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\VisitorsLogController;
use Illuminate\Support\Facades\DB;

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

// Route::get('/', function () {
//     return view('auth.login');
// });

//Route::resource('visitors', VisitorController::class);

Route::prefix('visitors')->middleware('auth')->name('visitors.')->controller(VisitorController::class)->group(function () {
    Route::get('/index', 'index')->name('index');
    Route::get('/homePage', 'homePage')->name('homePage');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::get('/{id}', 'show')->name('show');
    Route::patch('/update/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
    Route::patch('/updateOnlyLogIn/{id}', 'updateOnlyLogIn')->name('updateOnlyLogIn');
    Route::patch('/{id}', 'updateOnlyLogOut')->name('updateOnlyLogOut');
    Route::get('/newpurpose/{id}', 'newpurpose')->name('newpurpose');
    Route::post('/storenewpurpose', 'storenewpurpose')->name('storenewpurpose');
});


  
Route::prefix('visitorlog')->middleware('auth')->name('visitorlog.')->controller(VisitorsLogController::class)->group(function () {
    Route::get('/index', 'index')->name('index');
    Route::get('/visitorsnotloggedout', 'visitorsnotloggedout')->name('visitorsnotloggedout');
    Route::get('/visitortoday', 'visitortoday')->name('visitortoday');
    Route::get('/totalvisitors', 'totalvisitors')->name('totalvisitors');
});




Route::prefix('users')->middleware('auth')->name('users.')->controller(UserController::class)->group(function () {
    Route::get('/index', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::get('/{id}', 'show')->name('show');
    Route::patch('/update/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
    Route::post('/restore/{id}', 'restore')->name('restore');
});





Route::prefix('auth')->name('auth.')->controller(LoginController::class)->group(function () {
    Route::get('/login', 'show')->name('show');
     Route::post('/logout', 'logout')->name('logout');
     Route::post('/login', 'login')->name('login');
});


Route::prefix('dashboard')->middleware('auth')->name('dashboard.')->controller(DashBoard::class)->group(function () {
    Route::get('/', 'dashboard')->name('dashboard');
    Route::get('/visitorsnotloggedout', 'visitorsnotloggedout')->name('visitorsnotloggedout');
    Route::get('/visitortoday', 'visitortoday')->name('visitortoday');
    Route::get('/totalvisitors', 'totalvisitors')->name('totalvisitors');
});



require __DIR__ . '/auth.php';

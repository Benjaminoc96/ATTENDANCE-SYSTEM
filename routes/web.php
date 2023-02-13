<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VisitorController;


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
    Route::get('/visitorslog', 'visitorslog')->name('visitorslog');
    Route::get('/viewTrashedVisitors', 'viewTrashedVisitors')->name('viewTrashedVisitors');
    Route::get('/homePage', 'homePage')->name('homePage');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::get('/{id}', 'show')->name('show');
    Route::patch('/update/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
    Route::post('/restoreVisitors/{id}', 'restoreVisitors')->name('restoreVisitors');
    Route::patch('/updateOnlyLogIn/{id}', 'updateOnlyLogIn')->name('updateOnlyLogIn');
    Route::patch('/{id}', 'updateOnlyLogOut')->name('updateOnlyLogOut');
    Route::post('/printVisitorLog', 'printVisitorLog')->name('printVisitorLog');
    
});



Route::prefix('auth')->name('auth.')->controller(LoginController::class)->group(function () {
    Route::get('/login', 'show')->name('show');
     Route::post('/logout', 'logout')->name('logout');
     Route::post('/login', 'login')->name('login');
});




Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard.dashboard');
    });



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

require __DIR__ . '/auth.php';

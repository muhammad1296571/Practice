<?php

use App\Http\Controllers\homecontroller;
use App\Http\Controllers\ProfileController;
use App\Models\contect;
use App\Models\wallet;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [homecontroller::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/user', [homecontroller::class, 'send_money'])->middleware(['auth', 'approved'])->name('send_money');


    Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //admin pags
    Route::get('/declined', [homecontroller::class, 'declined'])->middleware(['auth', 'admin'])->name('declined');
    Route::get('/approved', [homecontroller::class, 'approved'])->middleware(['auth', 'admin'])->name('approved');
    Route::get('/approved_user/{id}', [homecontroller::class, 'approved_user'])->middleware(['auth', 'admin']);
    Route::get('/delete/{id}', [homecontroller::class, 'destory']);
    Route::get('/change/{id}', [homecontroller::class, 'change_status']);

    Route::get('/move_trash/{id}', [homecontroller::class, 'remove']);


    Route::get('/declined_user/{id}', [homecontroller::class, 'declined_user'])->middleware(['auth', 'admin']);
    Route::get('/user_Transaction', [homecontroller::class, 'Transaction'])->name('Transaction')->middleware(['auth', 'admin']);
    Route::get('/user_tax', [homecontroller::class, 'u_tax'])->name('user_tax')->middleware(['auth', 'admin']);



    //user money 
    Route::post('/user', [homecontroller::class, 'money_store']);
    Route::get('/post', [homecontroller::class, 'post']);




    Route::post('/contect', [homecontroller::class, 'contect_store']);

});


Route::controller(homecontroller::class)->group(function () {
    Route::get('/future', 'future')->name('future');
    Route::get('/price', 'price')->name('price');
    Route::get('/contect', 'contect')->name('contect');

});







require __DIR__ . '/auth.php';

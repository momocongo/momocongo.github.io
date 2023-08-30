<?php

use App\Http\Controllers\ProfileController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', '\App\Http\Controllers\EventController@index')->name('superadmin.index_event');
Route::get('/show/{id}', '\App\Http\Controllers\EventController@show')->name('superadmin.show_event');

route::post('/paiements', '\App\Http\Controllers\TicketController@buyTicket')->middleware(['auth', 'verified'])->name('ticket.paiement');
Route::middleware(['auth', 'role:organizer'])->group(function () {
    // Routes pour les organisateurs
    Route::get('/edit/{id}', '\App\Http\Controllers\EventController@edit')->name('superadmin.edit_event');
    Route::put('/update/{id}', '\App\Http\Controllers\EventController@update')->name('superadmin.update_event');
    Route::get('/delete/{id}', '\App\Http\Controllers\EventController@destroy')->name('superadmin.destroy_event');
    Route::get('/create', '\App\Http\Controllers\EventController@create')->name('superadmin.create_event');
    Route::post('/store', '\App\Http\Controllers\EventController@store')->name('superadmin.store_event');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/tickets', '\App\Http\Controllers\TicketController@index')->name('superadmin.ticket');
Route::get('/tickets/{id}/show', '\App\Http\Controllers\TicketController@showTicket')->name('superadmin.show_ticket');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

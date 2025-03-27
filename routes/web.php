<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\WebController;

Route::get('/', function () {
    return view('front.index');
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('guest', GuestController::class);
});

Route::get('/dashboard', [GuestController::class, 'index'])->name('guest.index');
Route::post('/create', [GuestController::class, 'store'])->name('guest.store');
Route::get('/create', [GuestController::class, 'create'])->name('guest.create');
Route::get('/invitation/{slug}', [GuestController::class, 'show']);
Route::get('/edit', [WebController::class, 'index'])->name('web.index');

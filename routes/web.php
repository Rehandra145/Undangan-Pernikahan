<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\StoryController;

Route::get('/', function () {
    return view('front.index');
});

//tamu
Route::get('/tamu', [GuestController::class, 'index'])->name('guest.index');
Route::post('/create', [GuestController::class, 'store'])->name('guest.store');
Route::get('/create', [GuestController::class, 'create'])->name('guest.create');
Route::get('/invitation/{slug}', [GuestController::class, 'show']);

//event
Route::get('/dashboard', [WebController::class, 'index'])->name('web.index');
Route::post('/event', [WebController::class, 'store'])->name('web.store');
Route::get('/event/create', [WebController::class, 'create'])->name('web.create');

//story
Route::get('/stories', [StoryController::class, 'index'])->name('stories.index');
Route::get('/stories/create', [StoryController::class, 'create'])->name('stories.create');
Route::post('/stories/create', [StoryController::class, 'store'])->name('stories.store');

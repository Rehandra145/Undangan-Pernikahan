<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\StoryController;

Route::get('/', function () {
    return view('front.index');
});

//tamu
Route::get('/tamu', [GuestController::class, 'index'])->name('guest.index');
Route::post('/tamu/create', [GuestController::class, 'store'])->name('guest.store');
Route::get('/tamu/create', [GuestController::class, 'create'])->name('guest.create');
Route::get('/invitation/{slug}', [GuestController::class, 'show']);
Route::get('/tamu/edit/{id}', [GuestController::class, 'edit'])->name('guest.edit');
Route::put('/tamu/edit/{id}', [GuestController::class, 'update'])->name('guest.update');
Route::delete('/tamu/delete/{id}', [GuestController::class, 'destroy'])->name('guest.delete');

//event
Route::get('/dashboard', [WebController::class, 'index'])->name('web.index');
Route::post('/event/create', [WebController::class, 'store'])->name('web.store');
Route::get('/event/create', [WebController::class, 'create'])->name('web.create');

//story
Route::get('/stories', [StoryController::class, 'index'])->name('stories.index');
Route::get('/stories/create', [StoryController::class, 'create'])->name('stories.create');
Route::post('/stories/create', [StoryController::class, 'store'])->name('stories.store');
Route::delete('/stories/delete/{id}', [StoryController::class, 'destroy'])->name('stories.delete');
Route::get('/stories/edit/{id}', [StoryController::class, 'edit'])->name('stories.edit');
Route::put('/stories/update/{id}', [StoryController::class, 'update'])->name('stories.update');

//gallery
Route::get('/galleries', [GalleryController::class, 'index'])->name('galleries.index');
Route::post('/galleries', [GalleryController::class, 'store'])->name('galleries.store');
Route::delete('/galleries/delete/{id}', [GalleryController::class, 'destroy'])->name('galleries.delete');

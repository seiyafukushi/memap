<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\CloudinaryController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(AlbumController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'home')->name('home');
    Route::get('/create-region/{album}', 'create_region')->name('create-region');
    Route::post('/create-region/{album}', 'store_region')->name('store-region');
    Route::delete('/delete-region/{region}/{album}', 'delete_region')->name('delete-region');
    Route::post('/albums', 'store')->name('store');
    Route::get('/albums/create', 'create')->name('create');
    Route::get('/albums/{album}', 'show')->name('show');
    Route::put('/albums/{album}', 'update')->name('update');
    Route::delete('/albums/{album}', 'delete')->name('delete');
    Route::get('/albums/{album}/edit', 'edit')->name('edit');
});

Route::controller(CloudinaryController::class)->middleware(['auth'])->group(function(){
    Route::post('/cloudinary/create','store_create')->name('store-create');
    Route::post('/cloudinary/{album}','store')->name('store');
    Route::delete('/delete_image/{image}/{album}', 'delete_image')->name('delete-image');
});

Route::get('/', [AlbumController::class, 'home'])->name('home');

require __DIR__.'/auth.php';

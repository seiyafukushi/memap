<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;//外部にあるAlbumControllerクラスをインポート。
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

Route::get('/albums/create', [AlbumController::class, 'create']);
Route::get('/', [AlbumController::class, 'home']);

//Route::get('/', function() {
//    return view('albums/home');
//});

Route::get('/albums/{album}', [AlbumController::class ,'show']);

Route::get('/cloudinary', [CloudinaryController::class, 'cloudinary']);  //投稿フォームの表示
Route::post('/cloudinary', [CloudinaryController::class, 'cloudinary_store']);  //画像保存処理
Route::post('/albums', [AlbumController::class, 'store']);

Route::get('/albums/{album}/edit', [AlbumController::class, 'edit']);
Route::put('/albums/{album}', [AlbumController::class, 'update']);
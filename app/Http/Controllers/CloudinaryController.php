<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cloudinary;  //use宣言するのを忘れずに

class CloudinaryController extends Controller
{
    public function cloudinary()
    {
        return view('cloudinary');  //cloudinary.blade.phpを表示
    }

    public function cloudinary_store(Request $request)
    {
        //cloudinaryへ画像を送信し、画像のURLを$image_urlに代入している
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        dd($image_url);  //画像のURLを画面に表示
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cloudinary;  //use宣言するのを忘れずに
use App\Models\Image;
use App\Models\Album;

class CloudinaryController extends Controller
{
    public function cloudinary()
    {
        return view('cloudinary');  //cloudinary.blade.phpを表示
    }

    public function store(Request $request, Image $image, Album $album)
    {
        //cloudinaryへ画像を送信し、画像のURLを$image_urlに代入している
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $image->image_path = $image_url;
        $image->album_id = $album->id;
        $image->save();
        return redirect('/albums/' . $album->id .'/edit');
    }
    public function store_create(Request $request, Image $image)
    {
        //cloudinaryへ画像を送信し、画像のURLを$image_urlに代入している
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $image->image_path = $image_url;
        $image->save();
        return redirect('/albums/create');
    }
    
    public function delete_image(Image $image, Album $album)
    {
        $image->delete();
        return redirect('/albums/' . $album->id .'/edit');
    }
}
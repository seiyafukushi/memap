<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class AlbumController extends Controller
{
    public function index(Album $album)//インポートしたPostをインスタンス化して$postとして使用。
    {
        return $album->get();//$albumの中身を戻り値にする。
    }
}

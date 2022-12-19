<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Album;
use Cloudinary; 

class AlbumController extends Controller
{
    public function home(Album $album)//インポートしたPostをインスタンス化して$postとして使用。
    {
        return view('albums/home')->with(['albums' => $album->getPaginateBylimit()]); 
    }
    public function show(Album $album)
    {
        $albums = DB::table('albums')->get();
        return view('albums/show')->with(['an_album' => $album,'albums' => $albums]);
     //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    public function create()
    {
        return view('albums/create');
    }
    public function store(Request $request, Album $album)
    {
        $input = $request['album'];
        $album->fill($input)->save();
        return redirect('/albums/' . $album->id);
    }
}

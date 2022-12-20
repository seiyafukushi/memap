<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Album;
use Cloudinary; 
use App\Http\Requests\AlbumRequest;

class AlbumController extends Controller
{
    public function home(Album $album)//インポートしたPostをインスタンス化して$postとして使用。
    {
        return view('albums/home')->with(['latest_album' => $album->first(),'albums' => $album->getPaginateBylimit()]); 
    }
    public function show(Album $album)
    {
        $albums = Album::all();
        return view('albums/show')->with(['an_album' => $album,'albums' => $albums]);
     //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    public function create()
    {
        return view('albums/create');
    }
    public function store(AlbumRequest $request, Album $album )
    {
        $input = $request['album'];
        $album->fill($input)->save();
        return redirect('/albums/' . $album->id);
    }
    public function edit(Album $album)
    {
        return view('albums/edit')->with(['album' => $album]);
    }
    public function update(AlbumRequest $request, Album $album)
    {
        $input_album = $request['album'];
        $album->fill($input_album)->save();
    
        return redirect('/albums/' . $album->id);
    }
    public function delete(Album $album)
    {
        $album->delete();
        return redirect('/');
    }
}

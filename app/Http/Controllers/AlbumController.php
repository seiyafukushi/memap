<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Album;
use Cloudinary; 
use App\Http\Requests\AlbumRequest;
use App\Models\Image;
use App\Models\Region;

class AlbumController extends Controller
{
    public function home(Album $album, Region $region)//インポートしたPostをインスタンス化して$postとして使用。
    {
        $albums = Album::all();
        $album = $album->first();
        $images = $album->with('images')->find($album->id)->images;
        
        $addresses = array();
        foreach($album->regions as $region){
            array_push($addresses, $region->region_address);
        }
        return view('albums/home')->with(['latest_album' => $album->first(),'albums' => $album->getPaginateBylimit(), 'addresses'=>$addresses, 'images'=>$images]); 
    }
    public function create_region(Region $regions,Album $album)
    {
        return view('albums/create_region')->with(['regions' => $regions->get(), 'album'=>$album]);
    }
    public function store_region(Request $request, Album $album, Region $region)
    {
        $input = $request['region'];
        $region->fill($input)->save();
        $album->regions()->attach($region);
        return redirect('/albums/' . $album->id . '/edit');
    }
    public function delete_region(Region $region, Album $album)
    {
        $album->regions()->detach($region);
        $region->delete();
        return redirect('/albums/' . $album->id . '/edit');
    }
    public function show(Album $album,Region $regions)
    {
        $albums = Album::all();
        $images = $album->with('images')->find($album->id)->images;
        
        $addresses = array();
        foreach($album->regions as $region){
            array_push($addresses, $region->region_address);
        }
        return view('albums/show')->with(['an_album' => $album,'albums' => $albums, 'addresses'=>$addresses,'images'=>$images]);
     //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    public function create(Region $regions)
    {
        return view('albums/create')->with(['regions'=>$regions->get()]);
    }
    public function store(AlbumRequest $request, Album $album,Region $region)
    {
        $input = $request['album'];
        $album->fill($input)->save();
        $input = $request['region'];
        $region->fill($input)->save();
        $album->regions()->attach($region);
        return redirect('/albums/' . $album->id);
    }
    public function edit(Album $album,Region $regions)
    {
        //$albums = Album::all();
        $addresses = array();
        foreach($album->regions as $region){
            array_push($addresses, $region->region_address);
        }
        //dd($addresses);
        $images = $album->with('images')->find($album->id)->images;
        return view('albums/edit')->with(['album' => $album,'images'=>$images, 'addresses'=>$addresses, 'regions'=>$regions->get()]);
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

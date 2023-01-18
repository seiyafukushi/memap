<x-app-layout>
    <x-slot name="header">
        　<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Album edit') }}
        　</h2>
    </x-slot>
        <div class='albums flex justify-center font-serif'>
            <div class='album_regions p-4 basis-1/6　text-center'>
                <div class="region_list  p-2 bg-yellow-100 text-center">
                    <h2>Region List</h2>
                    @foreach ($album->regions as $album_region)
                        <div class="region border-2 border-red-200">
                            <p>{{ $album_region->region_name }}</p>
                            <p>{{ $album_region->region_address }}</p>
                            <form action="/delete-region/{{ $album_region->id }}/{{ $album->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button >delete</button>
                            </form>
                        </div>
                    @endforeach
                </div>
                <form action="/create-region/{{$album->id}}" method="POST" class="add_region p-2 bg-yellow-100 text-center">
                    @csrf
                    <h2>Add New Region</h2>
                    <div class="region_name">
                        <h2>Region Name</h2>
                        <textarea name="region[region_name]" placeholder="地名・場所名を記入"></textarea>
                    </div>
                    
                    <div class="region_address">
                        <h2>Region Address</h2>
                        <textarea name="region[region_address]" placeholder="都道府県から番地までを記入"></textarea>
                    </div>
                    <button class="bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-4 py-2"><input type="submit" value="追加"/></button>
                </form>
                <div class="flex">
                    <button class="footer bg-gradient-to-r from-blue-300 to-blue-800 hover:bg-gradient-to-l text-white rounded px-4 py-2 mx-auto justify-center">
                        <a href="/">ホームに戻る</a>
                    </button>
                </div>
            </div>
            
            <div class='album_show p-4 basis-3/6 text-center'>
                <form action="/albums/{{ $album->id }}/edit" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="album_name p-2">
                        <input type='text' name='album[album_name]' value="{{ $album->album_name }}">
                    </div>
                    <div id="map" style="height:500px">
                        @if($addresses)
                            @foreach($addresses as $address)
                                <span class="js-getVariable" data-region="{{ $address }}"></span>
                            @endforeach
                        @else
                            <h2>地図の代わりの画像</h2>
                        @endif
                	</div>
                    
                    <div class="album_date">
                        <h2>Date</h2>
                        <input type='date' name='album[album_date]' value="{{ $album->album_date }}">
                    </div>
                    <div class="album_memo">
                        <h2>Memo</h2>
                        <input type='text' name='album[album_memo]' value="{{ $album->album_memo }}">
                    </div>
                    <div class="user_id">
                        <input value="{{ Auth::user()->id }}" type="hidden" name="album[user_id]">
                    </div>
                    <button class="yp-4 bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-4 py-2">
                        <input type="submit" value="更新">
                    </button>
                </form>
                <form action="/albums/{{ $album->id }}" id="form_{{ $album->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-gradient-to-br from-red-300 to-red-800 hover:bg-gradient-to-tl text-white rounded px-4 py-2" type="button" onclick="deleteAlbum({{ $album->id }})">アルバム削除</button>
                </form>
            </div>
            
            <div class='album_images p-4 basis-2/6 text-center'>
                <form action="/cloudinary/{{$album->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col items-center ">
                        <input type="file" name="image">
                        <button class="bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded w-[100px] py-2">upload</button>
                    </div>
                </form>
                @foreach ($images as $image)
                        <h2 class='image'>
                            <img src={{$image->image_path}}>
                            <form action="/delete_image/{{ $image->id }}/{{ $album->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-gradient-to-br from-red-300 to-red-800 hover:bg-gradient-to-tl text-white rounded px-4 py-2">削除</button>
                            </form>
                        </h2>
                @endforeach
            </div>
        </div>
        <script>
            function deleteAlbum(id) {
                'use strict'
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
        <script src="{{ asset('/js/result.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyCBeFaRkGy6Qpk4Qts8Z45OmiXnt-55-v8&callback=initMap" async defer>
        </script>
</x-app-layout>
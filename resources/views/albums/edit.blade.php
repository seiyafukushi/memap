<x-app-layout>
    <x-slot name="header">
        　<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Album edit') }}
        　</h2>
    </x-slot>
        <h1 class="title">編集画面</h1>
        <h1>Album Names</h1>
        <div class='albums'>
            <h2>Region List</h2>
            @foreach ($album->regions as $album_region)
                <p>{{ $album_region->region_name }}</p>
                <p>{{ $album_region->region_address }}</p>
                <form action="/delete-region/{{ $album_region->id }}/{{ $album->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button >delete</button>
                </form>
            @endforeach
            
            <form action="/create-region/{{$album->id}}" method="POST">
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
                <input type="submit" value="store"/>
            </form>
            
            <div class="footer">
                <a href="/">戻る</a>
            </div>
            </div>
            
            <div class='album_show'>
                <form action="/albums/{{ $album->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="album_name">
                        <h2>Album Name</h2>
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
                        <h2>Album Date</h2>
                        <input type='date' name='album[album_date]' value="{{ $album->album_date }}">
                    </div>
                    <div class="album_memo">
                        <h2>Album Memo</h2>
                        <input type='text' name='album[album_memo]' value="{{ $album->album_memo }}">
                    </div>
                    <div class="user_id">
                        <input value="{{ Auth::user()->id }}" type="hidden" name="album[user_id]">
                    </div>
                    <input type="submit" value="save">
                </form>
                <form action="/albums/{{ $album->id }}" id="form_{{ $album->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deleteAlbum({{ $album->id }})">delete</button>
                </form>
            </div>
            
            <div class='album_images'>
                <h2 class='title'>The images are shown here.</h2>
                <form action="/cloudinary/{{$album->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="image">
                    <button>画像をアップロード</button>
                </form>
                @foreach ($images as $image)
                        <h2 class='image'>
                            <img src={{$image->image_path}}>
                            <form action="/delete_image/{{ $image->id }}/{{ $album->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button >delete</button>
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
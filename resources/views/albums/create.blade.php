<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Album create') }}
        </h2>
    </x-slot>
        <div class='albums flex justify-center font-serif'>
            <div class='album_show text-center'>
                <form action="/albums" method="POST">
                    @csrf
                    <div class="album_name">
                        <h2>Album Name</h2>
                        <input type="text" name="album[album_name]" placeholder="Album name" value="{{ old('album.album_name') }}"/>
                        <p class="name__error" style="color:red">{{ $errors->first('album.album_name') }}</p>
                    </div>
                    <div class="album_date">
                        <h2>Album Date</h2>
                        <input type="date" name="album[album_date]" placeholder="2000-01-01"></input>
                    </div>
                    <div class="album_memo">
                        <h2>Album Memo</h2>
                        <textarea name="album[album_memo]" placeholder="It was sunny day.">{{ old('album.album_memo') }}</textarea>
                        <p class="memo__error" style="color:red">{{ $errors->first('album.album_memo') }}</p>
                    </div>
                    <div class="user_id">
                        <input value="{{ Auth::user()->id }}" type="hidden" name="album[user_id]">
                    </div>
                    <h2>Add New Region</h2>
                    <div class="region_name">
                        <h2>Region Name</h2>
                        <textarea name="region[region_name]" placeholder="地名・場所名を記入"></textarea>
                        <p class="region_name__error" style="color:red">{{ $errors->first('region.region_name') }}</p>
                    </div>
                    
                    <div class="region_address">
                        <h2>Region Address</h2>
                        <textarea name="region[region_address]" placeholder="都道府県から番地までを記入"></textarea>
                        <p class="region_address__error" style="color:red">{{ $errors->first('region.region_address') }}</p>
                    </div>
                    <button type="submit" value="store" class="mg-0 bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-4 py-2">作成</button>
                </form>
                
                <button class="footer bg-gradient-to-r from-blue-300 to-blue-800 hover:bg-gradient-to-l text-white rounded px-4 py-2">
                    <a href="/" class="mt-4">ホームに戻る</a>
                </button>   
            </div>     
            <!--<div class='album_images'>-->
            <!--    <h2 class='title'>The images are shown here.</h2>-->
            <!--    <form action="/cloudinary/create" method="POST" enctype="multipart/form-data">-->
            <!--        @csrf-->
            <!--        <input type="file" name="image">-->
            <!--        <button>画像をアップロード</button>-->
            <!--    </form>-->
            <!--</div>-->
        </div>
</x-app-layout>
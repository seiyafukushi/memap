<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Album Names</title>
    </head>
    <body>
        <h1 class="title">編集画面</h1>
        <h1>Album Names</h1>
        <div class='albums'>
            <div class='album_regions'>
                The regions will be written here.
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
                    <div class="region_name">
                        <h2>Region Name is here.</h2>
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
                        <h2>Your id</h2>
                        <input type='user_id' name='album[user_id]' value="{{ $album->user_id }}">
                    </div>
                    <input type="submit" value="save">
                </form>
            </div>
            
            <div class='album_images'>
                <h2 class='title'>The images are shown here.</h2>
                <form action="/cloudinary" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="image">
                    <button>画像をアップロード</button>
                </form>
            </div>
        </div>
    </body>
</html>
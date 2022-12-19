<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Album Names</title>
    </head>
    <body>
        <h1>Album Names</h1>
        <div class='albums'>
            <div class='album_regions'>
                The regions will be written here.
            <div class="footer">
                <a href="/">戻る</a>
            </div>
            </div>
            
            <div class='album_show'>
                <form action="/albums" method="POST">
                    @csrf
                    <div class="album_name">
                        <h2>Album Name</h2>
                        <input type="text" name="album[album_name]" placeholder="Album name"/>
                    </div>
                    <div class="album_name">
                        <h2>Region Name is here.</h2>
                    </div>
                    <div class="album_date">
                        <h2>Album Date</h2>
                        <textarea name="album[album_date]" placeholder="2000-01-01"></textarea>
                    </div>
                    <div class="album_memo">
                        <h2>Album Memo</h2>
                        <textarea name="album[album_memo]" placeholder="It was sunny day."></textarea>
                    </div>
                    <div class="user_id">
                        <h2>Your id</h2>
                        <textarea name="album[user_id]" placeholder="1"></textarea>
                    </div>
                    <input type="submit" value="store"/>
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
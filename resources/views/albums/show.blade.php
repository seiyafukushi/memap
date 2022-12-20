<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Album</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Album Names</h1>
        <div class='albums'>
            <div class='album_titles'>
                @foreach ($albums as $album)
                        <h2 class='title'>
                            <a href="/albums/{{ $album->id }}">{{ $album->album_name }}</a>
                            <div class="edit"><a href="/albums/{{ $album->id }}/edit">edit</a></div>
                        </h2>
                @endforeach
            </div>
            
            <div class='album_show'>
                <h2 class='title'>{{ $an_album->album_name }}</h2>
                <div class='map'>The map is here.</map>
                <p class='date'>Created at {{ $an_album->album_date}}</p>
                <p class='memo'>{{ $an_album->album_memo }}</p>
            </div>
            
            <div class='album_images'>
                <a href='/albums/create'>create</a>
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
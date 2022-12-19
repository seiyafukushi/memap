<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cloudinary Upload Test</title>
    </head>
    <body>
        <form action="/cloudinary" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image">
            <button>画像をアップロード</button>
        </form>
    </body>
</html>
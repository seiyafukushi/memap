<x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Album Cloudinary') }}
        </h2>
    </x-slot>
   <form action="/cloudinary" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
        <button>画像をアップロード</button>
    </form>
</x-app-layout>
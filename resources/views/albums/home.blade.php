<x-app-layout>
    <x-slot name="header">
        　<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Album home') }}
        　</h2>
    </x-slot>
        <div class='albums flex font-serif'>
            <div class='album_titles p-4 basis-1/6'>
                <h1 class="text-center">Album list</h1>
                @foreach ($albums as $album)
                        <h2 class='title flex'>
                            <div class="basis-3/4"><a href="/albums/{{ $album->id }}">{{ $album->album_name }}</a></div>
                            <div class="w-[50px]"><a href="/albums/{{ $album->id }}/edit"><img src="/images/edit.png"></a></div>
                        </h2>
                @endforeach
                <button class="bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-4 py-2">
                    <a href='/albums/create'>アルバム作成</a>
                </button>
            </div>
            
            <div class='album_show p-4 basis-3/6 text-center'>
                <h2 class='title class=title text-2xl'>~{{ $latest_album->album_name }}~</h2>
            	<div id="map" style="height:500px">
                    @if($addresses)
                        @foreach($addresses as $address)
                            <span class="js-getVariable" data-region="{{ $address }}"></span>
                        @endforeach
                    @else
                        <h2>地図の代わりの画像</h2>
                    @endif
            	</div>
                <p class='date'>Created at {{ $latest_album->album_date}}</p>
                <p class='memo'>{{ $latest_album->album_memo }}</p>
            </div>
            
            <div class='album_images p-4 basis-2/6'>
                @foreach ($images as $image)
                        <h2 class='image'>
                            <img src={{$image->image_path}} style="display: block; margin: auto;">
                        </h2>
                @endforeach
            </div>
        </div>
        <script src="{{ asset('/js/result.js') }}"></script>
    	<script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyCBeFaRkGy6Qpk4Qts8Z45OmiXnt-55-v8&callback=initMap" async defer>
    	</script>
</x-app-layout>
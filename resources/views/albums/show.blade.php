<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Album Show') }}
          </h2>
        </div>
    </x-slot>
   <h1>Album Names</h1>
        <div class='albums'>
            <div class='album_titles'>
                @foreach ($albums as $album)
                        <h2 class='title'>
                            <a href="/albums/{{ $album->id }}">{{ $album->album_name }}</a>
                            <div class="edit"><a href="/albums/{{ $album->id }}/edit">edit</a></div>
                        </h2>
                @endforeach
                <a href='/albums/create'>create</a>
            </div>
            
            <div class='album_show'>
                <h2 class='title'>{{ $an_album->album_name }}</h2>
                <div id="map" style="height:500px">
                    @if($addresses)
                        @foreach($addresses as $address)
                            <span class="js-getVariable" data-region="{{ $address }}"></span>
                        @endforeach
                    @else
                        <h2>地図の代わりの画像</h2>
                    @endif
            	</div>
                <p class='date'>Created at {{ $an_album->album_date}}</p>
                <p class='memo'>{{ $an_album->album_memo }}</p>
                <h2>Region List</h2>
                @foreach ($an_album->regions as $album_region)
                    <p>{{ $album_region->region_name }}</p>
                @endforeach
            </div>
            
            <div class='album_images'>
                <h2 class='title'>The images are shown here.</h2>
                <form action="/cloudinary/{{$an_album->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="image">
                    <button>画像をアップロード</button>
                    @foreach ($images as $image)
                            <h2 class='image'>
                                <img src={{$image->image_path}}>
                            </h2>
                    @endforeach
                </form>
            </div>
        </div>
        <script src="{{ asset('/js/result.js') }}"></script>
    	<script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyCBeFaRkGy6Qpk4Qts8Z45OmiXnt-55-v8&callback=initMap" async defer>
    	</script>
</x-app-layout>
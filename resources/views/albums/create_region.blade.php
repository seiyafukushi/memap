<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Region create') }}
        </h2>
    </x-slot>
        <div class='list'>
        <h1>Region List</h1>
            @foreach ($regions as $region)
                <option>{{ $region->region_name }}</option>
            @endforeach
        </div>
        
        <form action="/create-region/{{$album->id}}" method="POST">
            @csrf
            <h1>Add New Region</h1>
            
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
</x-app-layout>
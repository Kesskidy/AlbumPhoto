@extends('template')

@section('content')
    <h1>Galerie de Photos</h1>
    <div class="galery">
        @foreach ($photos as $photo)
            <div class="item">
                <h3>{{ $photo->titre}} | note : {{ $photo->note }}</h3>
                @foreach ($albums as $album)
                    @if ($album->id == $photo->album_id)
                        <p>Album : {{ $album->titre }}</p>
                    @endif
                @endforeach
                <a href="album/{{ $photo->album_id }}"><img src="{{ $photo->url }}" alt="{{ $photo->titre }}"></a>
            </div>
        @endforeach
    </div>
@endsection
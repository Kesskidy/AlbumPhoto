@extends('template')

@section('content')
    <h1>Galerie de Photos</h1>

    <div class="filtres">
        <form method="GET" action="/photos">
            <input type="search" name="search" placeholder="Recherche titre..." value="{{ request('search') }}">

            <select name="tag_id" id="tags">
                <option value="">Sélectionnez un tag</option>
                @foreach ($tags as $t)
                    <option value="{{ $t->id }}" @selected(request('tag_id') == $t->id)>{{ $t->nom }}</option>
                @endforeach
            </select>

            <select name="note" id="notes">
                <option value="">Sélectionnez une note</option>
                @foreach ($notes as $n)
                    <option value="{{ $n }}" @selected((string)request('note') === (string)$n)>{{ $n }}</option>
                @endforeach
            </select>

            <button type="submit">Filtrer</button>
            <a href="/photos" style="margin-left:8px;">Réinitialiser</a>
        </form>
    </div>

    <div class="galery">
        @foreach ($photos as $photo)
            <div class="item">
                <h3>{{ $photo->titre}} | note : {{ $photo->note }}</h3>
                <p>Album : {{ $photo->album_id}}</p>
                <a href="album/{{ $photo->album_id }}"><img src="{{ $photo->url }}" alt="{{ $photo->titre }}"></a>
            </div>
        @endforeach
    </div>
@endsection
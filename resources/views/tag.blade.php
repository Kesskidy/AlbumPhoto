@extends('template')

@section('content')
    <h2>Photos liées au tag : {{ $tag->nom }}</h2>

    @if ($tag && $tag->photos->count() > 0)
        <ul>
            @foreach ($tag->photos as $photo)
                <li>
                    <img src="{{ $photo->url }}" alt="{{ $photo->titre }}" style="max-width:200px;">
                    <p>{{ $photo->titre }}</p>
                </li>
            @endforeach
        </ul>
    @else
        <p>Aucune photo liée à ce tag.</p>
    @endif
@endsection
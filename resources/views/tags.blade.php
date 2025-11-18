@extends('template')

@section('content')
<ul>
@foreach($tags as $tag)
    <li>
        <a href="{{ url('/tags' . $tag->id)}}">{{$tag -> nom}}</a>
    </li>
    @endforeach
</ul>
@endsection
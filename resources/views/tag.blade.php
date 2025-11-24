@extends('template')

@section('content')
<ul>
@foreach($tag as $tag)
    <li>
        <a href="{{ url('/photo' . $tag->id)}}">{{$tag -> nom}}</a>
    </li>
    @endforeach
</ul>
@endsection
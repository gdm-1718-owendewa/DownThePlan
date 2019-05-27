@extends('layout')

@section('content')

    <div id="aboutDiv">
        <h1 class="mt-4 mb-2"> {{$page->title}} </h1>
        <div class="mt-4">
             {!! $page->content !!}
        </div>
        <img  class="mt-4" src="{{$page->image}}">
    </div>

@endsection
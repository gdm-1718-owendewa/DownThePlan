@extends('layout')

@section('content')
<div id="articleDetail">
    <div class="row mb-4" style="margin-top:10%;" >
        <div class="col">
            @if($image == null)
            <img class="w-75 ml-5" src="{{asset('images/nopic.jpg')}}">
            @else
                <img class="w-100" src="{{asset($image->filepath . '/' . $image->filename)}}">
            @endif
        </div>
        <div class="col">
            <h1>{{$article->title}}</h1>
            <h3 class="mt-5">{{$article->intro}}</h3>
            <p class="mt-5">{{$article->content}}</p>
        </div>
    </div>
</div>
@endsection
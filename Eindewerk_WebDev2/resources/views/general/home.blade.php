@extends('layout')

@section('content')

<div id="homePicture">
    <div id="homePictureText">

    <h1 class="">Down The Plan</h1> 
    </div>
</div>
        @if (session('fail'))
            <div class="alert alert-danger col-lg-12">
                {{ session('fail') }}
            </div>
            @endif
            @if (session('succes'))
            <div class="alert alert-success col-lg-12">
                {{ session('succes') }}
            </div>
        @endif
            <h2 class="mt-5">In de kijker</h2>
            <hr>
            <div id="spotlightBox" class="mt-5">
            @foreach($spotlights as $spotlight)
                    <a href="{{route('productDetail',$spotlight->product_id)}}">
                        <img src="{{asset($spotlight->imagePath . '/' . $spotlight->imageName)}}" >
                    </a>
            @endforeach
            </div>
        <h2 class="mt-2">Nieuwsoverzicht</h2>
        @if(Auth::check() && Auth::user()->admin == 'admin')
            <a href="{{ route('createArticle') }}">Create article</a>
        @endif
        <hr>
        <div class="row articleBox">
        @foreach($articles as $article)
        <div class=" mt-3 mb-3 col-lg-6 d.inline-block">
            <h3>{{$article->title}} is 
            @if($article->type =='Create')
                aangemaakt
            @elseif($article->type =='Edit')
                aangepast
            @elseif($article->type =='Bericht')
             Geplaatst
            @else
                gefund
            @endif
            door {{$article->user_name}}
            </h3>
            <p>{{$article->intro}}</p>
            <a class="btn btn-primary" href="{{route('articleDetail', $article->id)}}">Lees meer</a>
            @if(Auth::check() && Auth::user()->admin == 'admin')
                <a class="btn btn-warning text-white" href="{{route('editArticle', $article->id)}}">Edit</a>
                <a class="btn btn-danger text-white" href="{{route('deleteArticle', $article->id)}}">Delete</a>
            @endif
        </div>
        @endforeach
        {{ $articles->links() }}
        </div>  

@endsection
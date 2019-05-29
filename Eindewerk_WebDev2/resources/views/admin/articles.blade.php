@extends('layout')
@section('content')

<a class="btn btn-primary mb-3  create" href="{{route('createArticle')}}">Create new Article</a>
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
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach($articles as $article)
            <tr>
                <th scope="row">{{$article->id}}</th>
                <td>{{$article->intro}}</td>
                <td><a class="btn btn-warning text-white" href="{{route('editArticle',$article->id)}}">Edit</a></td>
                <td><a class="btn btn-danger text-white" href="{{route('deleteArticle',$article->id)}}">Delete</a></td>
            </tr>         
        @endforeach
    </tbody>
  </table>
@endsection
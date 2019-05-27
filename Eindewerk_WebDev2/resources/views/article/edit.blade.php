
@extends('layout')
@section('content')
<div id="editDiv">

      <h4 class="mt-5">Edit article</h4>
      <form action="{{route('updateArticle', $article->id)}}" method="post" class="form-group mt-5">
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
      @csrf
      @method('PATCH')
          <br>
          <label>Naam</label>
          <input name="naam" type="text" class="form-control col-sm-6" value="{{ $article->title }}">
          <br>
          <label>Intro</label>
          <input name="intro" type="text" class="form-control col-sm-6" placeholder="Eerste zin van content max. 100" value="{{ $article->intro }}">
          <br>
          <label>Content</label>
          <textarea name="content" type="text" class="form-control col-sm-6" >{{$article->content}}</textarea>
          <br>
          <label>Creator</label>
          <input name="user" type="text" class="form-control col-sm-6" placeholder="Naam creator project" value="{{ $article->user_name }}">
          <br>
          <label>Type</label>
          <input name="type" type="text" placeholder="Geef een nieuw type in" class="form-control col-sm-6" value="{{ $article->type }}">
          <br>
          <input value="Edit" class="btn btn-primary mb-2 col-sm-6" type="submit">
      </form>
</div>
@endsection
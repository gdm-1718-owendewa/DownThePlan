@extends('layout')

@section('content')
    <div id="createDiv">
      <h2>Nieuwe Categorie</h2>
      <form action="{{route('categorieSave')}}" method="post" class="form-group">
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
        <div class="medium-4  columns">
        
          <label>Naam</label>
          <input name="name" type="text" class="form-control col-sm-6" value="{{ old('naam') }}">
          </div>
        <br>
        <div class="medium-12  columns">
          <input value="Create" class="btn btn-primary mb-2 col-sm-6" type="submit">
        </div>
      </form>
      <br>
        <br>
        @foreach($errors->all() as $error)
      <div class="alert alert-danger">
        <ul>
         
            <li>{{ $error }}</li>
         
        </ul>
      </div>
      @endforeach
  </div>
@endsection
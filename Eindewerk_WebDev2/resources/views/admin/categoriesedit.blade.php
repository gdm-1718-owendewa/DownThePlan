@extends('layout')
@section('content')
<div id="editDiv">

      <h4 class="mt-5">Edit categorie</h4>
      <form action="{{route('adminCategorieUpdate', $categorie->id)}}" method="post" class="form-group mt-5">
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
        
          <label>Naam</label>
          <input name="name" type="text" class="form-control col-sm-6" value="{{ $categorie->name }}">
                <br>
          <input value="Edit" class="btn btn-primary mb-2 col-sm-6" type="submit">
      </form>
</div>
@endsection
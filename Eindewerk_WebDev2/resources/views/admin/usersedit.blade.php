@extends('layout')
@section('content')
<div id="editDiv">

      <h4 class="mt-5">Edit user</h4>
      <form action="{{route('adminUsersUpdate', $user->id)}}" method="post" class="form-group mt-5">
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
          <input name="name" type="text" class="form-control col-sm-6" value="{{ $user->name }}">
                <br>
          <label>Email</label>
          <input name="email" type="email" class="form-control col-sm-6" value="{{ $user->email }}">
                <br>
          <label>Credits</label>
          <input name="credits" type="number" class="form-control col-sm-6" value="{{ $user->credits }}">
                <br>
          <input value="Edit" class="btn btn-primary mb-2 col-sm-6" type="submit">
      </form>
</div>
@endsection
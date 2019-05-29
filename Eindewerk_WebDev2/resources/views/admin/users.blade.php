@extends('layout')
@section('content')

<p class="adminUsersTitle"></p>
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
<div id="userCMSDiv">
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
        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td><a class="btn btn-warning text-white" href="{{route('adminUsersEdit',$user->id)}}">Edit</a></td>
                <td><a class="btn btn-danger text-white" href="{{route('adminUsersDelete',$user->id)}}">Delete</a></td>
            </tr>         
        @endforeach
    </tbody>
  </table>
</div>
@endsection
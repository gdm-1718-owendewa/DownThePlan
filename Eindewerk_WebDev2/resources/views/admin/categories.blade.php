@extends('layout')
@section('content')

<a class="btn btn-primary mb-3  create" href="{{route('adminCategorieCreate')}}">Create new Categorie</a>
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
        @foreach($categories as $categorie)
            <tr>
                <th scope="row">{{$categorie->id}}</th>
                <td>{{$categorie->name}}</td>
                <td><a class="btn btn-warning text-white" href="{{route('adminCategorieEdit',$categorie->id)}}">Edit</a></td>
                <td><a class="btn btn-danger text-white" href="{{route('adminCategorieDelete',$categorie->id)}}">Delete</a></td>
            </tr>         
        @endforeach
    </tbody>
  </table>
@endsection
@extends('layout')
@section('content')
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
        <th scope="col">Amount</th>
        <th scope="col">User</th>
        <th scope="col">Date</th>
      </tr>
    </thead>
    <tbody>
        @foreach($fundings as $funding)
            <tr>
                <th scope="row">{{$funding->id}}</th>
                <td>{{$funding->amount}}</td>
                <td>{{$funding->user_name}}</td>
                <td>{{\Carbon\Carbon::parse($funding->created_at)->format('d/m/Y H:i:s')}}</td>
                <td><a class="btn btn-danger text-white" href="{{route('adminFundingsDelete', $funding->id)}}">Delete</a></td>
            </tr>         
        @endforeach
    </tbody>
  </table>
@endsection
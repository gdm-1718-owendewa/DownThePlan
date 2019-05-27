@extends('layout')

@section('content')
    <div id="profileDiv">
        <div id="userInfo">
            @if($profilePic)
            <img src="{{ asset($profilePic->filepath . '/' . $profilePic->filename) }}" class="profilePic">
            @else
            <img src="images/profilePic.png" class="profilePic">
            @endif
            <br>
            <br>
            <h3>Email</h3>
            <p>{{$user->email}}</p>
            <h3>Name</h3>
            <p>{{$user->name}}</p>
            <a href="{{ route('editProfile')}}" class="btn btn-warning text-white">Edit</a>

        </div>
        <div id="userProjects" >
            <h2>Uw projecten</h2>
            <hr>
            <br>
                @foreach($products as $product)
                <div id="projectContent">
                    <h3>{{$product->naam}}</h3>
                    <p>{{$product->intro}}</p>
                    <a href="{{route('productDetail', $product->id)}}">Detail</a>
                    <hr>
                </div>
                @endforeach
        </div>
    </div>
@endsection
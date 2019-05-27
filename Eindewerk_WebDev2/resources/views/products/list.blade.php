@extends('layout')
@section('content')
    <div style="margin-top:10%; margin-bottom:5%;"  >
        <div id="listDiv">
            <a href="{{ route('productDetail',$product_id) }}" class="btn btn-primary">Back</a>
            @foreach($fundings as $fund)
                <div class="col col-lg-5 pl-4 pt-2 mt-2 d-inline-block bg-light">
                    <p class="text-primary">{{$fund->user_name}}</p>
                    <p>€{{$fund->amount}} </p>
                    <p>{{\Carbon\Carbon::parse($fund->created_at)->format('d/m/Y')}}</p>
                </div>
            @endforeach 
        </div>
    </div>
@endsection
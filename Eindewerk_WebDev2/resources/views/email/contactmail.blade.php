@extends('layout')

@section('content')
<h1>{{$data["customer"]}} heeft een vraag</h1>
<h3>Te versturen naar {{$data["email"]}}</h3>
<p>Onderwerp: {{$data["subject"]}}</p>
<p>Vraag: {{$data["message"]}}</p>
@endsection
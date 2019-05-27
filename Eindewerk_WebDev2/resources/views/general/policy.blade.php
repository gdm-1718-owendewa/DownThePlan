<style>
    .content{
        max-width:1200px;
        width:100%;
        margin-left:5%;
    }
</style>
@extends('layout')

@section('content')

        <div id="policyDiv">
             {!! $page->content !!}
        </div>

@endsection
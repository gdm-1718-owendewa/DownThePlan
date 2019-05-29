@extends('layout')
@section('content')
<br><br><br>
<div id="adminHome">
<h1>Admin home</h1>
<p>Welkom op de admin home hier zal u meer indept kunnen gaan met het beheren van uw website.</p>
<br>
<a class="btn btn-primary text-white mt-3" href="{{ route('adminCategories') }}">Ga naar categorie lijst</a>
<a class="btn btn-primary text-white mt-3" href="{{ route('adminUsers') }}">Ga naar user lijst</a>
<a class="btn btn-primary text-white mt-3" href="{{ route('products') }}">Ga naar project lijst</a>
<a class="btn btn-primary text-white mt-3" href="{{ route('adminArticles') }}">Ga naar article lijst</a>
<a class="btn btn-primary text-white mt-3" href="{{ route('adminFundings') }}">Ga naar fundings lijst</a>

</div>
@endsection
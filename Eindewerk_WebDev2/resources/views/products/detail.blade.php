@extends('layout')

@section('content')
<div id="detailBox">
    @if (session('fail'))
        <div class="alert alert-danger col-lg-10">
            {{ session('fail') }}
        </div>
        @endif
        @if (session('succes'))
        <div class="alert alert-success col-lg-10">
            {{ session('succes') }}
        </div>
    @endif
    <!-- Info / fundbar / image-->
    <div class="row">
        <div class="col">
            <div class="medium-8 large-8 columns">
                <h1 class="mt-5">{!! $product->naam !!}</h1>
                <p>{!! $product->deadline !!}</p>
                <p class='w-75 pb-5 mt-5'>{!! $product->content !!}</p>
            </div>
            @if($funded < $product->goal)
                <p>We hebben al €{{$funded}} van €{{$product->goal}} ingezameld</p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped rounded-0" role="progressbar"
                        style="width: {{ $funded / $product->goal * 100 }}%" aria-valuenow="10" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
                <div class="columns is-desktop">
                    <br><a href="{{route('generatePDF',$product->id)}}">Download PDF</a>
                </div>
            @else
                <div class="progress ">
                    <div class="progress-bar progress-bar-striped bg-success rounded-0"  role="progressbar" style="width: 100%"
                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <br>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-success rounded-0" role="progressbar"
                        style="width: {{ $funded / $product->goal * 100 - 100 }}%" aria-valuenow="" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>

                <p>We zitten op €{{$funded}} en ons doel was €{{$product->goal}}</p>
                <div class="columns is-desktop">
                    <br><a href="{{route('generatePDF',$product->id)}}">Download PDF</a>
                </div>
            @endif
        </div>
        <div class="col mt-5">
            @foreach($images as $image)

                    <a href="{{asset($image->filepath . '/' . $image->filename)}}" alt="{{ $image->title }}" data-fancybox="gallery" >
                        <img src="{{asset($image->filepath . '/' . $image->filename)}}" class=" w-25 m-1">     
                    </a>
                    @if(Auth::user())
                    @if($currentUserId == $product->user_id || $role  == 'admin')
                        <a class="btn btn-danger text-white" href="{{route('deletePic',$image->id)}}">Delete</a>
                    @endif
                    @endif
                   
            @endforeach
            {{$images->links() }}
        </div>
    </div>
    <!-- Einde Info / fundbar / image-->

    
    @if(Auth::user()) <!-- Check of een user is ingelogd -->
        @if($currentUserId == $product->user_id || $role == "admin")  <!-- Check of userid gelijk is aan product maker -->
            @if($firstImage != null) <!-- Check of er al een foto bij het project staat so ja toon de optie in de kijker-->
                <div class="position-absolute bg-primary w-5 rounded border spotlight">
                    <div class="rounded text-white p-3 col-lg-12 ml-2">
                        <h4  class="mt-3 mb-3 ">Zet uw project in de kijker</h4>
                        <hr class="bg-white">
                        <p>Voor slecht 200 credits kan uw product een volledige week in de kijker staan.</p>
                        <p>Dit houd in dat uw project op de homepagina komt en het eerste is wat bezoekers zullen zien!</p>
                        <p>Sla uw kans en laat uw product in de spotlight staan</p>
                    </div>
                </div>
                <a href="{{ route('spotlight', $product->id)}}" class="btn btn-primary mt-3 col-lg-2 position-absolute border rounded spotlightButton" >In de kijker!</a>
                <div class="buttons">
                    <a class="btn btn-warning text-white d.block " href="{{ route('editproduct',$product->id )}}">Edit</a>
                    <a class="btn btn-danger d.block "  href="{{ route('deleteproduct',$product->id )}}">Delete</a>
                </div>
            @else 
                <div class="position-absolute bg-warning w-5 rounded border  spotlight">
                    <div class="rounded text-white p-3 col-lg-12 ml-2">
                        <h4  class="mt-3 mb-3 ">Zet uw project in de kijker</h4>
                        <hr class="bg-white">
                        <p>Voordat u uw project in de kijker kan zetten zal u een foto moeten toevoegen</p>
                        <p>Deze foto zal dienen als eyecatcher for het publiek</p>
                        <p>U kan foto's toevoegen via hot formulier op deze pagina</p>
                    </div>
                </div>
                <div class="buttons">
                    <a class="btn btn-warning text-white d.block " href="{{ route('editproduct',$product->id )}}">Edit</a>
                    <a class="btn btn-danger d.block "  href="{{ route('deleteproduct',$product->id )}}">Delete</a>
                </div>
            @endif<!-- Einde check of er al een foto bij het project staat-->
            <br>
            <div class="row" style="margin-top:3%;">
                <!-- Overzicht van donaties aan het product -->
                <div class="col col-lg-6">
                    <h3 class="ml-3 mb-3"> Overzicht recente donaties</h3>
                    @foreach($allProductFundings as $fundings)
                        <div class="col col-lg-5 pl-4 pt-2 mt-2 d-inline-block bg-light">
                            <p class="text-primary">{{$fundings->user_name}}</p>
                            <p>€{{$fundings->amount}} </p>
                            <p>{{\Carbon\Carbon::parse($fundings->created_at)->format('d/m/Y')}}</p>
                        </div>
                    @endforeach 
                    <br>
                    <a class="btn btn-primary text-white mt-3" href="{{ route('list', $product->id) }}">Bekijk volledige donatie lijst!</a>
                    
                </div>
                <div class="col">
                    <!--Foto toevoegen aan het project-->
                    <form action="{{ route('postUpload', $product->id) }}" method="post" enctype="multipart/form-data" class="form-group">
                                       

                        <h3 class=" mb-3"> Voeg foto's toe aan uw project</h3>
                        @csrf
                        <div class="field">
                            <div class="control">
                                <input class="form-control" type="text" name="product_id"
                                    value="{{$product->id}}" hidden>
                            </div>
                        </div>
                        <table class="table is-striped">
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="file" name="file[]" id="file" multiple>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="form-control btn btn-primary">
                            Verzenden
                        </button><br>
                    </form>
                </div>
                <div class="col">
                </div>
            </div>
             <br>
        @else
             <!--als user niet gelijk is aan de usermaker en hij/zij heeft geen credits meer-->
            @if($currentUserCredits == 0.00 || NULL)
                <div>
                    <br>
                    <p>U heeft geen credits meer!</p>
                    <a class="btn btn-danger " href="{{url('/credits')}}">Koop meer credits</a>
                </div>
            @else
            <!--als user niet gelijk is aan de usermaker en hij/zij heeft credits-->
            <div>
                <br>
                <a class="btn btn-primary " href="{{route('fund', [$product->id, 20] )}}">Fund 20</a>
                <a class="btn btn-primary" href="{{route('fund', [$product->id, 40] )}}">Fund 40</a>
                <a class="btn btn-primary" href="{{route('fund', [$product->id, 60] )}}">Fund 60</a>
            </div>
            @endif
             <!--Reactie formulier-->
            <form action="{{route('comment', $product->id)}}" method="post">
                    @csrf
                    <textarea name="comment" style="width:500px;" class="mt-5" > Plaats een reactie</textarea>
                    <br>
                    <button name="submitButton" class="btn btn-primary"> Comment</button>
            </form>
        @endif
    @endif<!-- Einde check of user is ingelogd -->
    <div id="reactionBox">
            <h2 class='mt-5'>Reactions</h2><hr>
            @foreach($comments as $comment)
                <div class="col pl-4 pt-2 mt-2 d-block bg-light">
                    <p class="text-primary">{{$comment->comment}}</p>
                    <p class="text-primary pb-2">{{$comment->user_name}}</p>

                </div>
            @endforeach     
        </div>
    </div>
@endsection

@extends('layout')
@section('content')
    @if(Auth::user())
    <a class="btn btn-primary mb-3  create" href="{{route('createproducts')}}">Create new product!</a>
    @endif
    <div class="productsBox row">
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
    @foreach($products as $product)
       <div class="mb-3 mt-5" id="productBox">
           @if($product->images->first()['filepath'] !== null)
               <div style="width:95%; height:300px; background:url('{{{ $product->images->first()['filepath'] . '/' .$product->images->first()['filename']}}}'); background-size:cover;   position: relative;">      
                    <div class="text">
                        <h1>{{ $product->naam }}</h1>
                        <h6>{{ $product->intro }}</h6>
                        @foreach($categories as $category)
                            @if ($product->category_id == $category->id)
                                <p>{{ $category->name}}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
                @else
                <div style="width:95%; height:300px; background:url('{{{asset('images/nopicsmall.png')}}}'); background-size:cover;   position: relative;">      
                    <div class="text">
                        <h1>{{ $product->naam }}</h1>
                        <h6>{{ $product->intro }}</h6>
                        @foreach($categories as $category)
                            @if ($product->category_id == $category->id)
                                <p>{{ $category->name}}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
                @endif
            <div class="productButtons">
            @if(Auth::user())
                @if($currentUserId == $product->user_id || Auth::user()->admin == 'admin')
                    <a class="btn btn-primary" href="{{ route('productDetail',$product->id ) }}">Detail</a>
                    <a class="btn btn-warning text-white" href="{{ route('editproduct',$product->id )}}">Edit</a>
                    <a class="btn btn-danger" href="{{ route('deleteproduct',$product->id )}}">Delete</a>
                @else
                    <a class="btn btn-info" href="{{ route('productDetail',$product->id )}}">Detail</a>
                @endif
            @else
                <a class="btn btn-info" href="{{ route('productDetail',$product->id )}}">Detail</a>
            @endif
            </div>
        </div>
    @endforeach
</div>
@endsection

@extends('layout')
@section('content')
<div id="editDiv">

      <h4 class="mt-5">Edit product</h4>
      <form action="{{route('update', $product->id)}}" method="post" class="form-group mt-5">
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
      @csrf
      @method('PATCH')
        <label>Category</label>
        <br>
          <select name="category" class="form-control col-sm-6" >
          @foreach($categories as $category)
          <option @if ($product->category_id == $category->id) selected @endif value="{{$category->id}}">
                {{ ucfirst($category->name) }}
              </option>
          @endforeach
          </select>
          <br>
          <label>Naam</label>
          <input name="naam" type="text" class="form-control col-sm-6" value="{{ $product->naam }}">
          <br>
          <label>Intro</label>
          <input name="intro" type="text" class="form-control col-sm-6" placeholder="Eerste zin van content max. 100" value="{{ $product->intro }}">
          <br>
          <label>Content</label>
          <textarea name="content" type="text" class="form-control col-sm-6" >{{$product->content}}</textarea>
          <br>
          <label>Doelbedrag</label>
          <input name="goal" type="number" placeholder="Geef een doelbedrag in" class="form-control col-sm-6" value="{{ $product->goal }}">
          <br>
          <label>Deadline</label>
            <input name="deadline" type="date" class="form-control col-sm-6" value="{{$product->deadline }}">
            <br>
            <br>
          
          
          <input value="Edit" class="btn btn-primary mb-2 col-sm-6" type="submit">
      </form>
</div>
@endsection
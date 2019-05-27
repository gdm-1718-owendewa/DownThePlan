@extends('layout')

@section('content')
    <div id="createDiv">
      <h2>Nieuw Product</h2>
      <form action="{{route('productSave')}}" method="post" class="form-group">
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
        <div class="medium-4  columns">
        <label>Category</label>
        <br>
          <select name="category" class="col-sm-6 form-control" >
          @foreach($categories as $category)
            <option value='{{$category->id}}' >
              {{$category->name}}
            </option>
          @endforeach
          </select>
          <br>
          <label>Naam</label>
          <input name="naam" type="text" class="form-control col-sm-6" value="{{ old('naam') }}">
          </div>
          <br>
          <label>Intro</label>
          <input name="intro" type="text" class="form-control col-sm-6" placeholder="Eerste zin van content max. 100" value="{{ old('intro') }}">
          <div class="medium-8  columns">
          <br>
          <label>Content</label>
          <textarea name="content" type="text" class="form-control col-sm-6" ></textarea>
          <br>
          <label>Doelbedrag</label>
          <input name="goal" type="number" placeholder="Geef een doelbedrag in" class="form-control col-sm-6" value="{{ old('goal') }}">
          <br>
        <label>Deadline</label>
          <input name="deadline" type="date" class="form-control col-sm-6" value="{{ old('deadline') }}">
        </div>  
        <br>
        
        <br>
        <div class="medium-12  columns">
          <input value="Create" class="btn btn-primary mb-2 col-sm-6" type="submit">
        </div>
      </form>
      <br>
        <br>
        @foreach($errors->all() as $error)
      <div class="alert alert-danger">
        <ul>
         
            <li>{{ $error }}</li>
         
        </ul>
      </div>
      @endforeach
  </div>
@endsection
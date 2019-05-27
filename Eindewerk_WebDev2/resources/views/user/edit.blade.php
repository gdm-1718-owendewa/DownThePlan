<p>Test</p>
@extends('layout')
@section('content')
<div style="min-height:447px;" class="mt-5">
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
    <div class="row" id="editProfile">
        <div class="col">

            <h4 class="mt-5">Edit profile</h4>
            <form action="{{route('updateProfile')}}" method="post" class="form-group mt-5 col-lg-12">
           
            @csrf
            @method('PATCH')
                <label>Naam</label>
                <input name="naam" type="text" class="form-control col-sm-6" value="{{ $user->name }}">
                <br>
                <label>Email</label>
                <input name="email" type="text" class="form-control col-sm-6" placeholder="Eerste zin van content max. 100" value="{{ $user->email }}">
                <br>
                
                <br>
                <input value="Edit" class="btn btn-primary mb-2 col-sm-6" type="submit">
            </form>
        </div>
        <div class="col">
            <form action="{{route('updateProfilePicture')}}" method="post" enctype="multipart/form-data" class="form-group mt-5">
                
                @if($profilePic)
                <img src="{{ asset($profilePic->filepath . '/' . $profilePic->filename) }}" class="profilePicEdit">
                @else
                <img src="images/profilePic.png" class="profilePic">
                @endif
                <h3 class=" mb-3">New profile picture</h3>
                @csrf
                @method('PATCH')
                <table class="table is-striped">
                    <tbody>
                        <tr>
                            <td>
                                <input type="file" name="file[]" id="file">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="form-control btn btn-primary">
                Edit profile picture
                </button><br>
            </form>
        </div>
    </div>
</div>
@endsection
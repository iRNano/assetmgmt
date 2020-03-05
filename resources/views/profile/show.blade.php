@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-center">Profile</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <form action="/profile/{{$profile->id}}" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{$profile->name}}">
                </div>
            
                <div class="form-group">
                    <label for="name">Username</label>
                <input type="text" name="name" class="form-control" value="{{$profile->username}}">
                </div>
            
                <div class="form-group">
                    <label for="name">Email</label>
                <input type="text" name="name" class="form-control" value="{{$profile->email}}">
                </div>
            
                <div class="form-group">
                    <label for="name">Department</label>
                <input type="text" name="name" class="form-control" value="{{$profile->department->name}}">
                </div>

                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>    
        <div class="col-lg-6">
        <img style="max-width: 100%; max-height: 400px;"src="{{asset("images/default-profile-picture.jpg")}}" alt="profile-pic" name="profile picture">
        </div>
    </div>
@endsection
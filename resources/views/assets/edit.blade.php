@extends('layouts.app')
@section('content')
<div class="row"></div>
    <div class="col-lg-4 offset-lg-4">
        <h1>Edit asset</h1>
    </div>
</div>
<div class="row">
    <h1 class="text-center">Modify Asset</h1>
    <div class="col-lg-4 offset-lg-4">
        <form action="/assets/{{$asset->id}}" method="POST">
            @csrf
            {{method_field('PUT')}}
            <div class="form-group">
                <label for="name">Asset Name</label>
                <input type="text" class="form-control" name="name" value="{{$asset->name}}">
            </div>
            
            <div class="form-group">
                <label for="name">Asset Name</label>
                <select name="category" id="type" class="form-control">
                    @foreach(App\Category::all() as $category)
                        <option value="{{$category->id}}" {{$category->name == $asset->category->name? 'selected' : ''}}>{{$category->name}}</option>                           
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" class="form-control" name="brand" value="{{$asset->brand}}">
            </div>
            <div class="form-group">
                <label for="os">Operating System</label>
                <input type="text" class="form-control" name="os" value="{{$asset->os}}">
            </div>
            <div class="software-view">
                <div class="form-group">
                    <label for="platform">Platform</label>
                    <input type="text" class="form-control" name="platform" value="{{$asset->platform}}">
                </div>
                <div class="form-group">
                    <label for="no_of_users">Number of Users</label>
                    <input type="text" class="form-control" name="no_of_users" value="{{$asset->no_of_users}}">
                </div>
                
                <div class="form-group">
                    <label for="license">License Number</label>
                    <input type="text" class="form-control" name="license" value="{{$asset->license}}">
                </div>
            </div>
            <div class="form-group">
                <label for="brand">Specifications</label>
                <input type="text" class="form-control" name="brand" value="{{$asset->brand}}">
            </div>
            <div class="form-group">
                <label for="model">Model</label>
                <input type="text" class="form-control" name="model" value="{{$asset->model}}">
            </div>
            <div class="form-group">
                <label for="serial_number">Serial Number</label>
                <input type="text" class="form-control" name="serial_number" value="{{$asset->serial_number}}">
            </div>
            <div class="form-group">
                <label for="purchase_date">Purchase Date</label>
                <input type="date" class="form-control" name="purchase_date" value="{{$asset->purchase_date}}">
            </div>
            <div class="form-group">
                <label for="warranty_date">Warranty End-Date</label>
                <input type="date" class="form-control" name="warranty_date" value="{{$asset->warranty_date}}">
            </div>

            <button class="form-control btn btn-success">Submit</button>
        </form>
    </div>
</div>
    
@endsection
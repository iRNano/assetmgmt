@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-4 offset-lg-4">
            <form action="/categories" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Asset Type</label>
                    <input name="name" type="text" class="form-control">
                </div>
                <button class="form-control btn btn-success" type="submit">Submit</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 offset-lg-4">
            <form action="/assets" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Asset Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                
                <div class="form-group">
                    <label for="name">Asset Name</label>
                    <select name="category" id="type" class="form-control">
                        @foreach(App\Category::all() as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>                           
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="text" class="form-control" name="brand">
                </div>
                <div class="form-group">
                    <label for="os">Operating System</label>
                    <input type="text" class="form-control" name="os">
                </div>
                <div class="software-view">
                    <div class="form-group">
                        <label for="platform">Platform</label>
                        <input type="text" class="form-control" name="platform">
                    </div>
                    <div class="form-group">
                        <label for="no_of_users">Number of Users</label>
                        <input type="text" class="form-control" name="no_of_users">
                    </div>
                    
                    <div class="form-group">
                        <label for="license">License Number</label>
                        <input type="text" class="form-control" name="license">
                    </div>
                </div>
                <div class="form-group">
                    <label for="brand">Specifications</label>
                    <input type="text" class="form-control" name="brand">
                </div>
                <div class="form-group">
                    <label for="model">Model</label>
                    <input type="text" class="form-control" name="model">
                </div>
                <div class="form-group">
                    <label for="serial_number">Serial Number</label>
                    <input type="text" class="form-control" name="serial_number">
                </div>
                <div class="form-group">
                    <label for="purchase_date">Purchase Date</label>
                    <input type="date" class="form-control" name="purchase_date">
                </div>
                <div class="form-group">
                    <label for="warranty_date">Warranty End-Date</label>
                    <input type="date" class="form-control" name="warranty_date">
                </div>

                <button class="form-control btn btn-success">Submit</button>
            </form>
        </div>
    </div>
@endsection
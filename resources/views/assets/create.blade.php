@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-4 offset-lg-4">
            <h3>Add new asset</h3>
            <a href="/assets" class="btn btn-info">Back to Asset lists</a>
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
                    <label for="category">Asset Type</label>
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
                    <label for="model">Model</label>
                    <input type="text" class="form-control" name="model">
                </div>
                <button class="form-control btn btn-success">Submit</button>
            </form>
        </div>
    </div>
@endsection
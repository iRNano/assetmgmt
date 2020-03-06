@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h1>Assets</h1>
            <a href="/assets/create" class="btn btn-success">Add Asset</a>
            {{-- <a href="/dashboard" class="btn btn-info">Back to Dashboard</a> --}}
            <a href="/assets" class="btn btn-info">ALL</a>
            @foreach(App\Category::all() as $category)
                <a href="/filterCategory/{{$category->id}}" class="btn btn-info">{{$category->name}}</a>
            @endforeach
                <form action="/assets/search">
                    <div class="form-group pt-2">
                        <input type="text" name="search" class="form-control"> 
                        <button class="pt-1 form-control btn btn-info">Search</button>    
                    </div>
                </form>
                <table class="table table-striped">

                
                    <thead>
                        {{-- <th>Asset Name</th> --}}
                        <th>Asset Type</th>
                        <th>Asset Brand</th>
                        <th>Asset Model</th>
                        <th>Available Stocks</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($assets as $asset) 
                            <tr>
                                <td>{{$asset->category->name}}</td>
                                <td>{{$asset->brand}}</td>
                                <td>{{$asset->model}}</td>
                                <td>{{DB::table('asset_details')->where([
                                    ['asset_id', '=',$asset->id], 
                                    ['status_id','=', 1]])->count()}}</td>
                                <td>
                                    <a href="/assets/{{$asset->id}}" class="btn btn-info">Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>  
            
        </div>
    </div>
@endsection
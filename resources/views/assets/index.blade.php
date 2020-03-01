@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1>Assets</h1>
            <a href="/assets/create" class="btn btn-info">Add Asset</a>

            
                <table class="table table-striped">
                    <thead>
                        <th>Asset Name</th>
                        <th>Asset Type</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($assets as $asset) 
                            <tr>
                                <td>{{$asset->name}}</td>
                                <td>{{$asset->category->name}}</td>
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
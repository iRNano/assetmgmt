@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h1>{{$asset->category->name}}</h1>
            {{$asset->brand}} {{$asset->model}}
            <a href="/assets" class="btn btn-info">Back to Assets</a>
            <form action="/assetDetails/create" method="GET">
                @csrf
                <input type="hidden" value="{{$asset->id}}" name="id">
                <button type="submit" class="btn btn-success">Add Stock</button>
            </form>

            <table class="table table-striped">
                <thead>
                    <th>Serial Number</th>
                    <th>Status</th>
                    <th>Accountability</th>
                    <th>Location</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($assetDetails as $assetDetail)
                        <tr>
                            <td>{{$assetDetail->serial_number}}</td>
                            <td>{{$assetDetail->status->name}}</td>
                            
                            <td>{{is_null($assetDetail->user) ? ' ' : $assetDetail->user->name}}</td>
                            <td>{{is_null($assetDetail->user) ? ' ' : $assetDetail->user->department->name}}</td>
                             
                            <td>
                                <div class="form-group">
                                    <a href="/assetDetails/{{$assetDetail->id}}/edit" class="btn btn-warning" class="form-control"><i class="fas fa-pencil-alt"></i></a>
                                </div>
                                    <form action="/assets/{{$asset->id}}" method="POST" class="form-group">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="asset_detail_id" value="{{$assetDetail->id}}">
                                        <button type="submit" class="form-control btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <a href="/assets/{{$asset->id}}/edit" class="btn btn-warning">Edit</a>
                <form action="/assets/{{$asset->id}}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit">DELETE</button>
            </form> --}}
        </div>
    </div>
    
@endsection
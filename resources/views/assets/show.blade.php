@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
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
                </thead>
                <tbody>
                    @foreach($assetDetails as $assetDetail)
                        <tr>
                            <td>{{$assetDetail->serial_number}}</td>
                            <td>{{$assetDetail->status->name}}</td>
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
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-4 offset-lg-4">
            <h1>Item details</h1>
            {{$asset->name}}    
            {{$asset->category->name}}
            <a href="/assets/{{$asset->id}}/edit" class="btn btn-warning">Edit</a>
                <form action="/assets/{{$asset->id}}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit">DELETE</button>
            </form>
        </div>
    </div>
    
@endsection
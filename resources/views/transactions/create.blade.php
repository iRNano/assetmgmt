@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3 text-center">
            <h1>Request View</h1>
            <a href="/dashboard" class="btn btn-info">Back to Dashboard</a>
            <a href="/transactions/create" class="btn btn-info">ALL</a>
            @foreach(App\Category::all() as $category)
                <a href="/categories/{{$category->id}}" class="btn btn-info">{{$category->name}}</a>
            @endforeach
            <a href="/cart" class="btn btn-warning">Cart</a>
            @if(Session::has('message'))
                <h4>{{Session::get('message')}}</h4>
            @endif
            {{-- Table --}}
                <table class="table table-striped">
                    <thead>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Available Units</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($assets as $asset)
                            @foreach($asset->details as $detail)
                                {{$detail}}
                            @endforeach
                            <tr>
                                <td>{{$asset->brand}}</td>
                                <td>{{$asset->model}}</td>
                                <td>
                                    
                                    {{DB::table('asset_details')->where([
                                    ['asset_id', '=',$asset->id], 
                                    ['status_id','=', 1]])->count()}}
                                </td>
                                <td>

                                    {{-- Request this item --}}
                                    <form action="/cart/" method="POST">
                                        @csrf
                                        @method('POST')
                                        <input type="number" max="{{DB::table('asset_details')->where('asset_id', $asset->id)->count()}}" min="0" name="quantity">
                                        <input type="hidden" name="asset_id" value="{{$asset->id}}">
                                        <input type="hidden" name="category" value="{{$asset->category}}">
                                        <input type="hidden" name="brand" value="{{$asset->brand}}">
                                        <input type="hidden" name="model" value="{{$asset->model}}">
                                        <button type="submit" formmethod="post"class="btn btn-success">Request</button>
                                    </form>

                                    {{-- Trigger modal --}}
                           {{--          <button class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModal">Request</button> --}}
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
                {{-- Modal --}}
{{--             <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    ...
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div> --}}
        </div>
    </div>
@endsection
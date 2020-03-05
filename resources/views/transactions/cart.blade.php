@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3 text-center">
            <h1>My Cart</h1>
            <a href="/transactions/create" class="btn btn-info">Add item</a>
            <a href="/dashboard" class="btn btn-info">Back to Dashboard</a>
            <table class="table table-striped">
                <thead>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @forelse($details_of_items_in_cart as $asset)
                    <tr>
                        <td>{{$asset->category->name}}</td>
                        <td>{{$asset->brand}}</td>
                        <td>{{$asset->model}}</td>
                        <td>
                                <form action="/cart/{{$asset->id}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="quantity"value="{{$asset->quantity}}" min="1" 
                                max="{{DB::table('asset_details')->where('asset_id', $asset->id)->count()}}" onchange="this.form.submit()">
                            </form>
                        
                        </td>
                        <td>
                            <form action="/cart/{{$asset->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                     <tr>
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        <td>{{$total}}</td>
                        <td></td>
                    </tr>
                    @empty 
                    <tr>
                        <td colspan="5" class="text-center">No Unsubmitted Requests</td>
                    </tr>    
                    @endforelse
                   
                </tbody>

                
            </table>
            @if(count($details_of_items_in_cart) > 0)
            <form action="/transactions" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Confirm Request</button>
            </form>
            @endif
        </div>

        
    </div>
@endsection

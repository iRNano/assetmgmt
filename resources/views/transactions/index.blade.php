@extends('layouts.app')

@section('content')
<div class="row"></div>
    <div class="col-lg-10 offset-lg-1">
        <h1>Transactions</h1>
        <a href="/dashboard" class="btn btn-info">Back to Dashboard</a>
        <table class="table table-striped">
            <thead>
                <th>Transaction Number</th>
                <th>Transaction Type</th>
                <th>Requestor</th>
                <th>Department</th>
                <th>Items</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>

                @forelse($transactions as $transaction)
                    <tr>
                    <td>{{$transaction->transNo}}</td>
                    <td>{{$transaction->type->name}}</td>
                    <td>{{$transaction->name}}</td>
                    <td>{{$transaction->user->department->name}}</td>

                    <td>
                        
                        @foreach($transaction->assets as $asset)
                            {{$asset->category->name}}
                            {{$asset->brand}}
                            {{$asset->model}} <br>

                            Quantity: {{$asset->pivot->quantity}} <br>

                        @endforeach
                        Total: {{$transaction->total}}
                        
                        
                    </td>
                    <td>{{$transaction->status->name}}</td>
                    <td><a href="/transactions/{{$transaction->id}}" class="btn btn-info">View Details</a></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">No Transactions</td>    
                    </tr>    
                    
                        
                    
                @endforelse
            </tbody>
        </table>
    </div>
</div>    
@endsection
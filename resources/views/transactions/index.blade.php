@extends('layouts.app')

@section('content')
<div class="row"></div>
    <div class="col-lg-8 offset-lg-2">
        <h1>Transactions</h1>
        <a href="/dashboard" class="btn btn-info">Back to Dashboard</a>
        <table class="table table-striped">
            <thead>
                <th>Transaction Number</th>
                <th>Transaction Type</th>
                <th>Requestor Name</th>
                <th>Department</th>
                <th>Items</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                @forelse($transactions as $transaction)
                    <tr>
                    <td>{{$transaction->transNo}}</td>
                    <td>Request</td>
                    <td>{{$transaction->name}}</td>
                    <td>{{$transaction->user->department->name}}</td>
                    <td>{{$transaction->pivot}}</td>
                    <td>{{$transaction->status->name}}</td>
                    <td></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No Transactions</td>    
                    </tr>    
                    
                        
                    
                @endforelse
            </tbody>
        </table>
    </div>
</div>    
@endsection
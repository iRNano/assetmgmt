@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1>My Assets</h1> <a href="/dashboard" class="btn btn-info">Back to dashboard</a>

            <table class="table tabble-striped">
                <thead>
                    <th>Asset Type</th>
                    <th>Asset Details</th>
                </thead>
                <tbody>
                    <tr>
                    <td>{{Auth::user()->transactions}}</td>
                    <td>{{Auth::user()->details}}</td>
                    </tr>
                </tbody>

            </table>
            {{auth()->user()->details}}  
            {{-- @foreach($assets as $asset) --}}
                {{-- {{$transactions[0]->assets}} --}}
                {{-- @foreach($transactions as $transaction)
                    @foreach($transaction->assets as $asset)
                        {{$asset->details}}
                    @endforeach
                @endforeach --}}
            {{-- @endforeach --}}
        </div>
    </div>    

    
    
@endsection
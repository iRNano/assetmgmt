@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1>My Assets</h1> <a href="/dashboard" class="btn btn-info">Back to dashboard</a>
            <a href="cart/return/confirm" class="btn btn-info">Returns</a>
            @if(Session::has('message'))
                <h4>{{Session::get('message')}}</h4>
            @endif
            <table class="table table-striped">
                <thead>
                    {{-- <th>Transaction Number</th> --}}
                    <th>Asset Type</th>
                    <th>Asset Details</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    {{-- Transaction --}}
                    {{-- @foreach(Auth::user()->transactions as $transaction)
                        @foreach($transaction->assets as $asset) --}}
                        @forelse(Auth::user()->details as $detail)

                            <tr>
                                <td>{{Str::upper($detail->asset->brand) . " " . $detail->asset->model}}</td>
                                <td>{{$detail->serial_number}}</td>
                                <td>
                                    {{-- Return this item --}}
                                    <form action="/cart/return" method="POST">
                                            @csrf
                                            @method('POST')

                                                <input type="hidden" name="asset_id" value="{{$detail->asset->id}}">
                                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                <input type="hidden" name="asset_detail_id" value="{{$detail->id}}">
                                                <input type="hidden" name="quantity" value="1">

                                            <button type="submit" formmethod="post"class="btn btn-success">Return</button>
                                        </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No Assets</td>
                            </tr>

                        @endforelse
                    {{-- @endforeach --}}
                </tbody>

            </table>
            {{-- {{auth()->user()->details}}   --}}
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
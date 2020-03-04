@extends('layouts.app')
@section('content')
    
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
        	<h1>Welcome to your Dashboard, {{Auth::user()->name}} !</h1>
            <a href="/assets" class="btn btn-info">Assets</a>
            <a href="/transactions" class="btn btn-info">Transactions</a>
            <a href="/transactions/create" class="btn btn-info">Requests</a>
            <a href="/myassets" class="btn btn-info">My Assets</a>
        </div>
    </div>
@endsection
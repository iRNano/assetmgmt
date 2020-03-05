@extends('layouts.app')
@section('content')
    
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
        	<h1>Welcome to your Dashboard, {{Auth::user()->name}} !</h1>
        	@if(Auth::user()->isAdmin)
	            <a href="/assets" class="btn btn-info">Assets</a>
	            <a href="/transactions" class="btn btn-info">Transactions</a>
            @endif
            @if(!Auth::user()->isAdmin)
	            <a href="/transactions/create" class="btn btn-info">Requests</a>
	            <a href="/myassets" class="btn btn-info">My Assets</a>
            @endif

            
        </div>
    </div>
</aside>
@endsection
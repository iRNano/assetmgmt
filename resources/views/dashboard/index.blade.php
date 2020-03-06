@extends('layouts.app')
@section('content')
    
{{-- <aside class="main-sidebar sidebar-dark-primary elevation-4"> --}}

    <div class="row">
        <div id="cover-dash">
            <h1>Dashboard</h1>
        </div>
   {{--  </div>
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
    </div> --}}
    </div>
    @if(Auth::user()->isAdmin)
        <div class="row">
            <div class="col-lg-4">
                <div id="assetsDash">
                    <div class="row">
                        <div class="col-lg-7">
                            Assets: {{count($assetDetails)}}
                        </div>
                        <div class="col-lg-5">
                            <small>
                            <p>Available: {{count($availAssets)}} </p>
                            <p>Deployed: {{count($deployedAssets)}}</p>
                            <p>Scrapped: {{count($scrappedAssets)}}</p>
                            <p>Sold: {{count($soldAssets)}}</p>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div id="transactionsDash">
                    <div class="row">
                        <div class="col-lg-7">
                            Transactions: {{count($transactions)}}
                        </div>
                        <div class="col-lg-5">
                            <small>
                            <p>Completed: {{count($completed)}}</p>
                            <p>Pending: {{count($pending)}}</p>
                            <p>Rejected: {{count($rejected)}}</p>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div id="usersDash">
                    <div class="row">
                        <div class="col-lg-7">
                            Users
                        </div>
                        <div class="col-lg-5">
                            <small>
                            <p>Registered: {{count($users)}}</p>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif
    @if(!Auth::user()->isAdmin)
        <div class="row">
            <div class="col-lg-4 "></div>
            <div class="col-lg-4 "></div>
        </div>
    @endif

{{-- </aside> --}}
@endsection
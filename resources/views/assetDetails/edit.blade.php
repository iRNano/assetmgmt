@extends('layouts.app')
@section('content')
	<div class="row">
        
		<div class="col-lg-6 offset-lg-3">
            <h1 class="text-center">Modify Asset</h1>
            <form action="/assetDetails" method="POST">
                @csrf

    		    <div class="form-group">
                    <label for="os">Operating System</label>
                    <input type="text" class="form-control" name="os" value="{{$assetDetails->os}}">
                </div>

                <div class="form-group">
                    <label for="specs">Specifications</label>
                    <input type="text" class="form-control" name="specs" value="{{$assetDetails->specs}}">
                </div>

                <div class="form-group">
                    <label for="serial_number">Serial Number</label>
                    <input type="text" class="form-control" name="serial_number" value="{{$assetDetails->serial_number}}">
                </div>
                <div class="form-group">
                    <label for="purchase_date">Purchase Date</label>
                    <input type="date" class="form-control" name="purchase_date" value="{{$assetDetails->purchase_date}}">
                </div>
                <div class="form-group">
                    <label for="warranty_date">Warranty End-Date</label>
                    <input type="date" class="form-control" name="warranty_date" value="{{$assetDetails->warranty_date}}">
                </div>
                @if($assetDetails->asset->category->id == 4)
                    <div class="software-view border border-danger">
                        <h4>Software -> to be hidden</h4>
                        <div class="form-group">
                            <label for="platform">Platform</label>
                            <input type="text" class="form-control" name="platform" value="{{$assetDetails->platform}}">
                        </div>
                        <div class="form-group">
                            <label for="no_of_users">Number of Users</label>
                            <input type="text" class="form-control" name="no_of_users" value="{{$assetDetails->no_of_users}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="license">License Number</label>
                            <input type="text" class="form-control" name="license" value="{{$assetDetails->license}}">
                        </div>
                    </div>
                @endif
                {{-- <input type="hidden" name="assetID" value="{{$assetID}}"> --}}
                <button type="submit" class="form-control btn btn-success">Modify</button>
            </form>
		</div>
	</div>
@endsection
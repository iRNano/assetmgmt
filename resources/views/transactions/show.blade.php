@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-lg-8 offset-lg-2 text-center">
		<h1>{{$transaction->transNo}} details</h1>
		<a href="/transactions" class="btn btn-info">Back to Transaction list</a>
		<table class="table table-striped">
			<thead>
				<th>Requestor</th>
				<th>Department</th>
				<th>Category</th>
				<th>Brand</th>
				<th>Model</th>
				<th>Quantity</th>
				{{-- <th>Action</th> --}}
			</thead>
			<tbody>
				
				@foreach($transaction->assets as $asset)
				
					<td>{{$transaction->name}}</td>
					<td>{{$transaction->user->department->name}}</td>
					<td>{{$asset->category->name}}</td>
					<td>{{$asset->brand}}</td>
					<td>{{$asset->model}}</td>
					<td>{{$asset->pivot->quantity}}</td>
				</tr>
				@endforeach


			</tbody>
		</table>
		@if($transaction->status_id == 1)
			<form action="/transactions/{{$transaction->id}}" method="POST">
				@csrf
				@method('PUT')
				<input type="hidden" name="reject" value="{{$transaction->id}}">
				<button type="Submit" class="btn btn-danger">Reject</button>
			</form>		
			<form action="/transactions/{{$transaction->id}}/edit" method="GET">
				@csrf
				
				<button type="Submit" class="btn btn-success">Assign Items</button>
			</form>		
		@endif
	</div>
</div>
@endsection
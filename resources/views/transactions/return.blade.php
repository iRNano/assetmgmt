@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-lg-6 offset-lg-3">
		<h1 class="text-center">Return Assets</h1>
		<a href="/dashboard" class="btn btn-info">Back to Dashboard</a>

		<table class="table table-striped">
			<thead>
				<th>Asset Type</th>
				<th>Asset Model</th>
				<th>Asset Details</th>
				<th>Action</th>
			</thead>
			<tbody>
				@forelse($details_of_items_in_cart as $detail)
				<tr>
					<td>{{$detail->asset->category->name}}</td>
					<td>{{$detail->asset->brand . " " . $detail->asset->model}}</td>
					<td>
						{{$detail->serial_number}}
					</td>
					<td><a href="#">Remove</a></td>


				@empty
					<td colspan="4" class="text-center">No Assets</td>
				</tr>
					@if($total > 0)
					<tr>
						<td></td>
						<td></td>
						<td>Total Units to be returned: </td>
						<td>{{$total}}</td>
					</tr>
					@endif
				@endforelse
				@if($total > 0)
					<tr>
						<td></td>
						<td><strong>Total Units to be returned: </strong></td>
						<td><strong>{{$total}}</strong></td>
						<td></td>
					</tr>
				@endif
			</tbody>
		</table>
		<div class="form-group"></div>
		@if(count($details_of_items_in_cart) > 0)
			<form action="/transactions/return" method="POST">
				@csrf
				<input type="hidden" name="user_id" value="{{auth()->user()->id}}">
				<button type="submit" class="btn btn-success form-control m-auto">Confirm</button>
			</form>
		@endif
	</div>
</div>
@endsection
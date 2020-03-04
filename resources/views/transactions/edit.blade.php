@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-lg-6 offset-lg-3 border border-solid">
			<h1 class="text-center">Assign Items</h1>

			<form action="/transactions/{{$transaction->id}}" method="POST">
				@csrf
				@method('PATCH')

				<div class="form-group">
					<label for="transNo">Transaction Number</label>
					<input type="text" name="transNo" value="{{$transaction->transNo}}" class="form-control">
				</div>
				<div class="form-group">
					<label for="requestor">Requestor</label>
					<input type="text" name="requestor" value="{{$transaction->name}}" class="form-control">
				</div>
				<div class="form-group">
					<label for="requestor">Department</label>
					<input type="text" name="requestor" value="{{$transaction->user->department->name}}" class="form-control">
				</div>
				<div class="form-group">
					<label for="items">Request items</label>
					
					<div class="col-lg-10 offset-lg-1 border border-striped py-2 ">

						
					@foreach($transaction->assets as $asset)
						
						<p name="items">Available Stocks for: </p>
						<p type="text" name="assets[]" >{{$asset->category->name . " " .$asset->brand ." ". $asset->model}}</p>
						{{-- {{$asset->details}} --}}
						@for($i=0; $i<$asset->pivot->quantity; $i++)
							Item {{$i+1}}
							<select name=details[] class="form-control">
								@foreach($asset->details as $detail)
									@if($detail->status_id == 1)
										
										<option value="{{$detail->id}}">{{$detail->serial_number}}</option>
									@endif
								@endforeach

							</select>
						@endfor
						
					@endforeach
					</div>
					
				</div>

				<button type="submit" class="btn btn-success form-control">Submit</button><a href="/transactions/{{$transaction->id}}" class="btn btn-danger form-control">Cancel</a>
			</form>
		</div>
	</div>
@endsection
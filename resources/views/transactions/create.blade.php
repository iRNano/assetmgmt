@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1>Create Transaction</h1>

            <form action="/transactions" method="POST">
                @csrf
                <div class="form-group">
                    <label for="trans_no">Transaction Number</label>
                    <input type="text" name="trans_no" class="form-control">
                </div>
                <div class="form-group">
                    <label for="trans_type">Transaction Type</label>
                    <select name="trans_type" class="form-control">
                        <option value="1">Request</option>
                        <option value="2">Return</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="trans_no">Transaction Number</label>
                    <input type="text" name="trans_no" class="form-control">
                </div>
                <div class="form-group">
                    <label for="trans_no">Transaction Number</label>
                    <input type="text" name="trans_no" class="form-control">
                </div>
            </form>
        </div>
    </div>
@endsection
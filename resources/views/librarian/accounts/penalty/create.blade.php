@inject('members', 'App\Services\MemberService')

@extends('layouts.master')

@section('pg-title', 'Add Payments')
@section('pg-head-left', 'Add Member Payments into Library Account')

@section('content')
    <div class="row">
    	<div class="col-md-8 col-md-offset-2">
    		<form action="{{ url('penalty') }}" method="POST">
    			{{ csrf_field() }}
    			<div class="form-group">
				    <select class="form-control show-tick select" name="member_id" data-live-search="true">
					    <option value="">Select Library Member</option>
					    @foreach($members->all() as $member)
					        <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
					            {{ $member->code ? $member->code . ' - ': '' }}{{ $member->name }}({{ $member->type }})
					        </option>
					    @endforeach
					</select>
					@include('layouts.partials.formError', ['key' => 'member_id'])
				</div>
				<div class="form-group form-float">
	                <div class="form-line{{ $errors->first('payment') ? ' error' : '' }}">
	                    <input type="text" class="form-control" name="payment" value="{{ old('payment') }}">
	                    <label class="form-label">Enter Penalty Amount (in english)</label>
	                </div>
	                @include('layouts.partials.formError', ['key' => 'payment'])
	            </div>
	            <div class="form-group form-float">
	                <div class="form-line{{ $errors->first('discount') ? ' error' : '' }}">
	                    <input type="text" class="form-control" name="discount" value="{{old('discount')}}">
	                    <label class="form-label">Enter Discount Amount (in english)</label>
	                </div>
	                @include('layouts.partials.formError', ['key' => 'discount'])
	            </div>
	            <div class="form-group text-center">
	            	<button type="submit" class="btn btn-info btn-lg">Make Payment</button>
	            </div>
    		</form>
    	</div>
    </div>
@stop
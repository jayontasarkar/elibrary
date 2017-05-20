@inject('members', 'App\Services\MemberService')

@extends('layouts.master')

@section('pg-title', 'Return Books by Members')
@section('pg-head-left', 'Return Books by Members')
@section('pg-head-right')
<div class="form-group">
    <select class="form-control show-tick select" name="member" data-live-search="true">
	    <option value="all">All Library Member</option>
	    @foreach($members->all() as $member)
	        <option value="{{ $member->id }}" {{ Request::input('member') == $member->id ? 'selected' : '' }}>
	            {{ $member->code ? $member->code . ' - ': '' }}{{ $member->name }}({{ $member->type }})
	        </option>
	    @endforeach
	</select>
</div>
@stop

@section('content')
	@include('librarian.return.list')
@stop

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
	$('.select').on('change', function (e) {
		event.preventDefault();
		var optionSelected = $(this).find("option:selected");
     	var valueSelected  = optionSelected.val();
		window.location.href = "{{ url('return-books') }}?member=" + valueSelected;
	});		
});	
</script>
@stop
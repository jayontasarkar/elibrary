@extends('layouts.master')

@section('pg-title', 'Edit Profile')
@section('pg-head-left', 'Edit Profile Info.')
@section('pg-head-right')
<a href="{{ url('profile') }}" class="btn btn-default">
    <i class="material-icons">subdirectory_arrow_left</i>&nbsp;Back
</a>
@stop

@section('content')
	@include('profile.forms.edit')
@stop

@section('scripts')
<script type="text/javascript">
$(function() {
	$('.datepicker').bootstrapMaterialDatePicker({ weekStart : 0, time: false});	
	$('.datepicker').bootstrapMaterialDatePicker(
		'setDate', "{{ $profile->dob ? $profile->dob->format('Y-m-d') : date('Y-m-d')  }}"
	);	
});	
</script>
@stop

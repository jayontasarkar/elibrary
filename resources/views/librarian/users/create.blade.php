@extends('layouts.master')

@section('pg-title', 'User Management | Create User')
@section('pg-head-left', 'Login User Management | Create New User')
@section('pg-head-right')
<a href="{{ url('users') }}" class="btn btn-default">
    <i class="material-icons">subdirectory_arrow_left</i>&nbsp;Back
</a>
@stop

@section('content')

    @include('librarian.users.forms.create')

@stop

@section('scripts')
<script type="text/javascript">
$(function() {
	$('.datepicker').bootstrapMaterialDatePicker({ weekStart : 0, time: false });		
});	
</script>
@stop
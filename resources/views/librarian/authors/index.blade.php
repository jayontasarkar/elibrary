@extends('layouts.master')

@section('pg-title', 'Author Management')
@section('pg-head-left', 'Book Author Management')
@section('pg-head-right')
	<a href="{{ url('authors/create') }}" class="btn bg-cyan waves-effect">
		<i class="material-icons">person_add</i>
		<span class="icon-name">ADD NEW AUTHOR</span>
	</a>
@stop

@section('content')
    <div class="row clearfix">
	    <div class="col-md-12">
			@include('librarian.authors.list')
	    </div>
	</div>
@stop

@section('scripts')
	@if(count($authors))
	    @include('layouts.partials.datatable', [
	        'columns' => "0, 1, 2, 3, 4",
	        'heading' => "List of Authors"
	    ])
	@endif	
@stop
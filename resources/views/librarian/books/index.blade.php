@extends('layouts.master')

@section('pg-title', 'Books Management')
@section('pg-head-left', 'eLibrary - Books Management')
@section('pg-head-right')
	<a href="{{ url('books/create') }}" class="btn bg-cyan waves-effect">
		<i class="material-icons">book</i>
		<span class="icon-name">ADD NEW BOOK</span>
	</a>
@stop

@section('content')
    @include('librarian.books.list')
@stop

@section('scripts')
	@if(count($books))
        @include('layouts.partials.datatable', [
            'columns' => "0, 1, 2, 3, 4, 5, 6",
            'heading' => "List of all library books"
        ])
    @endif
@stop
@extends('layouts.master')

@section('pg-title', 'Author Books')
@section('pg-head-left', 'Author: ' . $author->name)
@section('pg-head-right')
<a href="{{ url('authors') }}" class="btn btn-default">
    <i class="material-icons">subdirectory_arrow_left</i>&nbsp;Back
</a>
@stop

@section('content')
    <div class="row clearfix">
	    <div class="col-md-12">
	        <div class="card">
	        	<div class="body">
					<table class="table table-bordered table-striped table-hover dataTable datatable">
					    <thead>
					        <tr class="active">
					        	<th>#</th>
					            <th>Book Title</th>
					            <th>Category Name</th>
					            <th>Book Location</th>
					            <th>Total Copy</th>
					            <th>Available</th>
					        </tr>
					    </thead>
					    <tbody>
					    @if(count($author->books))
					    @foreach($author->books as $key => $book)
					        <tr>
					        	<td>{{ $key + 1 }}</td>
					            <td>{{ $book->title }}</td>
					            <td>{{ $book->category->title ? : 'uncategorized' }}</td>
					            <td>{{ $book->location ? : 'no location' }}</td>
					            <td>{{ $book->total_copy }}</td>
					            <td>{{ $book->available_copy }}</td>
					        </tr>
					    @endforeach  
					    @else
					        <tr>
					            <td colspan="5" class="text-center" style="font-size: large;">no books found for this author.</td>
					        </tr>
					    @endif  
					    </tbody>
					</table>
	            </div>
	        </div>
	    </div>
	</div>
@stop

@section('scripts')
    @if(count($author->books))
        @include('layouts.partials.datatable', [
            'columns' => "0, 1, 2, 3, 4, 5",
            'heading' => "List of Books of `$author->name`"
        ])
    @endif
@stop
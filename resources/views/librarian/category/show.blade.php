@extends('layouts.master')

@section('pg-title', 'Categorize Books')
@section('pg-head-left', 'Category: ' . $category->title)
@section('pg-head-right')
<a href="{{ url('categories') }}" class="btn btn-default">
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
					            <th>Author Name</th>
					            <th>Book Location</th>
					            <th>Total Copy</th>
					            <th>Available</th>
					        </tr>
					    </thead>
					    <tbody>
					    @if(count($category->books))
					    @foreach($category->books as $key => $book)
					        <tr>
					        	<td>{{ $key + 1 }}</td>
					            <td>{{ $book->title }}</td>
					            <td>{{ $book->author->name ? : 'no author' }}</td>
					            <td>{{ $book->location ? : 'no location' }}</td>
					            <td>{{ $book->total_copy }}</td>
					            <td>{{ $book->available_copy }}</td>
					        </tr>
					    @endforeach  
					    @else
					        <tr>
					            <td colspan="5" class="text-center" style="font-size: large;">no books found in this category.</td>
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
    @if(count($category->books))
        @include('layouts.partials.datatable', [
            'columns' => "0, 1, 2, 3, 4, 5",
            'heading' => "List of Books of `$category->title` category"
        ])
    @endif
@stop
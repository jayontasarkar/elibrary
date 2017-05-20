@extends('layouts.master')

@section('pg-title', 'Categorize Books')
@section('pg-head-left', 'Categories of Books from Library')

@section('content')
    <div class="row clearfix">
	    <div class="col-md-8">
	        <div class="card">
	        	<div class="body">
					@include('librarian.category.list')
	            </div>
	        </div>
	    </div>
	    <div class="col-md-4">
	        <div class="card">
	        	<div class="header">
	        		<span style="font-size: large">Create New Book Category</span>
	        	</div>
	            <div class="body">
					@include('librarian.category.create')
	            </div>
	        </div>
	    </div>
	</div>
	@include('librarian.category.edit')            
@stop

@section('scripts')
    @if(count($categories))
        @include('layouts.partials.datatable', [
            'columns' => "0, 1, 2, 3",
            'heading' => "List of Book Categories"
        ])
    @endif
    <script type="text/javascript">
    $(document).ready(function() {
    	$('.error-msg').hide();
    	$(".edit-btn").on('click', function(event){
    		event.preventDefault();
    		var $this = $(this);
    		$("#editCategoryModal .id").val($this.attr('data-id'));    
    		$("#editCategoryModal .title").val($this.attr('data-title'));    
    		$("#editCategoryModal .desc").val($this.attr('data-desc'));    
    		$("#editCategoryModal").modal('show');
    	});

    	$(".submit-btn").on('click', function(event){
    		event.preventDefault();
    		var id = $("#editCategoryModal .id").val(),  
    		   url = "{{ url('categories') }}" + "/" + id;
    		$.post(
				url, 
				{
					'id': id,
					'title': $("#editCategoryModal .title").val(),
					'description': $("#editCategoryModal .desc").val(),
					'_token': "{{ csrf_token() }}",
					"_method": "PATCH"
				}
			).done(function(response){
				location.reload();
			}).fail(function(response){
				var input = $(".title-input");
				input.addClass('error');
				$('.error-msg').text('invalid category title given');
				$('.error-msg').show();
			});
		});
    });	
    </script>
@stop
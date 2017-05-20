@inject('members', 'App\Services\MemberService')

@extends('layouts.master')

@section('styles')
	<link rel="stylesheet" href="{{ asset('smartcart/css/smart_cart.css') }}">
	<style type="text/css">
		.scLabelSubtotalValue,
		.scLabelSubtotalText,
		.scCartItemTitle {
			display: none;
		}
		.scCartTitle4, .scCartItemTitle4 {
			display: none;
		}
	</style>
@stop

@section('pg-title', 'Borrow Books')
@section('pg-head-left', 'Borrow Books from Library')
@section('pg-head-right')
<div class="form-group">
    <select class="form-control show-tick select error" name="member" data-live-search="true">
		<option value="">___ SELECT BOOK BORROWER ___</option>
	    @foreach($members->all() as $member)
	        <option value="{{ $member->id }}">
	            {{ $member->code ? $member->code . ' - ': 'XXXX - ' }}
	            {{ $member->name }}({{ $member->type }})
	        </option>
	    @endforeach
	</select>
</div>
@stop

@section('content')
	    
	<table align="center" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td>  
				<form action="results.php" method="post">	
				    <div id="SmartCart" class="scMain">
					@foreach($books as $book)
				    	<input type="hidden" 
				    			pimage="{{ asset('images/books.jpg') }}" 
				    			pprice="{{ $book->available_copy }}" 
				    			pdesc="{{ $book->author->name }}" 
				    			pcategory="{{ $book->category->title }}" 
				    			pname="{{ $book->title }}" 
				    			pid="{{ $book->id }}"
				    		>  
				    @endforeach	
				</form>
			</td>
		</tr>
	</table>

@stop

@section('scripts')
	<script src="{{ asset('smartcart/js/jquery.smartCart.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function(){
	    	$('#SmartCart').smartCart({
	    		onCheckout: function(obj){ 
	    			cartCheckout(obj); 
	    		}
	    	});

	    	function cartCheckout(obj){
	    		var books = [];
	    		var selected = $('.select option:selected').val();
	    		if(selected !== "") {
	         		obj.children("option").each(function(n) {                     
			            var pValue = $(this).attr("value");
			            var valueArray = pValue.split('|');
			            var obj = {
			            	id : valueArray[0],
			            	copies : valueArray[1],
			            };
			            books.push(obj);
			        });    
		            if(books.length > 0) {
		            	$.post('/v2/api/members/borrow', {
		            		_token : "{{ csrf_token() }}",
		            		member : selected,
		            		books : books
		            	}).done(function(response){
		            		location.reload();
		            	});
		            }else{
		            	alert('select at least one book to borrow');
		            }
	         	}else{
	         		alert('please select a member to borrow books / checkout');
	         	}
	        }
		});
	</script>
@stop
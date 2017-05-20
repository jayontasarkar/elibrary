@inject('members', 'App\Services\MemberService')

@extends('layouts.master')

@section('pg-title', 'Borrow History')
@section('pg-head-left', 'Book Management History (last one month)')
@section('pg-head-right')
<form method="GET" action="{{ url('history') }}">
    <div class="row clearfix">
        <div class="col-md-4 col-sm-4 col-xs-6">
            <div class="form-group">
                <div class="form-line">
                    <select class="form-control show-tick select" name="user" data-live-search="true">
					    <option value="all">All Library Member</option>
					    @foreach($members->all() as $member)
					        <option value="{{ $member->id }}" {{ Request::input('member') == $member->id ? 'selected' : '' }}>
					            {{ $member->code ? $member->code . ' - ': '' }}{{ $member->name }}({{ $member->type }})
					        </option>
					    @endforeach
					</select>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-6">
            <div class="form-group">
                <div class="form-line">
	                <select name="type" class="form-control">
	                    <option value="all" 
	                    	{{ Request::input('type') == 'all' ? 'selected' : '' }}
	                    >
	                    	ALL Type
		        		</option>
		        		<option value="all" 
	                    	{{ Request::input('type') == 'borrow' ? 'selected' : '' }}
	                    >
	                    	Borrow Type
		        		</option>
		        		<option value="return" 
	                    	{{ Request::input('type') == 'return' ? 'selected' : '' }}
	                    >
	                    	Return Type
		        		</option>
		        	</select>	
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-12">
            <button type="submit" class="btn btn-info waves-effect">
				<i class="fa fa-search"></i>
            </button>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-12">
        	<a href="{{ url('history') }}" class="btn btn-default">CLR</a>
        </div>
    </div>
</form>
@stop

@section('content')
    <table class="table table-bordered table-striped table-hover dataTable datatable">
        <thead>
            <tr class="active">
            	<th>Member Code</th>
            	<th>Member Name</th>
                <th>Book Name</th>
            	<th>Book Category</th>
                <th>Copies</th>
                <th>History</th>
                <th>History Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @if(count($histories))
        @foreach($histories as $history)
            <tr>
            	<td>
            		{{ $history->borrow->member->code ? : 'XXXX' }}
            	</td>
            	<td>
            		{{ $history->borrow->member->name }}
            	</td>
                <td>
					{{ $history->borrow->book->title }}
                </td>
                <td>
					{{ $history->borrow->book->category->title }}
                </td>
                <td>
					{{ $history->copies }}
                </td>
                <td>{{ $history->type == 'borrow' ? 'Book Borrowed' : 'Book Returned' }}</td>
                <td>
                	{{ $history->created_at->format('d M h:i A') }}
                </td>
                <td>
                    @if($history->type == 'borrow')
						<a href="{{ url('history/borrow/' . $history->id) }}" 
							class="btn btn-warning btn-xs borrow"
						>
							Cancel Borrow
						</a>
                    @endif
                    @if($history->type == 'return')
						<a href="{{ url('history/return/' . $history->id) }}" 
							class="btn btn-warning btn-xs return"
						>
							Cancel Return
						</a>
                    @endif
                </td>
            </tr>
        @endforeach 
        @else
        	<tr>
        	   	<td colspan="8">
        	  		<p class="text-center" style="font-size: large;">
        	  			no history found to display.
        	  		</p> 		
        	   	</td>
        	</tr> 
        @endif	  
        </tbody>
    </table>
@stop

@section('scripts')
    @if(count($histories))
        @include('layouts.partials.datatable', [
            'columns' => "0, 1, 2, 3, 4",
            'heading' => "List of Histories of Borrow Management"
        ])
    @endif
    <script type="text/javascript">
	$(document).ready(function() {
		$('.borrow, .return').on('click', function(event){
			event.preventDefault();
			var $this = $(this),
			    url = $this.attr('href');

			swal({
			  title: 'Are you sure?',
			  text: "this will delete history & all data will revert back",
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Confirm'
			}).then(function () {
			  $.get(url, function(response) {
			  	location.reload();
			  });
			})
		})
	});
    </script>
@stop
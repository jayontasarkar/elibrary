@extends('layouts.master')

@section('pg-title', 'Unavailable Books')
@section('pg-head-left', 'Members with Books that have not been returned yet')

@section('content')

<table class="table table-bordered table-hover dataTable datatable">
    <thead>
        <tr class="active">
        	<th style="width: 5%;"></th>
            <th style="width: 10%">Member Name</th>
            <th style="width: 15%">Residential Address</th>
            <th style="width: 10%">Contact No.</th>
            <th style="width: 10%">Member Type</th>
            <th style="width: 50%">Borrowed Books </th>
        </tr>
    </thead>
    <tbody>
    @if(count($members))
    @foreach($members as $member)
		<tr>
			<td>
        		<img src="{{ $member->avatar_url() }}" alt="" height="32" width="32" style="border-radius: 50%;">
        	</td>
			<td>{{ $member->name }}</td>
			<td>{{ $member->address ? : 'no address found' }}</td>
			<td>{{ $member->phone ? : 'no phone no.' }}</td>
			<td>{{ ucwords($member->type) }}</td>
			<td>
				@if(count($member->borrows))
					@foreach($member->borrows as $borrow)
						<p>
							{{ $borrow->book->title }}({{ $borrow->book->isbn ? : 'XXXX' }})
							<span class="badge pull-right">{{ $borrow->borrow_date->format('M d, Y') }}</span>
						</p>	
					@endforeach
				@endif
			</td>
		</tr>
	@endforeach	
	@else
		<tr>
			<td colspan="6">
				<p class="text-center" style="font-size: large;">
					all books have returned by members that were borrowed
				</p>
			</td>
		</tr>
	@endif
    </tbody>
</table>    
@stop

@section('scripts')
    @if(count($members))
        @include('layouts.partials.datatable', [
            'columns' => "1, 2, 3, 4, 5",
            'heading' => "List of Members who has not returned books"
        ])
    @endif
@stop
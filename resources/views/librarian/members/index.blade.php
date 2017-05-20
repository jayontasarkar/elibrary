@extends('layouts.master')

@section('pg-title', 'Member Management')
@section('pg-head-left', 'Book Borrowers/Readers')
@section('pg-head-right')
<a href="{{ url('members/create') }}" class="btn bg-cyan waves-effect">
	<i class="material-icons">person_add</i>
	<span class="icon-name">ADD NEW MEMBER</span>
</a>
@stop

@section('content')
    <table class="table table-bordered table-striped table-hover dataTable datatable">
        <thead>
            <tr class="active">
            	<th></th>
                <th>CODE</th>
            	<th>FullName</th>
                <th>Address</th>
                <th>Mobile No</th>
                <th>Type</th>
                <th>Edit</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($members as $member)
            <tr>
            	<td>
            		<img src="{{ $member->avatar_url() }}" alt="" height="32" width="32" style="border-radius: 50%;">
            	</td>
                <td>{!! $member->code ? : '<span class="col-blue-grey">XXXXX</span>'  !!}</td>
                <td> <a href="{{ url('members/' . $member->id) }}"> {{ $member->name }} </a></td>
                <td>{{ $member->address }}</td>
                <td>{!! $member->phone ? : '<span class="col-blue-grey">XXXXXXXXXX</span>' !!}</td>
                <td>{{ ucwords($member->type) }}</td>
                <td>{{ $member->status ? 'Active' : 'Suspended' }}</td>
                <td>
                    @if( in_array($member->type, ['librarian', 'assistant']))
                        <a class="btn btn-xs bg-brown" disabled="disabled">
                            <i class="material-icons">lock</i> &nbsp;LOCKED
                        </a>
                    @else
                        <a href="{{ url('members/' . $member->id . '/edit') }}" class="btn btn-xs bg-blue-gray">
                            <i class="material-icons">mode_edit</i>EDITABLE
                        </a>
                    @endif
                </td>
                <td>
                    @if( in_array($member->type, ['librarian', 'assistant']))
                        <a class="btn btn-xs bg-brown" disabled="disabled">
                            <i class="material-icons">lock</i> &nbsp;LOCKED
                        </a>
                    @else
                    <form action="{{ url('members/' . $member->id . '/toggle') }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <button type="submit" 
                            class="btn {{ $member->status ? 'bg-red' : 'bg-blue-grey' }} waves-effect btn-xs"
                        >
                            @if($member->status)
                            <i class="material-icons">clear</i> SUSPEND
                            @else
                            <i class="material-icons">check</i> ACTIVATE
                            @endif
                        </button>
                    </form>
                    @endif
                </td>
            </tr>
        @endforeach    
        </tbody>
    </table>
@stop

@section('scripts')
    @if(count($members))
        @include('layouts.partials.datatable', [
            'columns' => "1, 2, 3, 4, 5",
            'heading' => "List of Members/Borrowers"
        ])
    @endif
@stop
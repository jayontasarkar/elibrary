@extends('layouts.master')

@section('pg-title', 'User Management')
@section('pg-head-left', 'Login User Management')
@section('pg-head-right')
<a href="{{ url('users/create') }}" class="btn bg-cyan waves-effect">
	<i class="material-icons">person_add</i>
	<span class="icon-name">ADD NEW USER</span>
</a>
@stop

@section('content')
    <table class="table table-bordered table-striped table-hover dataTable datatable">
        <thead>
            <tr>
                <th></th>
                <th>CODE</th>
                <th>FullName</th>
                <th>UserName</th>
                <th>Mobile No.</th>
                <th>Last Login</th>
                <th>User Type</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td> <img src="{{ $user->avatar_url() }}" height="40" width="40" style="border-radius: 50%;"> </td>
                <td>{{ $user->code ? : 'NO CODE' }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->last_login ? $user->last_login->format('M d, Y h:i A') : 'Not available' }}</td>
                <td>{{ ucwords($user->type) }}</td>
                <td>{{ $user->status ? 'Active' : 'Suspended' }}</td>
                <td>
                    <form action="{{ url('users/' . $user->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <button type="submit" 
                            class="btn {{ $user->status ? 'bg-red' : 'bg-blue-grey' }} waves-effect btn-xs"
                        >
                            @if($user->status)
                            <i class="material-icons">clear</i> SUSPEND
                            @else
                            <i class="material-icons">check</i> ACTIVATE
                            @endif
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach    
        </tbody>
    </table>
@stop

@section('scripts')
    @if(count($users))
        @include('layouts.partials.datatable', [
            'columns' => "1, 2, 3, 4, 5, 6, 7",
            'heading' => "List of Software Users"
        ])
    @endif
@stop
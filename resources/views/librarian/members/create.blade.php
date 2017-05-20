@extends('layouts.master')

@section('pg-title', 'Member Management | Create Member')
@section('pg-head-left', 'Member Management | Create New Member')
@section('pg-head-right')
<a href="{{ url('members') }}" class="btn btn-default">
    <i class="material-icons">subdirectory_arrow_left</i>&nbsp;Back
</a>
@stop

@section('content')

    @include('librarian.members.forms.create')

@stop

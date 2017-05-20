@extends('layouts.master')

@section('pg-title', 'Member Management | Edit Member')
@section('pg-head-left', 'Edit Member: ' . $member->name)
@section('pg-head-right')
<a href="{{ url('members') }}" class="btn btn-default">
    <i class="material-icons">subdirectory_arrow_left</i>&nbsp;Back
</a>
@stop

@section('content')

    @include('librarian.members.forms.edit')

@stop

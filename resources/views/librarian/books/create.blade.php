@inject('categories', 'App\Services\CategoryService')
@inject('authors', 'App\Services\AuthorService')

@extends('layouts.master')

@section('pg-title', 'Book Management | New Book')
@section('pg-head-left', 'Add New Books into Library')
@section('pg-head-right')
<a href="{{ url('books') }}" class="btn btn-default">
    <i class="material-icons">subdirectory_arrow_left</i>&nbsp;Back
</a>
@stop

@section('content')
    @include('librarian.books.forms.create')
@stop

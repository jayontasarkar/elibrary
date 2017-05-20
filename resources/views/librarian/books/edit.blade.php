@inject('categories', 'App\Services\CategoryService')
@inject('authors', 'App\Services\AuthorService')

@extends('layouts.master')

@section('pg-title', 'Book Management | Edit Book')
@section('pg-head-left', 'Edit Book: ' . $book->title)
@section('pg-head-right')
<a href="{{ url('members') }}" class="btn btn-default">
    <i class="material-icons">subdirectory_arrow_left</i>&nbsp;Back
</a>
@stop

@section('content')

    @include('librarian.books.forms.edit')

@stop

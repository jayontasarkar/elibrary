<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\Books\CreateRequest;
use App\Http\Requests\Books\EditRequest;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('librarian', ['except' => ['borrow']]);
    }

    public function index()
    {
    	$books = Book::with('category', 'author')
    	    ->orderBy('category_id')
    	    ->get();

    	return view('librarian.books.index', compact('books'));
    }

    public function create()
    {
    	return view('librarian.books.create');
    }

    public function store(CreateRequest $request)
    {
    	Book::create($request->all());

    	flash()->success('Created', 'new book added into library');
    	return back();
    }

    public function edit(Book $book)
    {
    	return view('librarian.books.edit', [
    		'book' => $book
    	]);
    }

    public function update(EditRequest $request, Book $book)
    {
    	$book->update($request->all());

    	flash()->success('Updated', 'book info updated successfully');
    	return redirect('books');
    }

    public function borrow()
    {
        return Book::orderBy('title')
                ->where('available_copy', '>', 0)
                ->get();
    }
}

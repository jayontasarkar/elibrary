<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'librarian']);
    }
    
    public function index()
    {
    	$categories = Category::latest()->get();

    	return view('librarian.category.index', compact('categories'));
    }

    public function show(Category $category)
    {
        return view('librarian.category.show', [
            'category' => $category->load('books.author')
        ]);
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required|min:3|unique:categories,title',
    		'description' => 'nullable|min:5'
    	]);

    	Category::create($request->all());

    	flash()->success('Created', 'new category created successfully');
    	return back();
    }

    public function update(Request $request, Category $category)
    {
    	$this->validate($request, [
    		'title' => 'required|min:2|unique:categories,title,' . $request->id,
    		'description' => 'nullable|min:5'
    	]);
    	$category->update($request->all());

    	flash()->success('Updated', 'Category updated successfully');
    	return response()->json(['success' => 'category updated'], 200);
    }
}

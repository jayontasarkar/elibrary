<?php

Route::get('/', function () {
    return view('layouts.frontend');
});

Route::get('/dashboard', 'DashboardController@index')->middleware('auth');
Route::get('/home', function(){
	return redirect('dashboard');
});

// Gallery Management
Route::get('/gallery', 'GalleriesController@index');
Route::post('gallery', 'GalleriesController@store');
Route::get('gallery/delete/{gallery}', 'GalleriesController@destroy');

// User Management
Route::resource('users', 'UsersController', ['except' => ['edit', 'destroy']]);

//User Profile Management
Route::get('profile', 'ProfileController@index');
Route::get('profile/edit', 'ProfileController@edit');
Route::patch('profile/edit', 'ProfileController@update');
Route::patch('profile/avatar', 'ProfileController@upload');
Route::post('/password/reset', 'ProfileController@resetPassword');
// Member Management
Route::resource('members', 'MembersController');
Route::patch('members/{member}/toggle', 'MembersController@toggleStatus');
Route::get('/v2/api/members', 'MembersController@all');

// Books Category Management
Route::resource('/categories', 'CategoriesController', ['only' => ['index', 'show', 'store', 'update']]);

// Books Author Management
Route::resource('/authors', 'AuthorsController', ['except' => ['destroy']]);

// Books Management
Route::resource('/books', 'BooksController');
Route::get('/v2/api/books', 'BooksController@borrow');
Route::post('/v2/api/members/borrow', 'BookManagementController@borrowBooks');

// Borrow Books from Libarary
Route::get('/borrow-books', 'BookManagementController@borrow');
Route::get('/return-books', 'BookManagementController@getReturn');
Route::get('/return-books/{borrow}', 'BookManagementController@return');
Route::get('/unavailable-books', 'BookManagementController@unavailable');
Route::get('/borrowed-books', 'BookManagementController@borrowedBooks');

/**
 * History Routes
 */
Route::get('/history', 'HistoryController@index');
Route::get('/history/borrow/{history}', 'HistoryController@borrow');
Route::get('/history/return/{history}', 'HistoryController@return');

/**
 * Accounts Routes
 */
Route::get('penalty/create', 'AccountsController@createPenalty');
Route::post('penalty', 'AccountsController@storePenalty');

/**
 * Authentication Routes
 */
Route::group(['middleware' => 'guest'], function() {
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('/login', 'Auth\LoginController@login');
});
Route::get('/logout', 'Auth\LoginController@logout')->middleware('auth');

Route::get('/test', function(){
	$borrows = new App\Services\WidgetsService;
	return $borrows->graphInputs();
});

Route::get('borrows/graph', function(\App\Services\WidgetsService $service) {
    return $service->graphInputs();
});
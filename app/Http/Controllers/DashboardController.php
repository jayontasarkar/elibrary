<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
	/**
	 * Constructor function
	 */
    public function __construct()
    {
    	$this->middleware('auth');
    }

    /**
     * Dashboard page for authenticated users
     * @return [type] [description]
     */
    public function index()
    {
    	return view('librarian.dashboard');
    }
}

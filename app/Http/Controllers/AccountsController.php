<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function createPenalty()
    {
    	return view('librarian.accounts.penalty.create');
    }

    public function storePenalty(Request $request)
    {
    	$this->validate($request, [
    		'member_id'   => 'required|numeric|exists:members,id',
    		'payment'  => 'required|numeric|min:0',
    		'discount' => 'nullable|numeric|min:0',
    	]);

    	Account::create($request->all());

    	flash()->success('Created', 'new payment created for selected member');
    	return back();
    }
}

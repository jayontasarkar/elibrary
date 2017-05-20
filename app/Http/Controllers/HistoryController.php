<?php

namespace App\Http\Controllers;

use App\History;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth', 'librarian']);
	}

    public function index(Request $request)
    {
    	$histories = (new History)->newQuery();
    	$histories->with('borrow.book.category', 'borrow.member');
    	if($user = $request->has('user')){
    		if($user !== 'all'){
	    		$histories->whereHas('borrow', function($query) use($user) {
	    			$query->where('member_id', $user);
	    		});
    		}
    	}
    	if($type = $request->has('type')){
    		if($type !== 'all')
    			$histories->where('type', $type);
    	}
    	$histories->where('created_at', '>', Carbon::now()->subMonth());
    	$histories->orderBy('created_at', 'desc');
    	
    	return view('librarian.history.index', [
    		'histories' => $histories->get()
    	]);
    }

    public function borrow(History $history)
    {
    	$history->borrow->book->increment('available_copy', $history->copies);
    	$history->borrow->delete();
    	$history->delete();

    	flash()->success('Removed', 'borrow history removed permanently');
    	return response()->json(['success' => 'Removed'], 200);
    }

    public function return(History $history)
    {
    	$history->borrow->book->decrement('available_copy', $history->copies);
    	$history->borrow->update(['return_date' => null]);
    	$history->delete();

    	flash()->success('Removed', 'return history removed permanently');
    	return response()->json(['success' => 'Removed'], 200);
    }
}

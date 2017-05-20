<?php

namespace App\Http\Controllers;

use App\Book;
use App\Borrow;
use App\History;
use App\Http\Requests\Carts\CartRequest;
use App\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookManagementController extends Controller
{
    public function borrow()
    {
        $books = Book::orderBy('title')->with('category', 'author')->get();

    	return view('librarian.borrow.index', compact('books'));
    }

    public function borrowBooks(CartRequest $request)
    {
        $books = $request->books;
        $member = $request->member;
        foreach($books as $book) {
            $borrow = Borrow::create([
                'book_id' => $book['id'],
                'member_id' => $member,
                'copies' => $book['copies'],
                'borrow_date' => Carbon::now()
            ]);

            $borrow->book->decrement('available_copy', $book['copies']);
            $history = new History;
            $history->borrow_id = $borrow->id;
            $history->copies = $book['copies'];
            $history->save();
        }

        flash()->success('Successfull', 'Borrow Book entry stored successfully');
        return response()->json(['success' => 'Borrow book succedded'], 200);
    }

    public function getReturn(Request $request)
    {
    	$books = (new Borrow)->newQuery();
    	if($request->has('member') && $request->member !== 'all')
		{
			$books->where('member_id', $request->member);
		}
		$books->where(function($query){
            /**
			$query->where(
				\DB::raw('TIMESTAMPDIFF(DAY, borrow_date, return_date)'), '>', 
				config('library.settings.penalty_after')
			);
            **/
			$query->whereNull('return_date');	
		});
		$books->orderBy('borrow_date', 'desc');
		$books->with('member', 'book.category');

		$result = $books->get();

    	return view('librarian.return.index', [
    		'books' => $result
    	]);
    }

    public function borrowedBooks()
    {
        
    }

    public function return(Borrow $borrow)
    {
    	$borrow->update(['return_date' => Carbon::now()]);
        $borrow->book->increment('available_copy', $borrow->copies);

        $history = new History;
        $history->borrow_id = $borrow->id;
        $history->copies = $borrow->copies;
        $history->type = 'return';
        $history->save();

    	flash()->success('Returned', 'book return entry placed. keep book into self');
    	return back();
    }

    public function unavailable()
    {
        $members = Member::with(['borrows' => function($query){
            $query->where('return_date', null);
            $query->with('book');
        }])->whereHas('borrows', function ($query) {
            $query->where('return_date', null);
        })
        ->get(); 

        return view('librarian.reports.unavailableBooks', [
            'members' => $members
        ]);
    }
}

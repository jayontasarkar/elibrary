<?php 

namespace App\Services;

use App\Book;
use App\Member;
use Carbon\Carbon;

class WidgetsService
{
	public function widgets()
	{
		$books = Book::all();

		$total = $books->sum('total_copy') ? : 0;

		$borrowed = ($total - $books->sum('available_copy') ? : 0);

		$faculty = Member::where('type', 'staff')->orWhere('type', 'teacher')->get();
		$student = Member::where('type', 'student')->get();

		return [
			'totalBooks' => $total,
			'borrowed'   => $borrowed,
			'faculty'    => count($faculty),
			'student'    => count($student)
		];
	}

	public function graphInputs()
	{
		$borrows = \App\Borrow::where('borrow_date', '>', Carbon::now()->subYear())
	        ->get()
	        ->groupBy(function($group) {
	            return $group->borrow_date->format('M');
	       });

	    return count($borrows) ? $this->formatInputs($borrows) : [ date('M') => 0 ];
	}

	private function formatInputs($borrows)
	{
		$result = [];
	    foreach($borrows as $key => $value){
	    	$result[$key] = $value->sum('copies');
	    } 

	    return $result ? $this->formatData($result) : [];
	}

	private function formatData($result)
	{
		$labels = array_keys($result);
		$data   = array_values($result);

		return ['labels' => $labels, 'data' => $data];
	}
}
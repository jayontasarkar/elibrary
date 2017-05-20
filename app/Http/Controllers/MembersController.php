<?php

namespace App\Http\Controllers;

use App\Http\Requests\Members\CreateRequest;
use App\Http\Requests\Members\EditRequest;
use App\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function index()
    {
    	$members = \App\Member::orderBy('name')->get();

    	return view('librarian.members.index', [
    		'members' => $members
    	]);
    }

    public function create()
    {
    	return view('librarian.members.create');
    }

    public function store(CreateRequest $request)
    {
    	Member::register($request);

		flash()->success('Created', 'New library member created successfully');
		return redirect('members');    	
    }

    public function show(Member $member)
    {
        $borrows = $member->load(['borrows' => function($query){
            $query->orderBy('borrow_date', 'desc');
            $query->with('book.author');
        }]);

        return view('librarian.members.show', [
            'member' => $borrows
        ]);
    }

    public function edit(Member $member)
    {
    	return view('librarian.members.edit', [
            'member' => $member
        ]);
    }

    public function update(EditRequest $request, Member $member)
    {
        $member->updateDetails($request, $member);

        flash()->success('Updated', 'library member updated successfully');
        return redirect('members');  
    }

    public function toggleStatus(Member $member)
    {
        $status = $member->status ? 0 : 1;

        $member->update(['status' => $status]);

        flash()->success('Updated', 'library member status updated successfully');
        return redirect('members');  
    }

    public function all(Request $request)
    {
        return Member::select(
                'id as value', \DB::raw('CONCAT(code, " - ", name) AS label')
            )
            ->orderBy('name')
            ->get();
    }

    
}

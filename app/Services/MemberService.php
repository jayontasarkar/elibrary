<?php 

namespace App\Services;

use App\Member;

class MemberService
{
	public function all()
	{
		return Member::where('status', 1)->orderBy('name')->get();
	}
}
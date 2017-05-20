<?php 

namespace App\Services;

use App\Author;

class AuthorService
{
	public function all()
	{
		return Author::orderBy('name')->get();
	}
}
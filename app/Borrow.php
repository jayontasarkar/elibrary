<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
	protected $fillable = [
	    'book_id', 'member_id', 'penalty',
	    'borrow_date', 'return_date', 'copies'
	];

	protected $dates = [
		'borrow_date', 'return_date'
	];

	public function member()
	{
		return $this->belongsTo(Member::class);
	}

	public function book()
	{
		return $this->belongsTo(Book::class);
	}

	public function histories()
	{
		return $this->hasMany(History::class);
	}
}

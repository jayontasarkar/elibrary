<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
    	'borrow_id', 'member_id', 'penalty', 'payment', 'discount'
    ];

    public function member()
    {
    	return $this->hasMany(Member::class);
    }

    public function borrow()
    {
    	return $this->hasMany(Borrow::class);
    }
}

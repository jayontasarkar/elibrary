<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
    	'borrow_id', 'copies', 'type'
    ];

    public function borrow()
    {
    	return $this->belongsTo(Borrow::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
    	'name', 'biography', 'nationality'
    ];

    public function books()
    {
    	return $this->hasMany(Book::class);
    }
}

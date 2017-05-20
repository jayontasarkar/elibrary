<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
    	'isbn', 'title', 'author_id', 'category_id',
    	'location', 'total_copy', 'available_copy'
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function author()
    {
    	return $this->belongsTo(Author::class);
    }
}

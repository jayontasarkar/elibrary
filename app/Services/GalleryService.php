<?php 

namespace App\Services;

use App\Gallery;

class GalleryService
{
	public function all()
	{
		return Gallery::latest()->take(10)->get();
	}
}
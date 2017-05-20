<?php 

namespace App\Services;

use File;
use Illuminate\Http\UploadedFile;

class UploadService
{
	public function upload(UploadedFile $file, $folder = null)
	{
		$ext  = $file->getClientOriginalExtension();
		$path = public_path() . '/images/' . ($folder ? : 'avatar/');
	    $name = time() . uniqid() . '.' . $ext;
	    $file->move(
	        $path, $name
	    );
	    
	    return $name;
	}

	public function delete($file)
	{
		$path = public_path() . '/images/' . $file;
		if(file_exists($path)) {
			return File::delete($path);
		}
		return true;
	}
}
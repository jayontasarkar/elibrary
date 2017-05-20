<?php

// Global Helper Functions
/**
 * Flash Message
 * @param  [type] $title   [description]
 * @param  [type] $message [description]
 * @return [type]          [description]
 */
function flash($title = null, $message = null)
{
    $flash = app('App\Providers\FlashProvider');

    if(func_num_args() == 0) return $flash;
    
    return $flash->info($title, $message);
}

function isLoggedIn() {
	return auth()->check();
}

function user() {
	if(isLoggedIn()) {
		return auth()->user();
	}
	return false;
}

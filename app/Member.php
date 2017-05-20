<?php

namespace App;

use App\Services\UploadService;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
	/**
	 * fillable fields
	 * @var [type]
	 */
    protected $fillable = [
    	'code', 'name', 'address', 'phone', 'type', 'status', 'gender', 'avatar'
    ];

    public function avatar_url()
    {
        return $this->avatar ? asset('images/avatar/' . $this->avatar) : asset('images/avatar.png');
    }

    public static function register($attributes)
    {
        if($attributes->hasFile('avatar_image')){
            $name = (new UploadService)->upload($attributes->file('avatar_image'));
	        $attributes['avatar'] = $name;
	    }

    	$user = static::create($attributes->except('avatar_image'));

    	return $user;
    }

    public function updateDetails($attributes, $member)
    {
        if($attributes->hasFile('avatar_image')){
            $service = new UploadService;
            if($member->avatar){
                $service->delete('avatar/' . $member->avatar);
            }
            $name = $service->upload($attributes->file('avatar_image'));
            $attributes['avatar'] = $name;
        }

        return $member->update($attributes->except('avatar_image'));
    }

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}

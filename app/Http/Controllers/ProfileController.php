<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\EditRequest;
use App\Http\Requests\PasswordRequest;
use App\Services\UploadService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    /**
     * display profile page of authenticted user
     * @return [type] [description]
     */
    public function index(Request $request)
    {
    	return view('profile.index', [
    		'profile' => $request->user()
    	]);
    }

    public function edit(Request $request)
    {
    	return view('profile.edit', [
    		'profile' => $request->user()
    	]);
    }

    public function update(EditRequest $request)
    {
    	auth()->user()->update($request->all());

    	flash()->success('Updated', 'Your profile updated successfully');
    	return redirect('profile');
    }

    public function upload(Request $request, UploadService $service)
    {
    	$this->validate($request, [
    		'profile_avatar' => 'required|image|mimes:jpg,jpeg,png'
    	]);

    	$user = auth()->user();
    	if($request->hasFile('profile_avatar')){
            if($user->avatar){
                $service->delete('avatar/' . $user->avatar);
            }
            $name = $service->upload($request->file('profile_avatar'));
            $request['avatar'] = $name;
        }

        $user->update($request->all());

        flash()->success('Uploaded', 'Profile picture uploaded successfully');
        return redirect('profile');
    }

    public function resetPassword(PasswordRequest $request)
    {
        $request->user()->update(['password' => $request->input('new_password')]);

        flash()->success('Changed', 'Login password changed successfully');
        return redirect('profile');
    }
}

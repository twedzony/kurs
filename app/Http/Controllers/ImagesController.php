<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Intervention\Image\Facades\Image;

class ImagesController extends Controller
{
    public function user_avatar($id,$size)
    {
    	
    	$user = User::findOrFail($id);
    	$user->avatar;

    	$avatar_path = asset('storage/users/' . $user->id . '/avatars/' .  $user->avatar);
    	$img = Image::make($avatar_path)->fit($size)->response('jpg',90);

    	return $img;

    }
}

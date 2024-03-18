<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ProfileImageRequest;
use App\Http\Requests\User\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(){
        return view('user.profile');
    }
    public function updateImage(ProfileImageRequest $request){
        // selet the user
        $user = User::where('id',auth()->user()->id)->first();
        // make image name and move it to the path assets/img/users/
        $imageName=time().'.'.$request->image->extension();
        $request->image->move(public_path('assets/img/users'),$imageName);
        // save image to image_path
        $user->image_path=$imageName;
        $user->save();
        // return back with success
        return back()->withSuccess('image updated successfuly');
    }
    public function update(ProfileRequest $request){
        
        $user = User::find(auth()->user()->id);
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
        ];
        $user->update($data);
        return back()->withSuccess('profile information updated successfuly');
        

    }
}

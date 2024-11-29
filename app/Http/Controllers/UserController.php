<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Intervention\Image\Laravel\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;


class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->where('id','!=',1)->get();
        return view('admin.pages.user.index',compact('users'));
    }

    public function create()
    {
        return view('admin.pages.user.create');
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email ,
            'password' => bcrypt($request->email) 
        ]);

        if($request->file('image'))
        {

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $images = Image::read($image);
            // Resize image
            $images->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('images/user/' . $filename));
            $user->image = $filename;
            $user->save();
        }

        Alert::success('Success Title', 'Success Message');
        return to_route('admin.user.index');
    }

    public function edit(User $user)
    {
        return view('admin.pages.user.edit',compact('user'));
    }

    public function update(UpdateUserRequest $request,User $user)
    {
        $data = $request->except('password');
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if($request->hasFile('image'))
        {
            // delete image
            $image_path = public_path("images/user/".$user->image);
            if(File::exists($image_path)) {
            File::delete($image_path);
            }

            // save image
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $images = Image::read($image);
            // Resize image
            $images->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('images/user/' . $filename));
            $user->image = $filename;
            $user->save();
        }

        if(isset($request->password) && !empty($request->password))
        {
            $user->password = bcrypt($request->password);
            $user->save();
        }

        Alert::success('Success Title', 'Success Message');
        return to_route('admin.user.index');
    }

    public function destroy(User $user)
    {
        $image_path = public_path("images/user/".$user->image);
            if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $user->delete();
        Alert::success('Success Title', 'Success Message');
        return to_route('admin.user.index');
    }
}

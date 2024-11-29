<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveLive\StoreSaveLiveRequest;
use App\Http\Requests\SaveLive\UpdateSaveLiveRequest;
use App\Models\SaveLive;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;


class SaveLiveController extends Controller
{
    public function index()
    {
        $save_lives = SaveLive::latest()->get();
        return view('admin.pages.save_live.index',compact('save_lives'));
    }

    public function create()
    {
        return view('admin.pages.save_live.create');
    }

    public function store(StoreSaveLiveRequest $request)
    {
        $save_live = SaveLive::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        if($request->file('image'))
        {

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $images = Image::read($image);
            // Resize image
            $images->resize(240, 240, function ($constraint) {
                $constraint->aspectRatio();
            })->save('images/save_live/' . $filename);
            $save_live->image = $filename;
            $save_live->save();
        }

        Alert::success('Success Title', 'Success Message');

        return to_route('admin.save_live.index');
    }

    public function edit(SaveLive $save_live)
    {
        return view('admin.pages.save_live.edit',compact('save_live'));
    }

    public function update(SaveLive $save_live , UpdateSaveLiveRequest $request)
    {
        $save_live->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        if($request->hasFile('image'))
        {
            // delete image
            $image_path = "images/save_live/".$save_live->image;
            if(File::exists($image_path)) {
            File::delete($image_path);
            }

            // save image
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $images = Image::read($image);
            // Resize image
            $images->resize(240, 240, function ($constraint) {
                $constraint->aspectRatio();
            })->save('images/save_live/' . $filename);
            $save_live->image = $filename;
            $save_live->save();
        }

        Alert::success('Success Title', 'Success Message');
        return to_route('admin.save_live.index');
    }

    public function destroy(SaveLive $save_live)
    {
        $image_path = "images/save_live/".$save_live->image;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $save_live->delete();
        Alert::success('Success Title', 'Success Message');
        return back();
    }
}

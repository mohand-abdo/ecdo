<?php

namespace App\Http\Controllers;

use App\Http\Requests\Innovate\StoreInnovateRequest;
use App\Http\Requests\Innovate\UpdateInnovateRequest;
use App\Models\Innovate;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;
class InnovateController extends Controller
{
    public function index()
    {
        $innovates = Innovate::latest()->get();
        return view('admin.pages.innovate.index',compact('innovates'));
    }

    public function create()
    {
        return view('admin.pages.innovate.create');
    }

    public function store(StoreInnovateRequest $request)
    {
        $innovate = Innovate::create([
            'title' =>$request->title,
        ]);

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $images = Image::read($image);
            // Resize image
            $images->resize(828, 505, function ($constraint) {
                $constraint->aspectRatio();
            })->save('images/innovate/' .$filename);
            $innovate->image = $filename;
            $innovate->save();
        }

        Alert::success('Success Title', 'Success Message');

        return to_route('admin.innovate.index');
    }

    public function edit(Innovate $innovate)
    {
        return view('admin.pages.innovate.edit',compact('innovate'));
    }

    public function update(Innovate $innovate , UpdateInnovateRequest $request)
    {
        $innovate->update([
            'title' => $request->title,
        ]);

        if($request->hasFile('image'))
        {
            // delete image
            $image_path = "images/innovate/".$innovate->image;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            // save image
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $images = Image::read($image);
            // Resize image
            $images->resize(828, 505, function ($constraint) {
                $constraint->aspectRatio();
            })->save('images/innovate/' . $filename);
            $innovate->image = $filename;
            $innovate->save();
        }

        Alert::success('Success Title', 'Success Message');
        return to_route('admin.innovate.index');
    }

    public function destroy(Innovate $innovate)
    {
        $image_path = "images/innovate/".$innovate->image;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $innovate->delete();
        Alert::success('Success Title', 'Success Message');
        return back();
    }
}

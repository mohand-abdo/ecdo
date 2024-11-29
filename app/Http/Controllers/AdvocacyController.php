<?php

namespace App\Http\Controllers;

use App\Http\Requests\Advocacy\StoreAdvocacyRequest;
use App\Http\Requests\Advocacy\UpdateAdvocacyRequest;
use App\Models\Advocacy;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;
class AdvocacyController extends Controller
{
    public function index()
    {
        $advocacies = Advocacy::latest()->get();
        return view('admin.pages.advocacy.index',compact('advocacies'));
    }

    public function create()
    {
        return view('admin.pages.advocacy.create');
    }

    public function store(StoreAdvocacyRequest $request)
    {
        $advocacy = Advocacy::create([
            'title' =>$request->title,
        ]);

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $images = Image::read($image);
            // Resize image
            $images->resize(828, 540, function ($constraint) {
                $constraint->aspectRatio();
            })->save('images/advocacy/' .$filename);
            $advocacy->image = $filename;
            $advocacy->save();
        }

        Alert::success('Success Title', 'Success Message');

        return to_route('admin.advocacy.index');
    }

    public function edit(Advocacy $advocacy)
    {
        return view('admin.pages.advocacy.edit',compact('advocacy'));
    }

    public function update(Advocacy $advocacy , UpdateAdvocacyRequest $request)
    {
        $advocacy->update([
            'title' => $request->title,
        ]);

        if($request->hasFile('image'))
        {
            // delete image
            $image_path = "images/advocacy/".$advocacy->image;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            // save image
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $images = Image::read($image);
            // Resize image
            $images->resize(828, 540, function ($constraint) {
                $constraint->aspectRatio();
            })->save('images/advocacy/' . $filename);
            $advocacy->image = $filename;
            $advocacy->save();
        }

        Alert::success('Success Title', 'Success Message');
        return to_route('admin.advocacy.index');
    }

    public function destroy(Advocacy $advocacy)
    {
        $image_path = "images/advocacy/".$advocacy->image;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $advocacy->delete();
        Alert::success('Success Title', 'Success Message');
        return back();
    }
}

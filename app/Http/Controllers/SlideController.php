<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;
use App\Models\Slide;
use App\Http\Requests\Slide\StoreSlideRequest;
use App\Http\Requests\Slide\UpdateSlideRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class SlideController extends Controller
{
    public function index()
    {
        try {
            $slides = Slide::latest()->get();
            return view('admin.pages.slide.index',compact('slides'));
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function create()    {
        try {
            return view('admin.pages.slide.create');

        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function store(StoreSlideRequest $request)
    {
        try {
            $data = $request->except(['_token','image']);
            $slide = Slide::create([
                'title' => [
                    'en' => $request->title_en,
               ]
           ]);


            if($request->file('image'))
            {

                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $images = Image::read($image);
                // Resize image
                $images->resize(1920, 1200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('images/slide/' . $filename));
                $slide->image = $filename;
                $slide->save();
            }

            Alert::success('Success Title', 'Success Message');

            return to_route('admin.slide.index');
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function edit(Slide $slide)
    {
        try {
            return view('admin.pages.slide.edit',compact('slide'));
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function update(UpdateSlideRequest $request,$id)
    {
        try {
            $slide = Slide::findOrFail($id);
            $slide->update([
            'title' => [
                'en' => $request->title_en,
           ]
       ]) ;

        if($request->hasFile('image'))
        {
            // delete image
            $image_path = public_path("images/slide/".$slide->image);
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
            })->save(public_path('images/slide/' . $filename));
            $slide->image = $filename;
            $slide->save();
        }

        Alert::success('Success Title', 'Success Message');
        return to_route('admin.slide.index');
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back()->withInput();
        }
    }

    public function destroy(Slide $slide)
    {
        try {
            $image_path = public_path("images/slide/".$slide->image);
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $slide->delete();
            Alert::success('Success Title', 'Success Message');
            return back();
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }
}

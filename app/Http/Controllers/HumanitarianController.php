<?php

namespace App\Http\Controllers;

use App\Http\Requests\Humanitarian\StoreHumanitarianRequest;
use App\Http\Requests\Humanitarian\UpdateHumanitarianRequest;
use App\Models\Section;
use App\Models\Story;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;

class HumanitarianController extends Controller
{
    public function index()
    {
        try {
            $humanitarians = Story::whereHumanitarian(1)->latest()->get();
            return view('admin.pages.humanitarian.index',compact('humanitarians'));
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function create()
    {
        try {
            $sections = Section::get();
            return view('admin.pages.humanitarian.create',compact('sections'));

        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function store(StoreHumanitarianRequest $request)
    {
        try {
            $humanitarian = Story::create([
                'title' => $request->title,
                'section_id' => $request->section_id,
                'user_id' => Auth::id(),
                'body' => $request->body,
                'humanitarian' => 1
           ]) ;

            if($request->file('image'))
            {

                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $images = Image::read($image);
                // Resize image
                $images->resize(240, 240, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('images/story/' . $filename));
                $images->resize(1500, 937.5, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('images/story/big_image/'.$filename));
                $humanitarian->image = $filename;
                $humanitarian->save();
            }

            Alert::success('Success Title', 'Success Message');

            return to_route('admin.humanitarian.index');
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function edit(Story $humanitarian)
    {
        try {
            $sections = Section::get();
            return view('admin.pages.humanitarian.edit',compact('humanitarian','sections'));
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function update(UpdateHumanitarianRequest $request,Story $humanitarian)
    {
        try {
            $humanitarian->update([
            'title' => $request->title,
            'section_id' => $request->section_id,
            'user_id' => Auth::id(),
            'body' => $request->body,
            'humanitarian' => 1

            ]) ;

        if($request->hasFile('image'))
        {
             // delete image
            $image_path = public_path("images/story/".$humanitarian->image);
            $image_path2 = public_path("images/story/big_image/".$humanitarian->image);
            if(File::exists($image_path)) {
            File::delete($image_path);
            }
            if(File::exists($image_path2)) {
            File::delete($image_path2);
            }

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $images = Image::read($image);
            // Resize image
            $images->resize(240, 240, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('images/story/' . $filename));
            $images->resize(1500, 937.5, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('images/story/big_image/'.$filename));
            $humanitarian->image = $filename;
            $humanitarian->save();
        }


        Alert::success('Success Title', 'Success Message');
        return to_route('admin.humanitarian.index');
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back()->withInput();
        }
    }

    public function destroy(Story $humanitarian)
    {
        try {
                $image_path = public_path("images/story/".$humanitarian->image);
                $image_path2 = public_path("images/story/big_image/".$humanitarian->image);
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
                if(File::exists($image_path2)) {
                    File::delete($image_path2);
                }

                $humanitarian->delete();
                Alert::success('Success Title', 'Success Message');
                return back();
            } catch (Exception $e) {
                Alert::error('Error Title', 'Error Message');
                return back();
            }
    }
}

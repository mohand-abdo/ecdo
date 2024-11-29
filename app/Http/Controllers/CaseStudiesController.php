<?php

namespace App\Http\Controllers;

use App\Http\Requests\CaseStudies\StoreCaseStudiesRequest;
use App\Http\Requests\CaseStudies\UpdateCaseStudiesRequest;
use App\Models\Section;
use App\Models\Story;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class CaseStudiesController extends Controller
{
    public function index()
    {
        $stories = Story::whereCase_studies(1)->latest()->get();
        return view('admin.pages.case_studies.index',compact('stories'));
    }

    public function create()
    {
        $sections = Section::get();
        return view('admin.pages.case_studies.create',compact('sections'));
    }

    public function store(StoreCaseStudiesRequest $request)
    {
        $story = Story::create([
            'title' => $request->title,
            'section_id' => $request->section_id,
            'user_id' => Auth::id(),
            'body' => $request->body,
            'case_studies' => 1
        ]);

        if($request->hasFile('image'))
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
            $story->image = $filename;
            $story->save();
        }

        Alert::success('Success Title', 'Success Message');

        return to_route('admin.case_studies.index');
    }

    public function edit(Story $case_study)
    {
        $sections = Section::get();
        return view('admin.pages.case_studies.edit',compact('case_study','sections'));
    }

    public function update(Story $case_study , UpdateCaseStudiesRequest $request)
    {
        $case_study->update([
            'title'         => $request->title,
            'section_id' => $request->section_id,
            'user_id' => Auth::id(),
            'body'          => $request->body,
            'case_studies'  => 1
        ]);

        if($request->hasFile('image'))
        {
            // delete image
            $image_path = public_path("images/case_studies/".$case_study->image);
            $image_path2 = public_path("images/case_studies/".$case_study->image);
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            if(File::exists($image_path2)) {
                File::delete($image_path2);
            }

            // save image
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
            $case_study->image = $filename;
            $case_study->save();
        }

        Alert::success('Success Title', 'Success Message');
        return to_route('admin.case_studies.index');
    }

    public function destroy(Story $story)
    {
        $image_path = public_path("images/story/".$story->image);
        $image_path2 = public_path("images/story/".$story->image);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        if(File::exists($image_path2)) {
            File::delete($image_path2);
        }

        $story->delete();
        Alert::success('Success Title', 'Success Message');
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Story\StoreStoryRequest;
use App\Http\Requests\Story\UpdateStoryRequest;
use App\Models\Section;
use App\Models\Story;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::whereHumanitarian(0)->latest()->get();
        return view('admin.pages.story.index',compact('stories'));
    }

    public function create()
    {
        $sections = Section::get();
        return view('admin.pages.story.create',compact('sections'));
    }

    public function store(StoreStoryRequest $request)
    {
        $story = Story::create([
            'title' => $request->title,
            'section_id' => $request->section_id,
            'user_id' => Auth::id(),
            'body' => $request->body,
        ]);

        if($request->hasFile('image'))
        {

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $request->file('image')->move('images/story/',$filename);
            $story->image = $filename;
            $story->save();
        }

        Alert::success('Success Title', 'Success Message');

        return to_route('admin.story.index');
    }

    public function edit(Story $story)
    {
        $sections = Section::get();
        return view('admin.pages.story.edit',compact('story','sections'));
    }

    public function update(Story $story , UpdateStoryRequest $request)
    {
        $story->update([
            'title' => $request->title,
            'section_id' => $request->section_id,
            'user_id' => Auth::id(),
            'body' => $request->body,
        ]);

        if($request->hasFile('image'))
        {
            // delete image
            $image_path = "images/story/".$story->image;
            if(File::exists($image_path)) {
            File::delete($image_path);
            }

            // save image
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $request->file('image')->move('images/story/',$filename);
            $story->image = $filename;
            $story->save();
        }

        Alert::success('Success Title', 'Success Message');
        return to_route('admin.story.index');
    }

    public function destroy(Story $story)
    {
        $image_path = "images/story/".$story->image;

        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $story->delete();
        Alert::success('Success Title', 'Success Message');
        return back();
    }
}

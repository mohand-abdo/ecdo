<?php

namespace App\Http\Controllers;

use App\Http\Requests\Help\StoreHelpRequest;
use App\Http\Requests\Help\UpdateHelpRequest;
use App\Models\Help;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;

class HelpController extends Controller
{
    public function index()
    {
        $helps = Help::latest()->get();
        return view('admin.pages.help.index',compact('helps'));
    }

    public function create()
    {
        return view('admin.pages.help.create');
    }

    public function store(StoreHelpRequest $request)
    {
        $help = Help::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        if($request->hasFile('image'))
        {

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $images = Image::read($image);
            // Resize image
            $images->resize(375, 121, function ($constraint) {
                $constraint->aspectRatio();
            })->save('images/help/' . $filename);
            $help->image = $filename;
            $help->save();
        }

        Alert::success('Success Title', 'Success Message');

        return to_route('admin.help.index');
    }

    public function edit(Help $help)
    {
        return view('admin.pages.help.edit',compact('help'));
    }

    public function update(Help $help , UpdateHelpRequest $request)
    {
        $help->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        if($request->hasFile('image'))
        {
            // delete image
            $image_path = "images/help/".$help->image;
            if(File::exists($image_path)) {
            File::delete($image_path);
            }

            // save image
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $images = Image::read($image);
            // Resize image
            $images->resize(279, 210, function ($constraint) {
                $constraint->aspectRatio();
            })->save('images/help/' . $filename);
            $help->image = $filename;
            $help->save();
        }

        Alert::success('Success Title', 'Success Message');
        return to_route('admin.help.index');
    }

    public function destroy(Help $help)
    {
        $image_path = "images/help/".$help->image;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $help->delete();
        Alert::success('Success Title', 'Success Message');
        return back();
    }
}

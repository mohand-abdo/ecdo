<?php

namespace App\Http\Controllers;

use App\Http\Requests\Impact\StoreImpactRequest;
use App\Http\Requests\Impact\UpdateImpactRequest;
use App\Models\Impact;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;
class ImpactController extends Controller
{
    public function index()
    {
        $impacts = Impact::latest()->get();
        return view('admin.pages.impact.index',compact('impacts'));
    }

    public function create()
    {
        return view('admin.pages.impact.create');
    }

    public function store(StoreImpactRequest $request)
    {
        $impact = Impact::create([
            'title' =>$request->title,
        ]);

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $images = Image::read($image);
            // Resize image
            $images->resize(828, 493, function ($constraint) {
                $constraint->aspectRatio();
            })->save('images/impact/' .$filename);
            $impact->image = $filename;
            $impact->save();
        }

        Alert::success('Success Title', 'Success Message');

        return to_route('admin.impact.index');
    }

    public function edit(Impact $impact)
    {
        return view('admin.pages.impact.edit',compact('impact'));
    }

    public function update(Impact $impact , UpdateImpactRequest $request)
    {
        $impact->update([
            'title' => $request->title,
        ]);

        if($request->hasFile('image'))
        {
            // delete image
            $image_path = "images/impact/".$impact->image;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            // save image
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $images = Image::read($image);
            // Resize image
            $images->resize(828, 493, function ($constraint) {
                $constraint->aspectRatio();
            })->save('images/impact/' . $filename);
            $impact->image = $filename;
            $impact->save();
        }

        Alert::success('Success Title', 'Success Message');
        return to_route('admin.impact.index');
    }

    public function destroy(Impact $impact)
    {
        $image_path = "images/impact/".$impact->image;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $impact->delete();
        Alert::success('Success Title', 'Success Message');
        return back();
    }
}

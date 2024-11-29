<?php

namespace App\Http\Controllers;

use App\Http\Requests\FooterImage\StoreFooterImageRequest;
use App\Http\Requests\FooterImage\UpdateFooterImageRequest;
use App\Models\FooterImage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;
class FooterImageController extends Controller
{
    public function index()
    {
        $footer_images = FooterImage::latest()->get();
        return view('admin.pages.footer_image.index',compact('footer_images'));
    }

    public function create()
    {
        return view('admin.pages.footer_image.create');
    }

    public function store(StoreFooterImageRequest $request)
    {
        $footer_image = FooterImage::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        if($request->file('image'))
        {

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $images = Image::read($image);
            // Resize image
            $images->resize(1375, 892, function ($constraint) {
                $constraint->aspectRatio();
            })->save('images/footer_image/' . $filename);
            $footer_image->image = $filename;
            $footer_image->save();
        }

        Alert::success('Success Title', 'Success Message');

        return to_route('admin.footer_image.index');
    }

    public function edit(FooterImage $footer_image)
    {
        return view('admin.pages.footer_image.edit',compact('footer_image'));
    }

    public function update(FooterImage $footer_image , UpdateFooterImageRequest $request)
    {
        $footer_image->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        if($request->hasFile('image'))
        {
            // delete image
            $image_path = "images/footer_image/".$footer_image->image;
            if(File::exists($image_path)) {
            File::delete($image_path);
            }

            // save image
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $images = Image::read($image);
            // Resize image
            $images->resize(1375, 892, function ($constraint) {
                $constraint->aspectRatio();
            })->save('images/footer_image/' . $filename);
            $footer_image->image = $filename;
            $footer_image->save();
        }

        Alert::success('Success Title', 'Success Message');
        return to_route('admin.footer_image.index');
    }

    public function destroy(FooterImage $footer_image)
    {
        $image_path = "images/footer_image/".$footer_image->image;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $footer_image->delete();
        Alert::success('Success Title', 'Success Message');
        return back();
    }
}

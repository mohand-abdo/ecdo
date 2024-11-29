<?php

namespace App\Http\Controllers;

use App\Http\Requests\Partner\StorePartnerRequest;
use App\Http\Requests\Partner\UpdatePartnerRequest;
use App\Models\Partner;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::latest()->get();
        return view('admin.pages.partner.index',compact('partners'));
    }

    public function create()
    {
        return view('admin.pages.partner.create');
    }

    public function store(StorePartnerRequest $request)
    {
        $partner = Partner::create([
            'title' => $request->title
        ]);

        if($request->hasFile('image'))
        {

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $images = Image::read($image);
            // Resize image
            $images->resize(105, 65, function ($constraint) {
                $constraint->aspectRatio();
            })->save('images/partner/' . $filename);
            $partner->image = $filename;
            $partner->save();
        }

        Alert::success('Success Title', 'Success Message');

        return to_route('admin.partner.index');
    }

    public function edit(Partner $partner)
    {
        return view('admin.pages.partner.edit',compact('partner'));
    }

    public function update(Partner $partner , UpdatePartnerRequest $request)
    {
        $partner->update([
            'title' => $request->title
        ]);

        if($request->hasFile('image'))
        {
            // delete image
            $image_path = "images/partner/".$partner->image;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            // save image
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $images = Image::read($image);
            // Resize image
            $images->resize(105, 65, function ($constraint) {
                $constraint->aspectRatio();
            })->save('images/story/' . $filename);
            $partner->image = $filename;
            $partner->save();
        }

        Alert::success('Success Title', 'Success Message');
        return to_route('admin.partner.index');
    }

    public function destroy(Partner $partner)
    {
        $image_path = "images/partner/".$partner->image;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $partner->delete();
        Alert::success('Success Title', 'Success Message');
        return back();
    }
}

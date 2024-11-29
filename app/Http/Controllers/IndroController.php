<?php

namespace App\Http\Controllers;

use App\Http\Requests\Indro\StoreIndroRequest;
use App\Http\Requests\Indro\UpdateIndroRequest;
use App\Models\Indro;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;


class IndroController extends Controller
{
    public function index()
    {
        $indros = Indro::whereType(0)->latest()->get();
        return view('admin.pages.indro.index',compact('indros'));
    }

    public function create()
    {
        return view('admin.pages.indro.create');
    }

    public function store(StoreIndroRequest $request)
    {
        $indro = Indro::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        if($request->file('image'))
        {

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $images = Image::read($image);
            // Resize image
            $images->resize(1100, 733, function ($constraint) {
                $constraint->aspectRatio();
            })->save('images/indro/' . $filename);
            $indro->image = $filename;
            $indro->save();
        }

        Alert::success('Success Title', 'Success Message');

        return to_route('admin.indro.index');
    }

    public function edit(Indro $indro)
    {
        return view('admin.pages.indro.edit',compact('indro'));
    }

    public function update(Indro $indro , UpdateIndroRequest $request)
    {
        $indro->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        if($request->hasFile('image'))
        {
            // delete image
            $image_path = "images/indro/".$indro->image;
            if(File::exists($image_path)) {
            File::delete($image_path);
            }

            // save image
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $images = Image::read($image);
            // Resize image
            $images->resize(1100, 733, function ($constraint) {
                $constraint->aspectRatio();
            })->save('images/indro/' . $filename);
            $indro->image = $filename;
            $indro->save();
        }

        Alert::success('Success Title', 'Success Message');
        return to_route('admin.indro.index');
    }

    public function destroy(Indro $indro)
    {
        $image_path = "images/indro/".$indro->image;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $indro->delete();
        Alert::success('Success Title', 'Success Message');
        return back();
    }
}

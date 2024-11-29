<?php

namespace App\Http\Controllers;

use App\Http\Requests\Program\StoreProgramRequest;
use App\Http\Requests\Program\UpdateProgramRequest;
use App\Models\Program;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::latest()->get();
        return view('admin.pages.program.index',compact('programs'));
    }

    public function create()
    {
        return view('admin.pages.program.create');
    }

    public function store(StoreProgramRequest $request)
    {
        $program = Program::create([
            'title' =>$request->title,
            'body'  =>$request->body,
        ]);

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $images = Image::read($image);
            // Resize image
            $images->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save('images/program/' .$filename);
            $program->image = $filename;
            $program->save();
        }

        Alert::success('Success Title', 'Success Message');

        return to_route('admin.program.index');
    }

    public function edit(Program $program)
    {
        return view('admin.pages.program.edit',compact('program'));
    }

    public function update(Program $program , UpdateProgramRequest $request)
    {
        $program->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        if($request->hasFile('image'))
        {
            // delete image
            $image_path = "images/program/".$program->image;
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
            })->save('images/program/' . $filename);
            $program->image = $filename;
            $program->save();
        }

        Alert::success('Success Title', 'Success Message');
        return to_route('admin.program.index');
    }

    public function destroy(Program $program)
    {
        $image_path = "images/program/".$program->image;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $program->delete();
        Alert::success('Success Title', 'Success Message');
        return back();
    }
}

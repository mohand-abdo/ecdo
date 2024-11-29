<?php

namespace App\Http\Controllers;

use Intervention\Image\Laravel\Facades\Image;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.pages.project.index',compact('projects'));
    }

    public function create()
    {
        return view('admin.pages.project.create');
    }

    public function store(StoreProjectRequest $request)
    {
        $project = Project::create(['title' => $request->title]);
        if($request->hasFile('images'))
        {
            foreach($request->images as $file)
            {
                // $image = $file->file('image');
                $filename = time() . uniqid(). '.' . $file->getClientOriginalExtension();
                $images = Image::read($file);
                // Resize image
                $images->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('images/project/' . $filename));

                $project->images()->create(['image' => $filename]);
            }
        }

        Alert::success('Success Title', 'Success Message');
        return to_route('admin.project.index');
    }


    public function edit(Project $project)
    {
        return view('admin.pages.project.edit',compact('project'));
    }

    public function update(Project $project , UpdateProjectRequest $request)
    {
        $project->update(['title' => $request->title]);

        if($request->hasFile('images'))
        {
            foreach($project->images as $image)
            {
                if (File::exists(public_path("images/project/".$image->image))) {

                    File::delete(public_path("images/project/".$image->image));

                    $image->delete();
                }
            }


            foreach($request->images as $image)
            {
                // $image = $file->file('image');
                $filename = time(). uniqid() . '.' . $image->getClientOriginalExtension();
                $images = Image::read($image);
                // Resize image
                $images->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('images/project/' . $filename));

                $project->images()->create(['image' => $filename]);
            }
        }

        Alert::success('Success Title', 'Success Message');
        return to_route('admin.project.index');
    }


    public function destroy(Project $project)
    {
        foreach($project->images as $image)
        {
            if (File::exists(public_path("images/project/".$image->image))) {

                File::delete(public_path("images/project/".$image->image));

                $image->delete();
            }
        }

        $project->delete();

        Alert::success('Success Title', 'Success Message');
        return back();
    }
}

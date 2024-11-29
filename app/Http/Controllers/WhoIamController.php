<?php

namespace App\Http\Controllers;

use App\Http\Requests\WhoIam\StoreWhoIamRequest;
use App\Http\Requests\WhoIam\UpdateWhoIamRequest;
use App\Models\Indro;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class WhoIamController extends Controller
{
    public function index()
    {
        $indros = Indro::whereType(1)->latest()->get();
        return view('admin.pages.who_iam.index',compact('indros'));
    }

    public function create()
    {
        return view('admin.pages.who_iam.create');
    }

    public function store(StoreWhoIamRequest $request)
    {
        Indro::create([
            'title' => $request->title,
            'type' => 1,
        ]);

        Alert::success('Success Title', 'Success Message');

        return to_route('admin.who_iam.index');
    }

    public function edit(Indro $who_iam)
    {
        return view('admin.pages.who_iam.edit',compact('who_iam'));
    }

    public function update(Indro $who_iam , UpdateWhoIamRequest $request)
    {
        $who_iam->update([
            'title' => $request->title,
            'type' => 1,
        ]);

        Alert::success('Success Title', 'Success Message');
        return to_route('admin.who_iam.index');
    }

    public function destroy(Indro $who_iam)
    {
        $who_iam->delete();
        Alert::success('Success Title', 'Success Message');
        return back();
    }
}

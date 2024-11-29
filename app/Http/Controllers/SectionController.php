<?php

namespace App\Http\Controllers;

use App\Http\Requests\Help\StoreHelpRequest;
use App\Http\Requests\Help\UpdateHelpRequest;
use App\Http\Requests\Section\StoreSectionRequest;
use App\Http\Requests\Section\UpdateSectionRequest;
use App\Models\Section;
use RealRashid\SweetAlert\Facades\Alert;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::latest()->get();
        return view('admin.pages.section.index',compact('sections'));
    }

    public function create()
    {
        return view('admin.pages.section.create');
    }

    public function store(StoreSectionRequest $request)
    {
        $section = Section::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        Alert::success('Success Title', 'Success Message');

        return to_route('admin.section.index');
    }

    public function edit(Section $section)
    {
        return view('admin.pages.section.edit',compact('section'));
    }

    public function update(Section $section , UpdateSectionRequest $request)
    {
        $section->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        Alert::success('Success Title', 'Success Message');
        return to_route('admin.section.index');
    }

    public function destroy(Section $section)
    {
        $section->delete();
        Alert::success('Success Title', 'Success Message');
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\TargetedGroup\StoreTargetedGroupRequest;
use App\Http\Requests\TargetedGroup\UpdateTargetedGroupRequest;
use App\Models\Targeted;
use App\Models\TargetedGroup;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Targeted\StoreTargetedeRequest;
use App\Http\Requests\Targeted\UpdateTargetedeRequest;

class TargetedGroupController extends Controller
{
    public function index()
    {
        try {
            $targeted_groups = TargetedGroup::latest()->get();
            return view('admin.pages.targeted_group.index',compact('targeted_groups'));
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function create()
    {
        try {
            return view('admin.pages.targeted_group.create');

        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function store(StoreTargetedGroupRequest $request)
    {
        try {
            TargetedGroup::create([
                'title' =>  $request->title
           ]) ;

            Alert::success('Success Title', 'Success Message');

            return to_route('admin.targeted_group.index');
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function edit(TargetedGroup $targeted_group)
    {
        try {
            return view('admin.pages.targeted_group.edit',compact('targeted_group'));
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function update(UpdateTargetedGroupRequest $request,TargetedGroup $targeted_group)
    {
        try {
            $targeted_group->update([
            'title' => $request->title
       ]) ;

        Alert::success('Success Title', 'Success Message');
        return to_route('admin.targeted_group.index');
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back()->withInput();
        }
    }

    public function destroy(TargetedGroup $targeted_group)
    {
        try {

            $targeted_group->delete();
            Alert::success('Success Title', 'Success Message');
            return back();
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }
}

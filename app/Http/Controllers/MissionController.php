<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mission;
use App\Http\Requests\Mission\StoreMissionRequest;
use App\Http\Requests\Mission\UpdateMissionRequest;
use RealRashid\SweetAlert\Facades\Alert;

class MissionController extends Controller
{
    public function index()
    {
        try {
            $missions = Mission::latest()->get();
            return view('admin.pages.mission.index',compact('missions'));
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function create()
    {
        try {
            return view('admin.pages.mission.create');

        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function store(StoreMissionRequest $request)
    {
        try {
            $data = $request->except(['_token']);
            $mission = Mission::create([
                'title' =>  $request->title,
           ]) ;

            Alert::success('Success Title', 'Success Message');

            return to_route('admin.mission.index');
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back()->withInput();
        }
    }

    public function edit(Mission $mission)
    {
        try {
            return view('admin.pages.mission.edit',compact('mission'));
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function update(UpdateMissionRequest $request,mission $mission)
    {
        try {
            $mission = $mission->update([
            'title' =>  $request->title
       ]) ;

        Alert::success('Success Title', 'Success Message');
        return to_route('admin.mission.index');
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back()->withInput();
        }
    }

    public function destroy(Mission $mission)
    {
        try {

            $mission->delete();
            Alert::success('Success Title', 'Success Message');
            return back();
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }
}

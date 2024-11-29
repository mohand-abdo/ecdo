<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objective;
use App\Http\Requests\Objective\StoreObjectiveRequest;
use App\Http\Requests\Objective\UpdateObjectiveRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ObjectiveController extends Controller
{
    public function index()
    {
        try {
            $objectives = Objective::latest()->get();
            return view('admin.pages.objective.index',compact('objectives'));
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function create()
    {
        try {
            return view('admin.pages.objective.create');

        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function store(StoreObjectiveRequest $request)
    {
        try {
            $objective = Objective::create([
                'title' =>  $request->title
           ]) ;

            Alert::success('Success Title', 'Success Message');

            return to_route('admin.objective.index');
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function edit(Objective $objective)
    {
        try {
            return view('admin.pages.objective.edit',compact('objective'));
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function update(UpdateObjectiveRequest $request,Objective $objective)
    {
        try {
            $objective->update([
            'title' => $request->title
       ]) ;

        Alert::success('Success Title', 'Success Message');
        return to_route('admin.objective.index');
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back()->withInput();
        }
    }

    public function destroy(Objective $objective)
    {
        try {

                $objective->delete();
                Alert::success('Success Title', 'Success Message');
                return back();
            } catch (Exception $e) {
                Alert::error('Error Title', 'Error Message');
                return back();
            }
    }
}

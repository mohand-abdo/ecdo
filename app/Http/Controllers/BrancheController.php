<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branche;
use App\Http\Requests\Branche\StoreBrancheRequest;
use App\Http\Requests\Branche\UpdateBrancheRequest;
use RealRashid\SweetAlert\Facades\Alert;

class BrancheController extends Controller
{
    public function index()
    {
        try {
            $branches = Branche::latest()->get();
            return view('admin.pages.branche.index',compact('branches'));
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong . please  try again');
            return back();
        }
    }

    public function create()
    {
        try {
            return view('admin.pages.branche.create');

        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong . please  try again');
            return back();
        }
    }

    public function store(StoreBrancheRequest $request)
    {
        try {
            $data = $request->except(['_token','image']);
            Branche::create([
                'title' =>  $request->title
           ]) ;

            Alert::success('Success', 'Data  Created Successfully');

            return to_route('admin.branche.index');
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong . please  try again');
            return back();
        }
    }

    public function edit(Branche $branche)
    {
        try {
            return view('admin.pages.branche.edit',compact('branche'));
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong . please  try again');
            return back();
        }
    }

    public function update(UpdateBrancheRequest $request,Branche $branche)
    {
        try {
            $branche = $branche->update([
            'title' =>  $request->title
       ]) ;

            Alert::success('Success', 'Data  Updated Successfully');
        return to_route('admin.branche.index');
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong . please  try again');
            return back()->withInput();
        }
    }

    public function destroy(Branche $branche)
    {
        try {

                $branche->delete();
                Alert::success('Success', 'Data  Deleted Successfully');
                return back();
            } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong . please  try again');
                return back();
            }
    }
}

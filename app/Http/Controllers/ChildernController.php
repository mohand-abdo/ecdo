<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Childern;
use App\Http\Requests\Childern\StoreChildernRequest;
use App\Http\Requests\Childern\UpdateChildernRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ChildernController extends Controller
{
    public function index()
    {
        try {
            $save_childerns = Childern::latest()->get();
            return view('admin.pages.childern.index',compact('save_childerns'));
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong . please  try again');
            return back();
        }
    }

    public function create()
    {
        try {
            return view('admin.pages.childern.create');

        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong . please  try again');
            return back();
        }
    }

    public function store(StoreChildernRequest $request)
    {
        try {
            $data = $request->except(['_token','image']);
            $save_childern = Childern::create([
                'title' => [
                    'en' => $request->title_en,
               ]
           ]) ;

            Alert::success('Success', 'Data  Created Successfully');

            return to_route('admin.save_childern.index');    
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong . please  try again');
            return back();
        }  
    }

    public function edit($id)
    {
        try {
                $save_childern =  Childern::findOrFail($id);
                return view('admin.pages.childern.edit',compact('save_childern'));
            } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong . please  try again');
                return back();
            }
    }

    public function update(UpdateChildernRequest $request,$id)
    {
        try {
            $save_childern = Childern::findOrFail($id);
            $save_childern->update([
            'title' => [
                'en' => $request->title_en,
           ]
       ]) ;

            Alert::success('Success', 'Data  Updated Successfully');
        return to_route('admin.save_childern.index');
        } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong . please  try again');
            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
                $save_childern =  Childern::findOrFail($id);
                $save_childern->delete();
            Alert::success('Success', 'Data  Deleted Successfully');
                return back();
            } catch (Exception $e) {
            Alert::error('Error', 'Something went wrong . please  try again');
                return back();
            }
    }
}

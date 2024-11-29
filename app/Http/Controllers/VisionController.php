<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vision;
use App\Http\Requests\Vision\StoreVisionRequest;
use App\Http\Requests\Vision\UpdateVisionRequest;
use RealRashid\SweetAlert\Facades\Alert;

class VisionController extends Controller
{
    public function index()
    {
        try {
            $visions = Vision::latest()->get();
            return view('admin.pages.vision.index',compact('visions'));
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function create()
    {
        try {
            return view('admin.pages.vision.create');

        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function store(StoreVisionRequest $request)
    {
        try {
            $data = $request->except(['_token','image']);
            $vision = Vision::create([
                'title' => $request->title
           ]) ;

            Alert::success('Success Vision', 'Success Message');

            return to_route('admin.vision.index');
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function edit(Vision $vision)
    {
        try {
            return view('admin.pages.vision.edit',compact('vision'));
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function update(UpdateVisionRequest $request,Vision $vision)
    {
        try {
            $vision = $vision->update([
            'title' =>  $request->title
       ]) ;

        Alert::success('Success Title', 'Success Message');
        return to_route('admin.vision.index');
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back()->withInput();
        }
    }

    public function destroy(Vision $vision)
    {
        try {
                $vision->delete();
                Alert::success('Success Title', 'Success Message');
                return back();
            } catch (Exception $e) {
                Alert::error('Error Title', 'Error Message');
                return back();
            }
    }
}

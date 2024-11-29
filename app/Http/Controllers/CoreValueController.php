<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoreValue\StoreCoreValueRequest;
use App\Http\Requests\CoreValue\UpdateCoreValueRequest;
use App\Models\CoreValue;
use RealRashid\SweetAlert\Facades\Alert;

class CoreValueController extends Controller
{
    public function index()
    {
        try {
            $core_values = CoreValue::latest()->get();
            return view('admin.pages.core_value.index',compact('core_values'));
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function create()
    {
        try {
            return view('admin.pages.core_value.create');

        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function store(StoreCoreValueRequest $request)
    {
        try {
            $data = $request->except(['_token']);
             CoreValue::create([
                'title' =>  $request->title,
                'icon' =>  $request->icon,
            ]) ;

            Alert::success('Success Title', 'Success Message');

            return to_route('admin.core_value.index');
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back()->withInput();
        }
    }

    public function edit(CoreValue $core_value)
    {
        try {
            return view('admin.pages.core_value.edit',compact('core_value'));
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function update(UpdateCoreValueRequest $request,CoreValue $core_value)
    {
        try {
            $core_value->update([
                'title' =>  $request->title,
                'icon' =>  $request->icon
            ]) ;

            Alert::success('Success Title', 'Success Message');
            return to_route('admin.core_value.index');
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back()->withInput();
        }
    }

    public function destroy(CoreValue $core_value)
    {
        try {

            $core_value->delete();
            Alert::success('Success Title', 'Success Message');
            return back();
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }
}

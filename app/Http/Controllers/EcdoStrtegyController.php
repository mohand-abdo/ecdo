<?php

namespace App\Http\Controllers;

use App\Http\Requests\EcdoStrtegy\StoreEcdoStrtegyRequest;
use App\Http\Requests\EcdoStrtegy\UpdateEcdoStrtegyRequest;
use App\Models\EcdoStrtegy;
use RealRashid\SweetAlert\Facades\Alert;

class EcdoStrtegyController extends Controller
{
    public function index()
    {
        try {
            $ecdo_strtegies = EcdoStrtegy::latest()->get();
            return view('admin.pages.ecdo_strtegy.index',compact('ecdo_strtegies'));
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function create()
    {
        try {
            return view('admin.pages.ecdo_strtegy.create');

        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function store(StoreEcdoStrtegyRequest $request)
    {
        try {
            $data = $request->except(['_token']);
            EcdoStrtegy::create([
                'title' =>  $request->title,
            ]) ;

            Alert::success('Success Title', 'Success Message');

            return to_route('admin.ecdo_strtegy.index');
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back()->withInput();
        }
    }

    public function edit(EcdoStrtegy $ecdo_strtegy)
    {
        try {
            return view('admin.pages.ecdo_strtegy.edit',compact('ecdo_strtegy'));
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function update(UpdateEcdoStrtegyRequest $request,EcdoStrtegy $ecdo_strtegy)
    {
        try {
            $ecdo_strtegy->update([
                'title' =>  $request->title
            ]) ;

            Alert::success('Success Title', 'Success Message');
            return to_route('admin.ecdo_strtegy.index');
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back()->withInput();
        }
    }

    public function destroy(EcdoStrtegy $ecdo_strtegy)
    {
        try {

            $ecdo_strtegy->delete();
            Alert::success('Success Title', 'Success Message');
            return back();
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }
}

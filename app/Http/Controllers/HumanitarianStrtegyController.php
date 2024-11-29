<?php

namespace App\Http\Controllers;

use App\Http\Requests\HumanitarianStrtegy\StoreHumanitarianStrtegyRequest;
use App\Http\Requests\HumanitarianStrtegy\UpdateHumanitarianStrtegyRequest;
use App\Models\HumanitarianStrtegy;
use RealRashid\SweetAlert\Facades\Alert;

class HumanitarianStrtegyController extends Controller
{
    public function index()
    {
        try {
            $humanitarian_strtegies = HumanitarianStrtegy::latest()->get();
            return view('admin.pages.humanitarian_strtegy.index',compact('humanitarian_strtegies'));
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function create()
    {
        try {
            return view('admin.pages.humanitarian_strtegy.create');

        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function store(StoreHumanitarianStrtegyRequest $request)
    {
        try {
            $data = $request->except(['_token']);
            $mission = HumanitarianStrtegy::create([
                'title' =>  $request->title,
                'icon'  =>  $request->icon
            ]) ;

            Alert::success('Success Title', 'Success Message');

            return to_route('admin.humanitarian_strtegy.index');
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back()->withInput();
        }
    }

    public function edit(HumanitarianStrtegy $humanitarian_strtegy)
    {
        try {
            return view('admin.pages.humanitarian_strtegy.edit',compact('humanitarian_strtegy'));
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function update(UpdateHumanitarianStrtegyRequest $request,HumanitarianStrtegy $humanitarian_strtegy)
    {
        try {
            $humanitarian_strtegy->update([
                'title' =>  $request->title,
                'icon'  => $request->icon
            ]) ;

            Alert::success('Success Title', 'Success Message');
            return to_route('admin.humanitarian_strtegy.index');
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back()->withInput();
        }
    }

    public function destroy(HumanitarianStrtegy $humanitarian_strtegy)
    {
        try {

            $humanitarian_strtegy->delete();
            Alert::success('Success Title', 'Success Message');
            return back();
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }
}

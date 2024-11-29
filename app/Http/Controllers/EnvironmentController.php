<?php

namespace App\Http\Controllers;

use App\Http\Requests\Environment\StoreEnvironmentRequest;
use App\Http\Requests\Environment\UpdateEnvironmentRequest;
use App\Models\Environment;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Environment\StoreEnvironmenteRequest;
use App\Http\Requests\Environment\UpdateEnvironmenteRequest;

class EnvironmentController extends Controller
{
    public function index()
    {
        try {
            $environments = Environment::latest()->get();
            return view('admin.pages.environment.index',compact('environments'));
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function create()
    {
        try {
            return view('admin.pages.environment.create');

        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function store(StoreEnvironmentRequest $request)
    {
        try {
            Environment::create([
                'title' =>  $request->title
           ]) ;

            Alert::success('Success Title', 'Success Message');

            return to_route('admin.environment.index');
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function edit(Environment $environment)
    {
        try {
            return view('admin.pages.environment.edit',compact('environment'));
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function update(UpdateEnvironmentRequest $request,Environment $environment)
    {
        try {
            $environment = $environment->update([
            'title' => $request->title
       ]) ;

        Alert::success('Success Title', 'Success Message');
        return to_route('admin.environment.index');
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back()->withInput();
        }
    }

    public function destroy(Environment $environment)
    {
        try {
                $environment->delete();
                Alert::success('Success Title', 'Success Message');
                return back();
            } catch (Exception $e) {
                Alert::error('Error Title', 'Error Message');
                return back();
            }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motto;
use App\Http\Requests\Motto\StoreMottoRequest;
use App\Http\Requests\Motto\UpdateMottoRequest;
use RealRashid\SweetAlert\Facades\Alert;

class MottoController extends Controller
{
    public function index()
    {
        try {
            $mottos = Motto::latest()->get();
            return view('admin.pages.motto.index',compact('mottos'));
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function create()
    {
        try {
            return view('admin.pages.motto.create');

        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function store(StoreMottoRequest $request)
    {
        try {
            $data = $request->except(['_token']);
            $motto = Motto::create([
                'title' =>  $request->title
           ]) ;

            Alert::success('Success Title', 'Success Message');

            return to_route('admin.motto.index');
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function edit($id)
    {
        try {
                $motto =  Motto::findOrFail($id);
                return view('admin.pages.motto.edit',compact('motto'));
            } catch (Exception $e) {
                Alert::error('Error Title', 'Error Message');
                return back();
            }
    }

    public function update(UpdateMottoRequest $request,$id)
    {
        try {
            $motto = Motto::findOrFail($id);
            $motto = $motto->update([
            'title' => $request->title
       ]) ;

        Alert::success('Success Title', 'Success Message');
        return to_route('admin.motto.index');
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
                $motto =  Motto::findOrFail($id);
                $motto->delete();
                Alert::success('Success Title', 'Success Message');
                return back();
            } catch (Exception $e) {
                Alert::error('Error Title', 'Error Message');
                return back();
            }
    }
}

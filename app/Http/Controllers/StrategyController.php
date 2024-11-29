<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Strategy;
use App\Http\Requests\Strategy\StoreStrategyRequest;
use App\Http\Requests\Strategy\UpdateStrategyRequest;
use RealRashid\SweetAlert\Facades\Alert;

class trategyController extends Controller
{
    public function index()
    {
        try {
            $strategys = Strategy::latest()->get();
            return view('admin.pages.strategy.index',compact('strategys'));
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function create()
    {
        try {
            return view('admin.pages.strategy.create');

        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function store(StoreStrategyRequest $request)
    {
        try {
            $data = $request->except(['_token','image']);
            $strategy = Strategy::create([
                'title' => [
                    'en' => $request->title_en,
               ]
           ]) ;

            Alert::success('Success Title', 'Success Message');

            return to_route('admin.strategy.index');
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function edit(Strategy $strategy)
    {
        try {
            return view('admin.pages.strategy.edit',compact('strategy'));
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function update(UpdateStrategyRequest $request,Strategy $strategy)
    {
        try {
            $strategy = $strategy->update([
            'title' => [
                'en' => $request->title_en,
           ]
       ]) ;

        Alert::success('Success Title', 'Success Message');
        return to_route('admin.strategy.index');
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back()->withInput();
        }
    }

    public function destroy(Strategy $strategy)
    {
        try {

                $strategy->delete();
                Alert::success('Success Title', 'Success Message');
                return back();
            } catch (Exception $e) {
                Alert::error('Error Title', 'Error Message');
                return back();
            }
    }
}

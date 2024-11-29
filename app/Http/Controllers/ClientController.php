<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Requests\Client\StoreClientRequest;
use App\Http\Requests\Client\UpdateClientRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;


class ClientController extends Controller
{
    public function index()
    {
        try {
            $clients = Client::latest()->get();
            return view('admin.pages.client.index',compact('clients'));
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function create()
    {
        try {
            return view('admin.pages.client.create');

        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function store(StoreClientRequest $request)
    {
        try {
            $data = $request->except(['_token','image']);
            $client = Client::create([
                'title' => [
                    'en' => $request->title_en,
               ]
           ]) ;

            if($request->file('image'))
            {

                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $images = Image::read($image);
                // Resize image
                $images->resize(185, 43, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('images/client/' . $filename));
                $client->image = $filename;
                $client->save();
            }

            Alert::success('Success Title', 'Success Message');

            return to_route('admin.client.index');    
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }  
    }

    public function edit(Client $client)
    {
        try {
            return view('admin.pages.client.edit',compact('client'));
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back();
        }
    }

    public function update(UpdateClientRequest $request,Client $client)
    {
        try {
            $client->update([
            'title' => [
                'en' => $request->title_en,
           ]
       ]) ;

        if($request->hasFile('image'))
        {
            // delete image
            $image_path = public_path("images/client/".$client->image);
            if(File::exists($image_path)) {
            File::delete($image_path);
            }

            // save image
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $images = Image::read($image);
            // Resize image
            $images->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('images/client/' . $filename));
            $client->image = $filename;
            $client->save();
        }

        Alert::success('Success Title', 'Success Message');
        return to_route('admin.client.index');
        } catch (Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return back()->withInput();
        }
    }

    public function destroy(Client $client)
    {
        try {

            $image_path = public_path("images/client/".$client->image);
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            
                $client->delete();
                Alert::success('Success Title', 'Success Message');
                return back();
            } catch (Exception $e) {
                Alert::error('Error Title', 'Error Message');
                return back();
            }
    }
}

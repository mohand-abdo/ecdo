<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\Contact\StoreContactRequest;
use RealRashid\SweetAlert\Facades\Alert;


class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.pages.contact.index',compact('contacts'));
    }

    public function store(StoreContactRequest $request)
    {
        Contact::create([ 'name' => $request->name,'email' => $request->email,'subject' => $request->subject,'mobile' => $request->mobile,'message' => $request->message

        ]);
        return response()->json([
            'success' => true,
            'message' => 'Data saved successfully', // رسالة النجاح
        ]);
    }


    public function show(Contact $contact)
    {
        $contact->update(['is_read' => 1]);
        return view('admin.pages.contact.show',compact('contact'));
    }
}

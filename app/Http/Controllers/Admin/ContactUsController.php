<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;
use Config;

class ContactUsController extends Controller
{
    public  function  list()
    {
        $contacts = Contact::orderBy('updated_at', 'DESC')->get();
        return view('admin.contactus.list', compact('contacts'));
    }

    public  function  view($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contactus.view', compact('contact'));
    }

    public  function  remove($id)
    {
        $contact = Contact::where('id', $id)->first();
        $contact->delete();
        return response()->json([
            'status' => 200,
            'success'=>'Data has been remove successfully!'
        ]);
    }

}

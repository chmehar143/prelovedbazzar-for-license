<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Contact;
use App\Models\User;
use Validator;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('user.contact-us');
    }
     
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $data = new Contact();
        if(Auth::guard('user')->check()){
            $data->user_id = Auth::guard('user')->id();
        }
        $input = $request->all();
        $data->fill($input)->save();
        return response()->json([
            "status" => 200,
            "data" => $data
        ]);
    }
}

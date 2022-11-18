<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Session, Redirect};
use App\Models\{
    Category, Vendor, RecentView, Childcategory, 
    Subcategory, Subscriber, Discussion, User, Banner, OrderDetail, FrontPage
}; 
use Carbon\Carbon;
use Validator;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{

    public function index()
    {
           // dd($recents);
        return view('user.welcome');
    }

    public function subscribe(Request $request)
    {
        //--- Validation Section
        $rules = [
            'email' => 'required|email|unique:subscribers'
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json($validator->messages(), Response::HTTP_BAD_REQUEST);
        }

        //in view code is here...


        // Try like this

        // error: function (xhr) {
        // $('#validation-errors').html('');
        // $.each(xhr.responseJSON.errors, function(key,value) {
        //     $('#validation-errors').append('<div class="alert alert-danger">'+value+'</div');
        // }); 
        // },

        //end validation

        $Subscribe = Subscriber::where('email', $request->input('email'))->first();
        if(!$Subscribe){
            $Subscribe = new Subscriber();
            if(Auth::guard('user')->check()){
                $Subscribe->user_id = Auth::guard('user')->id();
            }
            $Subscribe->email = $request->input('email');
            $Subscribe->save();    

        }
        return response()->json([
            "status" => 200,
            "data" => $Subscribe
        ]);

    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscribeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }


    public function index()
    {
        $subscribers = Subscriber::all();
        return view('admin.subscribe.list', compact('subscribers'));
    }

    public function remove($id)
    {
        $subscribe = Subscriber::where('id', $id)->first();
        $subscribe->delete();
        return response()->json([
            'success' => 'Record has been deleted'
        ]);
    }
}

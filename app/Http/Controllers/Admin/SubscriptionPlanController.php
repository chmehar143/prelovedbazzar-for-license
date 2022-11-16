<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, File, DB, Redirect};
use App\Models\{Category, SubCategory, ChildCategory, AffiliateProduct, SubscriptionPlan};
use Validator;
use Config;

class SubscriptionPlanController extends Controller
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

    public  function  index()
    {
        $plans = SubscriptionPlan::all();
        return view('admin.subscriptionplan.list', compact('plans'));
    }

    public  function  create()
    {
        return view('admin.subscriptionplan.create');
    }

    public  function  store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'title' => 'required|unique:subscription_plans',
            'symbol' => 'required',
            'code' => 'required|unique:subscription_plans',
            'cost' => 'required',
            'days' => 'required|integer',
            'limit' => 'required',
            'allowed_quantity' => 'required|integer',
            'allowed_type' => 'required|integer',
            'detail' => 'required',
        ];
        $customs = [
            'title.unique' => 'This title has already been taken.',
            'code.unique' => 'This code has already been taken.'
        ];
        $validator = Validator::make($request->all(), $rules, $customs);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $inputs = $request->all();
        if($request->limit==0){
            $inputs['allowed_quantity'] = 0;
        }
        $inputs['staf_id'] = Auth::guard('admin')->id();
        $plan = SubscriptionPlan::where('title', $request->input('title'))->first();
        if(!$plan){
            SubscriptionPlan::create($inputs);
        }
        return redirect()->route('admin.subscriptionplan_list')->with('message', 'Plan created successfully');
    }

    public  function  remove($id)
    {
        $plan = SubscriptionPlan::where('id', $id)->first();
        $plan->delete();
        return response()->json(['success' => 'Record Has Been Deleted!..']);

    }

    public  function  edit($id)
    {
        $plan = SubscriptionPlan::where('id', $id)->first();
        return view('admin.subscriptionplan.edit', compact('plan'));
    }

    public function update(Request $request, $id)
    {
        //--- Validation Section
        $rules = [
            'title' => 'required',
            'symbol' => 'required',
            'code' => 'required',
            'cost' => 'required',
            'days' => 'required|integer',
            'limit' => 'required',
            'allowed_quantity' => 'required|integer',
            'allowed_type' => 'required|integer',
            'detail' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $inputs = $request->all();
        if($request->limit==0){
            $inputs['allowed_quantity'] = 0;
        }
        $inputs['staf_id'] = Auth::guard('admin')->id();

        $plan = SubscriptionPlan::where('id', $id)->first();
        if($plan){
            $plan->update($inputs);
        }
        return redirect()->route('admin.subscriptionplan_list')->with('message', 'Plan updated successfully');
    }

    public  function  view($id)
    {
        $plan = SubscriptionPlan::where('id', $id)->first();
        return view('admin.subscriptionplan.view', compact('plan'));
    }
}

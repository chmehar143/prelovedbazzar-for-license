<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use App\Models\AffiliateProduct;
use App\Models\SubscriptionPlan;
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
        $plan = SubscriptionPlan::where('title', $request->input('title'))->first();
        if(!$plan){
            $plan = new SubscriptionPlan();
            $plan->staf_id = Auth::guard('admin')->id();
            $plan->title = $request->input('title');
            $plan->symbol = $request->input('symbol');
            $plan->code = $request->input('code');
            $plan->cost = $request->input('cost');
            $plan->days = $request->input('days');
            $plan->limit = $request->input('limit');
            $plan->detail = $request->input('detail');
            $plan->save();
        }
        return redirect()->route('admin.subscriptionplan_list');
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
        $plan = SubscriptionPlan::where('id', $id)->first();
        if($plan){
            $plan->staf_id = Auth::guard('admin')->id();
            $plan->title = $request->input('title');
            $plan->symbol = $request->input('symbol');
            $plan->code = $request->input('code');
            $plan->cost = $request->input('cost');
            $plan->days = $request->input('days');
            $plan->limit = $request->input('limit');
            $plan->detail = $request->input('detail');
            $plan->update();
        }
        return redirect()->route('admin.subscriptionplan_list');
    }

    public  function  view($id)
    {
        $plan = SubscriptionPlan::where('id', $id)->first();
        return view('admin.subscriptionplan.view', compact('plan'));
    }
}

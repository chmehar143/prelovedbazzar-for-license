<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, File, DB, Redirect};
use App\Models\{Category, SubCategory, ChildCategory, AffiliateProduct, SubscriptionPlan, PlanOrder, OrderDetail};
use Validator;
use Stripe;
use Config;
use Carbon\Carbon;

class SubscriptionPlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('vendor.auth:vendor');
        $orders = OrderDetail::where('vendor_id', Auth::guard('vendor')->id())->where('sub_status', 5)->get();
        $amount = $orders->sum('subtotal') + $orders->sum('sub_shipping');

        $vendordata = array(
            'orders' => $orders,
            'amount' => $amount
        );

        view()->share('vendordata', $vendordata);

    }


    public function index() 
    {
        $vendor = Auth::guard('vendor')->user();
        $plans = SubscriptionPlan::all();
        $myplans = PlanOrder::where('vendor_id', $vendor->id)->get();
        $status = Config::get('constants.plan_status');
        return view('vendor.subscriptionplan.list', compact('plans', 'myplans', 'status'));
    }

    public function create($id) 
    {

        $plan = SubscriptionPlan::where('id', $id)->where('status', 0)->first();
        return view('vendor.subscriptionplan.create', compact('plan'));
    }

    public function get_plan(Request $request, $id)
    {
        $plan = SubscriptionPlan::where('id', $id)->where('status', 0)->first();
        if($plan)
        {
            $vendor = Auth::guard('vendor')->user();
            $porder = PlanOrder::where('vendor_id', $vendor->id)->where('subscription_id', $plan->id)->where('remaining_quantity', 0)->first();
            if(!$porder)
            {
                // sub order payment charge...
                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                $customer = Stripe\Customer::create(array(
                    "name" => $vendor->name,       
                    "email" => $vendor->email,    
                    "source" => $request->stripeToken    
                ));
                
                $charge = Stripe\Charge::create ([
                    "amount" => 100 * $plan->cost,
                    "currency" => "usd",
                    "customer" => $customer->id,
                    "description" => "vendor with vendor-id ".$vendor->id." has purchased a subscription plan with id (".$plan->id."), name (".$plan->title.") from ".env('APP_NAME'). " store.",
                ]);
                //end payment charge...
                if($charge->status == "succeeded")
                {
                $today = Carbon::now();
                $expiry = $today->addDays($plan->days)->format('Y-m-d');
                
                $my_plan = PlanOrder::create([
                        'vendor_id' => $vendor->id, 
                        'subscription_id'=>$plan->id,
                        'strip_customer_id'=>$customer->id, 
                        'strip_charge_id'=>$charge->id, 
                        'paid_amount'=>$charge->amount, 
                        'payment_status' =>$charge->status, 
                        'receipt_url'=>$charge->receipt_url, 
                        'paid_amount'=>$charge->amount/100, 
                        'remainig_days'=>$plan->days,
                        'expired_at'=>$expiry,
                        'allowed_quantity'=>$plan->allowed_quantity, 
                        'remaining_quantity'=>$plan->allowed_quantity, 
                        'status'=>0
                    ]);
                    return redirect('/vendor/subscriptionplan_view/'.$my_plan->id )->with('message', 'Subscription plan purchased successfully');
                }
                else
                {
                    //payment failed
                    return redirect()->back()->with('message', 'payment failed');

                }
            }
            else
            {
                return redirect()->back()->with('message', 'already purchased, you plan id is #'.$porder->id);
            }

        }
        else
        {
            return redirect()->back()->with('message', "Subscription plan does't exist");
        }

    }

    public function view($id) 
    {
        $myplan = PlanOrder::where('id', $id)->where('vendor_id', Auth::guard('vendor')->id())->first();
        if($myplan)
        {
            $stripe = new \Stripe\StripeClient(
                env('STRIPE_SECRET')
              );
            $plan_charge = $stripe->charges->retrieve(
                $myplan->strip_charge_id,
                []
              );
              $plan_customer = $stripe->customers->retrieve(
                $myplan->strip_customer_id,
                []
              );
            $status = Config::get('constants.plan_status');
              //dd($plan_charge);
            return view('vendor.subscriptionplan.view', compact('myplan', 'plan_charge', 'plan_customer', 'status'));
        }
        else
        {
            return redirect()->route('vendor.subscriptionplan_list')->with('message', 'please purchase a sbscription plan first');
        }
    }
}

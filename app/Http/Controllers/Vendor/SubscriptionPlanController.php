<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, File, DB, Redirect};
use App\Models\{Category, SubCategory, ChildCategory, AffiliateProduct, SubscriptionPlan, PlanOrder};
use Validator;
use Stripe;
use Config;

class SubscriptionPlanController extends Controller
{
    public function index() 
    {
        $plans = SubscriptionPlan::all();
        return view('vendor.subscriptionplan.list', compact('plans'));
    }

    public function create($id) 
    {

        $plan = SubscriptionPlan::where('id', $id)->where('status', 0)->first();
        return view('vendor.subscriptionplan.create', compact('plan'));
    }

    public function get_plan(Request $request, $id)
    {
        $plan = SubscriptionPlan::where('id', $id)->where('status', 0)->first();
        $vendor = Auth::guard('vendor')->user();
        $porder = PlanOrder::where('vendor_id', $vendor->id)->where('subscription_id', $plan->id)->where('remaining_quantity', 0)->first();
        if(!$porder)
        {
            // sub order payment charge...
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $customer = Stripe\Customer::create(array(
                "customer" => $vendor->id,
                "name" => $vendor->name,       
                "email" => $vendor->email,    
                "source" => $request->stripeToken    
            ));
            
            $charge = Stripe\Charge::create ([
                "amount" => 100 * $plan->cost,
                "currency" => "usd",
                "customer" => $customer->id,
                "description" => "Payment for puchasing a subscription plan with id (".$plan->id."), name (".$plan->title.") from ".env('APP_NAME'). " store.",
            ]);
            //end payment charge...
            if($charge->status == "succeeded")
            {
                PlanOrder::create([
                    'vendor_id' => $vendor->id, 
                    'subscription_id'=>$plan->id,
                    'strip_customer_id'=>$charge->id, 
                    'paid_amount'=>$charge->amount, 
                    'payment_status' =>$charge->status, 
                    'receipt_url'=>$charge->receipt_url, 
                    'paid_amount'=>$charge->amount/100, 
                    'remainig_days'=>$plan->days,
                    'allowed_quantity'=>$plan->allowed_quantity, 
                    'remaining_quantity'=>$plan->allowed_quantity, 
                    'status'=>0
                ]);
                return redirect()->back();
            }
            else
            {
                //payment failed
            }
        }
        else
        {
            //already purchased
        }



    }

    public function view() {
        return view('vendor.subscriptionplan.view');
    }
}

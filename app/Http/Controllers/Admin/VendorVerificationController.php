<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;

class VendorVerificationController extends Controller
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
        $verified_Vendors = Vendor::where('status', 1)->get();
        return view('admin.vendorverification.list', compact('verified_Vendors'));
    }

    public  function  pending()
    {
        $verified_Vendors = Vendor::where('status', 0)->get();
        return view('admin.vendorverification.pending', compact('verified_Vendors'));
    }

    public function verify(Request $request, $id)
    {
        $vendor = Vendor::where('id', $id)->first();
        $vendor->status = '1';
        $vendor->update();
        return response()->json([
                                'success' => 'vendor has been verified successfully!',
                                'data' => $vendor
                                ]);
    }

    public function unverify(Request $request, $id)
    {
        $vendor = Vendor::where('id', $id)->first();
        $vendor->status = '0';
        $vendor->update();
        return response()->json([
                                'success' => 'vendor has been unverified successfully!',
                                'data' => $vendor
                                ]);
    }

    public function remove($id)
    {
        $vendor = Vendor::where('id', $id)->first();
        $vendor->delete();
        return response()->json([
            'success' => 'vendor has been deleted successfully!',
            ]);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\Vendor;
use App\Models\WishList;
use App\Models\Product;
use App\Models\User;

class WishlistController extends Controller
{
    public function index()
    {
        if(Auth::guard('user')->check()){
            $user = Auth::guard('user');
            $wishes = WishList::where('user_id', $user->id())->orWhere('session', Session::getId())
            ->join('products', 'p_id', '=', 'products.id')
            ->paginate(6);
        }
        else{
            $wishes = WishList::where('session', Session::getId())
            ->join('products', 'p_id', '=', 'products.id')
            ->paginate(6);
        }

        return view('user.wishlist', compact('wishes'));
    }

    public function store($id)
    {
        $item = Product::where('id', $id)->where('status', 1)->first();
        if(Auth::guard('user')->check()){
            $wish = WishList::where('p_id', $id)
            ->where('user_id', Auth::guard('user')->id())->first();
            if(!$wish){
                $wish = new WishList();
                $wish->p_id = $id;
                $wish->user_id = Auth::guard('user')->id();
                $wish->session = Session::getId();
                $wish->save();
            }
            return response()->json([
                "status" => 200,
                "data" => $wish
            ]);
        }
        else{
            $wish = WishList::where('p_id', $id)->where('session',Session::getId())->first();
            if(!$wish){
                $wish = new WishList();
                $wish->p_id = $id;
                $wish->session = Session::getId();
                $wish->save();
            }
            return response()->json([
                "status" => 200,
                "data" => $wish
            ]);
        }
    }

    public function destroy($id){
        if(Auth::guard('user')->check()){
            $wish = WishList::where('p_id', $id)->where('user_id', Auth::guard('user')->id())->first();
            $wish->delete();

        }
        else{
            $session = Session::getId();
            $wish = WishList::where('p_id', $id)->where('session', $session)->first();
            $wish->delete();
            return response()->json([
                'status'=> 200,
                'success'=>'Data has been deleted'

            ]);
        }
    }
}

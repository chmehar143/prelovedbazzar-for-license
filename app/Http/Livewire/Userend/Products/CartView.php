<?php

namespace App\Http\Livewire\Userend\Products;

use Livewire\Component;
use Illuminate\Support\Facades\{Auth, Session};
use App\Models\{Category, Vendor, Admin, Product, WishList, Cart, User};


class CartView extends Component
{

    public $size;

    public function changesize(int $cartId)
    {
        if(Auth::guard('user')->check()){
            $cart = Cart::where('id', $cartId)->where('user_id', Auth::guard('user')->id())->first();
            if($cart)
            {
                if($cart->products[$this->size] == 1)
                {
                    $cart->size = $this->size;
                }
                else
                {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'size not available',
                        'type'=> 'warning',
                        'status'=> 404
                    ]);
                }
            }
        }
        else{
            $cart = Cart::where('id', $cartId)->where('session_id', Session::getId())->first();
            if($cart)
            {
                if($cart->products[$this->size] == 1)
                {
                    $cart->size = $this->size;
                }
                else
                {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Size not available',
                        'type'=> 'warning',
                        'status'=> 404
                    ]);
                }
            }
        }
    }
    public function increase(int $cartId)
    {
        if(Auth::guard('user')->check()){
            $cart = Cart::where('id', $cartId)->where('user_id', Auth::guard('user')->id())->first();
            if($cart)
            {
                if($cart->products->p_stock > $cart->quantity)
                {
                    $cart->increment('quantity');
                    $cart->net_price = $cart->net_price + $cart->price;
                    $cart->products->decrement('p_stock');
                }
                else
                {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'No more item can be added',
                        'type'=> 'warning',
                        'status'=> 404
                    ]);
                }
            }
        }
        else{
            $cart = Cart::where('id', $cartId)->where('session_id', Session::getId())->first();
            if($cart)
            {
                if($cart->products->p_stock > $cart->quantity)
                {
                    $cart->increment('quantity');
                    $cart->net_price = $cart->net_price + $cart->price;
                    $cart->products->decrement('p_stock');
                }
                else
                {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'No more item can be added',
                        'type'=> 'warning',
                        'status'=> 404
                    ]);
                }
            }
        }
    }

    public function decrease(int $cartId)
    {
        if(Auth::guard('user')->check()){
            $cart = Cart::where('id', $cartId)->where('user_id', Auth::guard('user')->id())->first();
            if($cart)
            {
                if($cart->quantity > 1)
                {
                    $cart->decrement('quantity');
                    $cart->net_price = $cart->net_price - $cart->price;                    
                    $cart->products->increment('p_stock');
                }
                else
                {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Minumum one quantity must be in cart',
                        'type'=> 'warning',
                        'status'=> 404
                    ]);
                }
            }
        }
        else{
            $cart = Cart::where('id', $cartId)->where('session_id', Session::getId())->first();
            if($cart)
            {
                if($cart->quantity > 1)
                {
                    $cart->decrement('quantity'); 
                    $cart->net_price = $cart->net_price - $cart->price;                   
                    $cart->products->increment('p_stock');
                }
                else
                {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Minumum one quantity must be in cart',
                        'type'=> 'warning',
                        'status'=> 404
                    ]);
                }
            }
        }
    }

    public function removecart(int $cartId)
    {
        if(Auth::guard('user')->check()){
            $cart = Cart::where('id', $cartId)->where('user_id', Auth::guard('user')->id())->first();
            if($cart)
            {
                $cart->products->p_stock = $cart->products->p_stock + $cart->quantity;
                $cart->delete();
                $this->emit('addupdateCart');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'item deleted successfully',
                    'type'=> 'success',
                    'status'=> 200
                ]);
            }
            else
            {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Something went wrong',
                    'type'=> 'error',
                    'status'=> 409
                ]);
            }
            
        }
        else{
            $cart = Cart::where('id', $cartId)->where('session_id', Session::getId())->first();
            if($cart)
            {
                $cart->products->p_stock = $cart->products->p_stock + $cart->quantity;
                $cart->delete();
                $this->emit('addupdateCart');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'item deleted successfully',
                    'type'=> 'success',
                    'status'=> 200
                ]);
            }
            else
            {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Something went wrong',
                    'type'=> 'error',
                    'status'=> 409
                ]);
            }
        }
    }

    public function clearall()
    {
        if(Auth::guard('user')->check()){
            $cartitems = Cart::where('user_id', Auth::guard('user')->id())->get();
            if($cartitems->count() > 0)
            {
                foreach($cartitems as $cart)
                {
                    $cart->products->p_stock = $cart->products->p_stock + $cart->quantity;
                    $cart->delete();
                }
                $this->emit('addupdateCart');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'all items deleted successfully',
                    'type'=> 'success',
                    'status'=> 200
                ]);

            }
            else
            {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'No item exist',
                    'type'=> 'error',
                    'status'=> 409
                ]);
            }
            
        }
        else{
            $cartitems = Cart::where('session_id', Session::getId())->get();
            if($cartitems)
            {
                foreach($cartitems as $cart)
                {
                    $cart->products->p_stock = $cart->products->p_stock + $cart->quantity;
                    $cart->delete();

                }
                $this->emit('addupdateCart');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'all items deleted successfully',
                    'type'=> 'success',
                    'status'=> 200
                ]);

            }
            else
            {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Something went wrong',
                    'type'=> 'error',
                    'status'=> 409
                ]);
            }
        }   
    }
    public function render()
    {
        if(Auth::guard('user')->check()){
            $user = Auth::guard('user');
            $carts = Cart::where('user_id', $user->id())->orWhere('session_id', Session::getId())->get();
        }
        else{
            $session = Session::getId();
            $carts = Cart::where('session_id', $session)->get();
        }

        return view('livewire.userend.products.cart-view', [
            'carts' => $carts
        ]);
    }
}

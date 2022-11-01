<?php

namespace App\Http\Livewire\Userend\Products;

use Livewire\Component;
use Illuminate\Support\Facades\{Auth, Session};
use App\Models\{Category, Vendor, Admin, Product, WishList, Cart, User};

class ProductCount extends Component
{

    public $CartCount;
    protected $listeners = ['addupdateCart' => 'cartcount'];

    public function cartcount()
    {
        if(Auth::guard('user')->check()){
          return $this->CartCount = Cart::where('user_id', Auth::guard('user')->id())->count();
        }
        else
        {
            return $this->CartCount = Cart::where('session_id', Session::getId())->count();
        }
    }

    public function render()
    {
        $this->CartCount = $this->cartcount();
        return view('livewire.userend.products.product-count');
    }
}

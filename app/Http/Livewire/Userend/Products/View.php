<?php

namespace App\Http\Livewire\Userend\Products;

use Livewire\Component;
use Illuminate\Support\Facades\{Auth, Session};
use App\Models\{Category, Vendor, Admin, Product, Discussion, RecentView, Childcategory, Subcategory, User, WishList};


class View extends Component
{
    public $product, $vendor, $category, $subcategory,  $childcategory,
    $moreproducts, $related_products, $five, $four, $three, $two, $one, $allreview;

    public function addToWish($productId)
    {
        if(Auth::guard('user')->check())
        {
            if(WishList::where('user_id', Auth::guard('user')->id())->where('p_id', $productId)->exists())
            {
                session()->flash('message', 'product already added to wishlist');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product already added to wishlist',
                    'type'=> 'warning',
                    'status'=> 409
                ]);
                return false;
            }
            else
            {
                WishList::create([
                'user_id' => Auth::guard('user')->id(),
                'p_id' => $productId
                ]);
                $this->emit('AddUpdate');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product has been added successfully in your wishlist',
                    'type'=> 'success',
                    'status'=> 200
                ]);
            }
        }
        else
        {
            session()->flash('message', 'Please login to continue');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please login first',
                'type'=> 'info',
                'status'=> 401
            ]);
            return false;
        }
    }

    public function mount($product, $vendor, $category, $subcategory,  $childcategory,
    $moreproducts, $related_products, $five, $four, $three, $two, $one, $allreview)
    {
        $this->product = $product;
        $this->vendor = $vendor;
        $this->category = $category;
        $this->subcategory = $subcategory;
        $this->childcategory = $childcategory;
        $this->moreproducts = $moreproducts;
        $this->related_products = $related_products;
        $this->five = $five;
        $this->four = $four;
        $this->three = $three;
        $this->two = $two;
        $this->one = $one;
        $this->allreview = $allreview;

    }

    public function render()
    {
        return view('livewire.userend.products.view', [
            'product' => $this->product,
            'vendor'=>$this->vendor,
            'category' => $this->category,
            'subcategory' => $this->subcategory,
            'childcategory' => $this->childcategory,
            'moreproducts' => $this->moreproducts,
            'related_products' => $this->related_products,
            'five' => $this->five,
            'four' => $this->four,
            'three' => $this->three,
            'two' => $this->two,
            'one' => $this->one,
            'allreview' => $this->allreview

        ]);
    }
}

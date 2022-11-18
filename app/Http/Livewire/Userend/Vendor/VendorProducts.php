<?php

namespace App\Http\Livewire\Userend\Vendor;

use Livewire\Component;
use Illuminate\Support\Facades\{Auth, Session};
use App\Models\{Product, User, WishList, Cart, Category, Vendor, Discussion};
use Livewire\WithPagination;

class VendorProducts extends Component
{

    public $product, $quantitycount = 1, $p_size = 'medium', $vendorId, $vendor;

    protected $paginationTheme = 'bootstrap';

 
    public function addtocart(int $productId)
    {
        $this->product = Product::where('id', $productId)->where('status', 1)->first();

        if(Auth::guard('user')->check())
        {
            if(Product::where('id', $productId)->where('status', 1)->exists())
            {
                if($this->product->p_stock > 0)
                {
                    if($this->product->p_stock > $this->quantitycount)
                    {
                        if(Cart::where('user_id', Auth::guard('user')->id())->where('prod_id',$productId)->exists())
                        {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Product already added to cart',
                                'type'=> 'warning',
                                'status'=> 404
                            ]);
                            
                        }
                        else
                        {
                            Cart::create([
                                'user_id' => Auth::guard('user')->id(),
                                'prod_id'=> $productId,
                                'quantity'=> $this->quantitycount,
                                'price'=> $this->product->p_new_price,
                                'net_price'=> $this->product->p_new_price * $this->quantitycount,
                                'size' => $this->p_size
                            ]);
                            $this->emit('addupdateCart');
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Product has been adde to your cart successfully',
                                'type'=> 'success',
                                'status'=> 200
                            ]); 
                        }
                    }
                    else
                    {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'only '.$this->product->p_stock.'quantity available, add less than '.$this->product->p_stock.'.',
                            'type'=> 'warning',
                            'status'=> 404
                        ]);   
                    }
                }
                else
                {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Out of stock',
                        'type'=> 'warning',
                        'status'=> 404
                    ]);   
                }
            }
            else
            {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product does not exist',
                    'type'=> 'warning',
                    'status'=> 404
                ]);
            }
        }
        else
        {
            if(Product::where('id', $productId)->where('status', 1)->exists())
            {
                if($this->product->p_stock > 0)
                {
                    if($this->product->p_stock > $this->quantitycount)
                    {
                        if(Cart::where('session_id', Session::getId())->where('prod_id',$productId)->exists())
                        {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Product already added to cart',
                                'type'=> 'warning',
                                'status'=> 404
                            ]);
                        }
                        else
                        {
                            Cart::create([
                                'session_id' => Session::getId(),
                                'prod_id'=> $productId,
                                'quantity'=> $this->quantitycount,
                                'price'=> $this->product->p_new_price,
                                'net_price'=> $this->product->p_new_price * $this->quantitycount,
                                'size' => $this->p_size
                            ]);    
                            $this->emit('addupdateCart');   
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Product has been added to your cart successfully',
                                'type'=> 'success',
                                'status'=> 200
                            ]);
                        }

                    }
                    else
                    {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'only '.$this->product->p_stock.'quantity available, add less than '.$this->product->p_stock.'.',
                            'type'=> 'warning',
                            'status'=> 404
                        ]);   
                    }
                }
                else
                {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Out of stock',
                        'type'=> 'warning',
                        'status'=> 404
                    ]);   
                }
            }
            else
            {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product does not exist',
                    'type'=> 'warning',
                    'status'=> 404
                ]);
            }
        }
    }

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

    public function mount($id)
    {
        $this->vendor = Vendor::where('id', $id)->first();
        $this->vendorId = $this->vendor->id;

    }

    public function render()
    {
        $categories = Category::all();
        $products = Product::where('vendor_id', $this->vendorId)->where('status', 1)
                    ->join('categories', 'products.p_catog','=','categories.id')->with('discussions')
                    ->select('products.*', 'categories.name')
                    ->paginate(12);

        $reviews = Product::where('vendor_id', $this->vendorId)->where('status', 1)
                            ->join('categories', 'products.p_catog','=','categories.id')->with('discussions')
                            ->select('products.*', 'categories.name')->get();
    
        $bestsellings = array();

        foreach($reviews as $review){
            $avg = $review->discussions->sum('review');
            if($avg > 3){
                $bestsellings[] = $review;
            }
        }
        return view('livewire.userend.vendor.vendor-products', [
            'vendor' => $this->vendor,
            'products' => $products,
            'categories' => $categories,
            'bestsellings' => $bestsellings
        ]);
    }
}

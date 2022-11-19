<?php

namespace App\Http\Livewire\Userend\Products;

use Livewire\Component;
use Illuminate\Support\Facades\{Auth, Session};
use App\Models\{Product, User, WishList, Cart, Category};
use Livewire\WithPagination;

class SortByCat extends Component
{
    public $product, $quantitycount = 1, $p_size = 'medium', $cat_id;

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
        $category = Category::where('id', $id)->first();
        $this->cat_id = $category->id;
    }


    public function render()
    {
        $category = Category::where('id', $this->cat_id)->first();
        if($category){
            $products = Product::where('p_catog', $this->cat_id)->where('products.status', 1)->with('discussions')
            ->join('categories', 'products.p_catog','=','categories.id')
            ->select('products.*', 'categories.name')
            ->paginate(12);
        }
        $categories = Category::all();
        return view('livewire.userend.products.sort-by-cat', [
            'products' => $products,
            'categories' => $categories
        ]);
    }
}

<?php

namespace App\Http\Livewire\Userend\Wishlist;

use Livewire\Component;
use Illuminate\Support\Facades\{Auth, Session};
use App\Models\{Product, User, WishList, Cart};


class Index extends Component
{
    public $product, $p_size, $quantitycount = 1;

    public function addtocart(int $productId)
    {
       $this->product = Product::where('id', $productId)->where('status', 1)->first();
       if($this->product)
       {
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
                                $this->product->p_stock = $this->product->p_stock  - $this->quantitycount;
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
                                    'session_id' => Session::getId(),
                                    'prod_id'=> $productId,
                                    'quantity'=> $this->quantitycount,
                                    'price'=> $this->product->p_new_price,
                                    'net_price'=> $this->product->p_new_price * $this->quantitycount,
                                    'size' => $this->p_size
                                ]);
                                $this->product->p_stock = $this->product->p_stock  - $this->quantitycount;
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
       else
       {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Product does not exist',
                'type'=> 'warning',
                'status'=> 404
            ]);
       }

    }

    public function removelist(int $id)
    {
        if(Auth::guard('user')->check()){
            $wish = WishList::where('id', $id)->where('user_id', Auth::guard('user')->id())->first();
            $wish->delete();
            $this->emit('AddUpdate');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Wishlist item removed successfully',
                'type'=> 'success',
                'status'=> 200
            ]);
        }
    }
    public function render()
    {
        if(Auth::guard('user')->check()){
            $user = Auth::guard('user');
            $wishes = WishList::where('user_id', $user->id())
            ->join('products', 'p_id', '=', 'products.id')
            ->select('wish_lists.*', 'products.p_name', 'products.p_image', 'products.p_new_price', 'products.p_stock', 'products.p_name', 'products.p_name')
            ->paginate(6);
        }
        return view('livewire.userend.wishlist.index', ['wishes'=> $wishes ]);
    }
}

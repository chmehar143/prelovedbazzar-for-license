<?php

namespace App\Http\Livewire\Userend\Products;

use Livewire\Component;
use Illuminate\Support\Facades\{Auth, Session};
use App\Models\{Category, Vendor, Admin, Product, WishList, Cart, User, Discussion};


class View extends Component
{
    public $product, $vendor, $category, $subcategory,  $childcategory,
    $moreproducts, $related_products, $five, $four, $three, $two, $one, $allreview, 
    $helppositive, $helpnegative, $highrate, $lowrate,
    $quantitycount = 1, $p_size,
    $session, $user, $ven_id, $user_name, $email, $review, $comment;

    public function addrating($productId)
    {
        $validatedData = $this->validate([

            'user_name' => 'required',
            'email' => 'required|email',
            'review' => 'required|integer',
            'comment' => 'required',
        ]);

        if(Product::where('id', $productId)->where('status', 1)->exists())
        {
            $product = Product::where('id', $productId)->where('status', 1)->first();
            $validatedData['item'] = $product->id;

            if(Auth::guard('user')->check())
            {
                $validatedData['user'] = Auth::guard('user')->id();
                $validatedData['session'] = Session::getId();
                $review = $product->discussions->where('email', $validatedData['email'])->first();
                if(!$review)
                {
                    $review = new Discussion();
                    $review->fill($validatedData)->save();
                    $this->emit('addRating');
                    $this->emit('addCount');  
                    $this->emit('percent');                  
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Review has been submitted successfully',
                        'type'=> 'success',
                        'status'=> 200
                    ]);
                }
                else
                {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Already submitted review',
                        'type'=> 'info',
                        'status'=> 404
                    ]);
                }
            }
            else
            {

                $validatedData['session'] = Session::getId();

                $review = $product->discussions->where('email', $validatedData['email'])->first();

                if(!$review)
                {
                    $review = new Discussion();
                    $review->fill($validatedData)->save();
                    $this->emit('addRating');
                    $this->emit('addCount'); 
                    $this->emit('percent'); 
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Review has been submitted successfully',
                        'type'=> 'success',
                        'status'=> 200
                    ]);
                }
                else
                {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Already submitted review',
                        'type'=> 'info',
                        'status'=> 404
                    ]);
                }
            }
        }
        else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Already submitted review',
                'type'=> 'error',
                'status'=> 409
            ]);  
        }
    }

    public function sizeProduc($size)
    {
        return $this->p_size = $size;
    }
    public function incProduct()
    {
        if($this->quantitycount < 10)
        {
            $this->quantitycount++;
        }
    }

    public function decProduct()
    {
        if($this->quantitycount > 1)
        {
            $this->quantitycount--;
        }
    }

    public function addtocart(int $productId)
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
                                $helppositive, $helpnegative, $highrate, $lowrate, 
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
        $this->helppositive = $helppositive;
        $this->helpnegative = $helpnegative;
        $this->highrate = $highrate;
        $this->lowrate = $lowrate;

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
            'allreview' => $this->allreview,

            'helppositive' => $this->helppositive,
            'helpnegative' => $this->helpnegative, 
            'highrate' => $this->highrate,
            'lowrate' => $this->lowrate

        ]);
    }
}

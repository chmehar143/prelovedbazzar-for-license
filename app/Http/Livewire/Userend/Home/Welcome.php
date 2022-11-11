<?php

namespace App\Http\Livewire\Userend\Home;

use Livewire\Component;
use Illuminate\Support\Facades\{Auth, Session, Redirect};
use App\Models\{
    Category, Vendor, Product, RecentView, Childcategory, Cart,
    Subcategory, Subscriber, Discussion, User, Banner, OrderDetail, FrontPage, Wishlist
};
use Carbon\Carbon;
use Validator;
use Symfony\Component\HttpFoundation\Response;

class Welcome extends Component
{
    public $product, $vendor, $quantitycount = 1, $p_size;

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

    public function loadPosts()
    {
        $this->readyToLoad = true;
    }

    public function render()
    {
        $banners = Banner::where('status', 1)->skip(0)->take(5)->get();

        $deals = Product::whereNotNull('admin_id')->whereBetween('products.created_at', 
                [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()])->with('discussions')
                ->skip(0)->take(20)->get();

        $top_sellers = Vendor::where('status', 1)->orderBy('vendors.created_at', 'desc')->skip(0)->take(5)->get();

        $top_categories = Product::leftJoin('categories', 'products.p_catog', '=', 'categories.id')->whereBetween('products.updated_at', 
         [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()])
         ->select('products.updated_at', 'categories.*')
         ->get()->groupBy('id');
        $newarrivals = Product::whereBetween('created_at',
        [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->today()])->with('discussions')->orderBy('created_at', 'desc')->get();
        
        $products = OrderDetail::join('products', 'pro_id', '=', 'products.id')->get()->groupBy('pro_id');
       // dd($products->count());

        $most_populars = Product::whereNotNull('admin_id')->whereBetween('updated_at',
        [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->today()])->with('discussions')->get();


        $clothings = Product::where('p_catog', 1)->whereBetween('created_at',
        [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()])->with('discussions')->get();

        $frontpages = FrontPage::all();
        
        $frontcat = array();
        foreach($frontpages as $category){
            //$products = Product::where('p_catog', $category->category_id)->with('category')->get();
            $products = Category::where('id', $category->category_id)->with('product')->get();
            $frontcat[] = $products;
        }


        $electrics = Product::where('p_catog', 4)->whereBetween('created_at',
        [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()])->with('discussions')->get();

        if(Auth::guard('user')->check()){
            $recents = RecentView::where('user_id', Auth::guard('user')->id())->orderBy('created_at', 'DESC')->get();
        }
        else{
            $recents = RecentView::where('session', Session::getId())->orderBy('created_at', 'DESC')->get();
        }
        return view('livewire.userend.home.welcome',[
            'deals' => $deals,
            'top_sellers' => $top_sellers, 'top_categories' => $top_categories,
         'newarrivals' => $newarrivals, 'clothings' => $clothings, 'electrics' => $electrics, 
         'recents' => $recents, 'banners' => $banners, 'most_populars' => $most_populars, 
         'products' => $products, 'frontpages' => $frontpages, 'frontcat' => $frontcat
        ]);
    }
}

<?php

namespace App\Http\Livewire\Userend\Products;

use Livewire\Component;
use Illuminate\Support\Facades\{Auth, Session};
use App\Models\{Category, Vendor, Admin, Product, WishList, Cart, User, Discussion};

class ReviewCount extends Component
{
    public $count, $product;
    protected $listeners = ['addCount' => 'count'];

    public function count()
    {
        return $this->count = $this->product->discussions->count();        
    }
    
    public function mount($id)
    {
        $this->product = Product::where('id', $id)->where('status', 1)->first();
    }

    public function render()
    {
        $this->count = $this->count();
        return view('livewire.userend.products.review-count');
    }
}

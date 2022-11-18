<?php

namespace App\Http\Livewire\Userend\Products;

use Livewire\Component;
use Illuminate\Support\Facades\{Auth, Session};
use App\Models\{Category, Vendor, Admin, Product, WishList, Cart, User, Discussion};

class Rating extends Component
{
    public $Ratings, $product, $avg, $no = 0;
    protected $listeners = ['addRating' => 'ratingcount'];

    public function ratingcount()
    {
          return $this->Ratings = $this->product->discussions->avg('review');        
    }
    
    public function mount($id)
    {
        $this->product = Product::where('id', $id)->where('status', 1)->first();
    }
    
    public function render()
    {
        $this->Ratings = $this->ratingcount();
        return view('livewire.userend.products.rating');
    }
}

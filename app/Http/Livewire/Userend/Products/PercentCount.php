<?php

namespace App\Http\Livewire\Userend\Products;

use Livewire\Component;
use Illuminate\Support\Facades\{Auth, Session};
use App\Models\{Category, Vendor, Admin, Product, WishList, Cart, User, Discussion};

class PercentCount extends Component
{
    public $percent, $product;
    protected $listeners = ['percent' => 'percentrating'];

    public function percentrating()
    {
        return $this->percent = $this->product->discussions
                                ->whereBetween('review', [4, 5])->count() /
                                $this->product->discussions->count();        
    }
    
    public function mount($id)
    {
        $this->product = Product::where('id', $id)->first();
    }


    public function render()
    {
        $this->percent = $this->percentrating();
        return view('livewire.userend.products.percent-count');
    }
}

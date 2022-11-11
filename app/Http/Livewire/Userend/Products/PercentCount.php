<?php

namespace App\Http\Livewire\Userend\Products;

use Livewire\Component;
use Illuminate\Support\Facades\{Auth, Session};
use App\Models\{Category, Vendor, Admin, Product, WishList, Cart, User, Discussion};

class PercentCount extends Component
{
    public $percent, $product, $totalreview;
    protected $listeners = ['percent' => 'percentrating'];

    public function percentrating()
    {
        return $this->percent = $this->product->discussions
                                ->whereBetween('review', [4, 5])->count() /
                                $this->totalreview;        
    }
    
    public function mount($id)
    {
        $this->product = Product::where('id', $id)->first();
        $this->totalreview = $this->product->discussions->count();
        if($this->totalreview == 0){
            $this->totalreview = 1;
        }

    }


    public function render()
    {
        $this->percent = $this->percentrating();
        return view('livewire.userend.products.percent-count');
    }
}

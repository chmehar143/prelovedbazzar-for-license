<?php

namespace App\Http\Livewire\Userend\Products;

use Livewire\Component;

class View extends Component
{
    public $product, $vendor, $category, $subcategory,  $childcategory,
    $moreproducts, $related_products, $five, $four, $three, $two, $one, $allreview;

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

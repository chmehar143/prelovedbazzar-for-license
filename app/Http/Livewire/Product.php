<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Product extends Component
{
    public $subcategories = [
        [
            'body'=>'Here is just for test'
        ]
    ];
    public function render()
    {
        return view('livewire.product');
    }
}

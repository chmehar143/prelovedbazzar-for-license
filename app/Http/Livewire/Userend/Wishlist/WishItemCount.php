<?php

namespace App\Http\Livewire\Userend\Wishlist;

use Livewire\Component;
use Illuminate\Support\Facades\{Auth, Session};
use App\Models\{Product, User, WishList};

class WishItemCount extends Component
{
    public $wishcount;

    protected $listeners = ['AddUpdate' => 'wishchekcount'];


    public function wishchekcount()
    {
        if(Auth::guard('user')->check()){
          return $this->wishcount = WishList::where('user_id', Auth::guard('user')->id())->count();
        }
        else
        {
            return $this->wishcount = 0;
        }
    }
    public function render()
    {
        $this->wishcount = $this->wishchekcount();
        return view('livewire.userend.wishlist.wish-item-count', [
            'wishcount'=>$this->wishcount
        ]);
    }
}

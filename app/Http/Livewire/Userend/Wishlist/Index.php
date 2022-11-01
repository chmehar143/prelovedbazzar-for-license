<?php

namespace App\Http\Livewire\Userend\Wishlist;

use Livewire\Component;
use Illuminate\Support\Facades\{Auth, Session};
use App\Models\{Product, User, WishList};


class Index extends Component
{

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

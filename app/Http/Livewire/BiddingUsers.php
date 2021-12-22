<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class BiddingUsers extends Component
{
    public Product $product;

    protected $listeners = [
        'BidUpdated' => 'render' ,
        'echo:bid,BidEvent' => 'render'
    ];

    public function render()
    {
        return view('livewire.bidding-users');
    }
}

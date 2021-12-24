<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class BiddingUsers extends Component
{
    public Product $product;


    public function render()
    {
        return view('livewire.bidding-users');
    }

    public function getListeners()
    {
        return [
            'BidUpdated' => 'render',
            "echo:bid.{$this->product->id},BidEvent" => 'render',
        ];
    }
}

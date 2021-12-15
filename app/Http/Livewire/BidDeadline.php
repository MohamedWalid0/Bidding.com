<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class BidDeadline extends Component
{
    public Product $product;
    public $currentBid;

    protected $listeners = ['BidUpdated' => 'render'];

    public function mount () {
     $this->currentBid = $this->product->last_bid->bid->cost;
    }
    public function render()
    {
        $this->currentBid = $this->product->last_bid->bid->cost;
        return view('livewire.bid-deadline');
    }
}

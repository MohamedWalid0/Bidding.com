<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class BidDeadline extends Component
{
    public Product $product;
    public $currentBid;

    protected $listeners = ['BidUpdated' => 'render'];

    public function mount()
    {
        if ($this->product->last_bid)
        $this->currentBid = $this->product->last_bid->bid->cost;
        else $this->currentBid = $this->product->start_price;
    }

    public function render()
    {
        if ($this->product->last_bid)
        $this->currentBid = $this->product->last_bid->bid->cost;
        else $this->currentBid = $this->product->start_price;
        return view('livewire.bid-deadline');
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class BidDeadline extends Component
{
    public Product $product;
    public $currentBid;
    public $isStopped = false;
    protected $listeners = ['BidUpdated' => 'render'];

    public function mount()
    {
        if ($this->product->last_bid)
        $this->currentBid = $this->product->last_bid->bid->cost;
        else $this->currentBid = $this->product->start_price;
        if ($this->product->stopped_product) {
            $this->isStopped = true;
        }
    }

    public function render()
    {
        if ($this->product->last_bid)
        $this->currentBid = $this->product->last_bid->bid->cost;
        else $this->currentBid = $this->product->start_price;
        return view('livewire.bid-deadline');
    }
}

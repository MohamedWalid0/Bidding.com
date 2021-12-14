<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class BiddingUsers extends Component
{
    public Product $product;
    public $users;

    protected $listeners = ['BidUpdated' => 'render'];

    public function mount()
    {

        $this->users = $this->product->user_bids;
    }

    public function render()
    {
        $this->product = Product::with(
            ['user_bids' => fn($query) => $query->latest('bids.cost')->limit(5)])->findOrFail($this->product->id);
        $this->users = $this->product->user_bids;
        return view('livewire.bidding-users');
    }
}

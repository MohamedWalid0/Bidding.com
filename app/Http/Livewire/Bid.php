<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Rules\BidRule;
use Cache;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Bid extends Component
{
    public Product $product;
    public $users;
    public $product_id;
    public $startBid;

    public function mount($id, $startBid)
    {
        $this->product = Product::with(
            ['user_bids' => fn($query) => $query->latest('bids.cost')->limit(5)])->findOrFail($id);
        $this->users = $this->product->user_bids;

        $this->startBid = $startBid;
        $this->product_id = $id;
    }

    public function rules()
    {
        return [
            'startBid' => 'required|numeric|gt:'.((int)str_replace(',', '', $this->product->last_bid->user_bids->cost))
        ];
    }


    public function updated($propertyName)
    {

        $this->validateOnly($propertyName);
    }

    public function increment()
    {
        $this->startBid++;
    }

    public function decrement()
    {
        if ($this->startBid > $this->calcAcceptBid()) {
            $this->startBid--;
        }
    }

    public function calcAcceptBid()
    {
        $this->product = Product::with(
            ['user_bids' => fn($query) => $query->latest('bids.cost')->limit(5)])->findOrFail($this->product->id);

        $currentBid = $this->product->user_bids->first()->user_bids->cost;
        return ((int)str_replace(',', '', $currentBid)) + 1;
    }

    public function bid()
    {
        $this->validate();
        $this->product = Product::with(
            ['user_bids' => fn($query) => $query->latest('bids.cost')->limit(5)])->findOrFail($this->product->id);

        if ($this->product->user_bids()->where('users.id', auth()->id())->exists()) {
            $this->product->user_bids()->syncWithoutDetaching([
                auth()->user()->id => ['cost' => $this->startBid]
            ]);
        } else {
            $this->product->user_bids()->attach(auth()->user()->id, ['cost' => $this->startBid]);
        }



        session()->flash('message', 'Bid successfully updated.');
        $this->emit('BidUpdated');


    }

    public function render()
    {
        return view('livewire.bid');
    }

}

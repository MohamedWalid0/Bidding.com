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
    public $startBid;
    public $currentBid;


    public function mount()
    {
        $this->currentBid = $this->product->last_bid->bid->cost;
        $this->startBid = ((int)str_replace(',', '', $this->currentBid))+1;
    }

    public function rules()
    {
        return [
            'startBid' => 'required|numeric|gt:'.((int)str_replace(',', '', $this->currentBid))
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
        return ((int)str_replace(',', '', $this->currentBid)) + 1;
    }

    public function updateBids ($start) {
        $this->currentBid = $start;
        $this->startBid = ((int)str_replace(',', '', $this->currentBid))+1;
    }

    public function bid() {

        $this->validate();

        if ($this->product->user_bids()->where('users.id', auth()->id())->exists()) {
            $this->product->user_bids()->syncWithoutDetaching([
                auth()->user()->id => ['cost' => $this->startBid]
            ]);
        } else {
            $this->product->user_bids()->attach(auth()->user()->id, ['cost' => $this->startBid]);
        }

        $this->updateBids($this->startBid);
        session()->flash('message', 'Bid successfully added.');
        $this->emit('BidUpdated');

    }

    public function render()
    {
        return view('livewire.bid');
    }

}
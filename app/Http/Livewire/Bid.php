<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Notifications\NewBidAddedNotification;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class Bid extends Component
{
    use AuthorizesRequests;
    public Product $product;
    public $startBid;
    public $currentBid;
    public $isActive;
    public $isStopped;
    public $deadline;

    public function mount()
    {
        if ($this->product->last_bid)
        $this->currentBid = $this->product->last_bid->bid->cost;
        else $this->currentBid = $this->product->start_price;
        $this->startBid = ((int)str_replace(',', '', $this->currentBid)) + 1;
        $this->isActive = $this->product->status === \App\Models\Product::ACTIVE;
        if ($this->product->stopped_product) {
            $this->isStopped = true;
        }

        $this->deadline = $this->product->deadline;
    }

    public function rules()
    {
        return [
            'startBid' => 'required|numeric|gt:' . ((int)str_replace(',', '', $this->currentBid))
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

    /**
     * @throws AuthorizationException
     */
    public function bid()
    {
        $this->authorize('Adding-bid', $this->product);
        $this->validate();

        if ($this->product->user_bids()->where('users.id', auth()->id())->exists()) {
            $this->product->user_bids()->syncWithoutDetaching([
                auth()->user()->id => ['cost' => $this->startBid]
            ]);
        } else {
            $this->product->user_bids()->attach(auth()->user()->id, ['cost' => $this->startBid]);
        }

        $this->updateBids($this->startBid);
//        session()->flash('message', 'Bid successfully added.');
        $this->emit('BidUpdated');

    }

    public function updateBids($start)
    {
        $this->currentBid = $start;
        $this->startBid = ((int)str_replace(',', '', $this->currentBid)) + 1;
    }

    public function render()
    {
        return view('livewire.bid');
    }

    public function wtf()
    {
        $this->currentBid = $this->product->last_bid->bid->cost;
        $this->startBid = ((int)str_replace(',', '', $this->product->last_bid->bid->cost)) + 1;
    }
    public function wtf2()
    {
        $this->isActive = false;
    }

    public function getListeners()
    {
        return [
            "echo:bid.{$this->product->id},BidEvent" => 'wtf',
            "echo:end-bid.{$this->product->id},EndBidEvent" => 'wtf2',
        ];
    }

}

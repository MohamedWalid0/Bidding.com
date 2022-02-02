<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Product;
use Livewire\Component;

class BidDeadline extends Component
{
    public Product $product;
    public $currentBid;
    public $isStopped = false;
    public $isClosed = false;
//     protected $listeners = ['start-bid-again' => '$refresh'];

    public function mount()
    {
        if ($this->product->last_bid)
            $this->currentBid = $this->product->last_bid->bid->cost ;
        else $this->currentBid = $this->product->start_price;
        if ($this->product->stopped_product) {
            $this->isStopped = true;
        }
        $this->deadline = $this->product->deadline;
        $this->isClosed = Carbon::now()->greaterThanOrEqualTo($this->product->deadline);
        $this->bidStatus = $this->isClosed ?  "Winner bid"  : "Current bid" ;
    }

    public function render()
    {
        if ($this->product->last_bid)
        $this->currentBid = $this->product->last_bid->bid->cost;
        else $this->currentBid = $this->product->start_price;
        return view('livewire.bid-deadline');
    }

    public function wtf()
    {
        $this->currentBid = $this->product->last_bid->bid->cost;
        $this->startBid = ((int)str_replace(',', '', $this->product->last_bid->bid->cost)) + 1;
        $this->isClosed = Carbon::now()->greaterThanOrEqualTo($this->product->deadline);
        $this->bidStatus = $this->isClosed ?  "Winner bid"  : "Current bid" ;
    }

    public function wtf1()
    {
        $this->isStopped = false;
    }
    public function wtf2()
    {
        $this->isStopped = true;
    }
    public function getListeners()
    {
        return [
            'BidUpdated' => 'render',
            "echo:bid.{$this->product->id},BidEvent" => 'wtf',
            "echo:end-bid.{$this->product->id},EndBidEvent" => 'wtf',
            "echo:start-bid.{$this->product->id},StartBidEvent" => 'wtf1',
            "echo:stop-bid.{$this->product->id},StopBidEvent" => 'wtf2',
        ];
    }
}

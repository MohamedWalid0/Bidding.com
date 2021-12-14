<?php

namespace App\Http\Livewire;
use App\Models\Bid as ModelsBid;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;

class Bid extends Component
{
    public Product $product;
    public $users;
    public $product_id;
    public $startBid;

    public function mount ($id, $startBid) {
         $this->product = Product::with(
            ['user_bids' => fn($query) => $query->latest('bids.cost')->limit(5)])->findOrFail($id);
        // $this->users = $this->product->user_bids()->latest('bids.cost')->limit(5)->get();
        $this->users = $this->product->user_bids;

        // dd(ModelsBid::create(5));
        $this->startBid = $startBid;
        $this->product_id = $id;
    }

    public function rules()
    {
        return [
            'startBid' => 'required|numeric|min:{$this->startBid}',
        ];
    }
    public function updated($propertyName)
    {

        $this->validateOnly($propertyName);
    }
    public function calcAcceptBid () {
        $this->product = Product::with(
            ['user_bids' => fn($query) => $query->latest('bids.cost')->limit(5)])->findOrFail($this->product->id);

        $currentBid = $this->product->user_bids->first()->user_bids->cost;
        return ((int) str_replace(',', '', $currentBid) )+1;
    }
    public function increment () {
        $this->startBid++;
    }
    public function decrement () {
        if ($this->startBid > $this->calcAcceptBid()) {
            $this->startBid--;
        }
    }

    public function bid () {
        $this->validate();
        $this->product = Product::with(
            ['user_bids' => fn($query) => $query->latest('bids.cost')->limit(5)])->findOrFail($this->product->id);

        if ($this->product->user_bids()->where('users.id' , auth()->id())->exists()) {
            $this->product->user_bids()->find(auth()->user()->id)->user_bids->update(
                [
                    'cost' => $this->startBid
                ]
            );

            // $data = $this->product->user_bids()->syncWithoutDetaching(auth()->user()->id ,
            // [
            //     'cost' => $this->startBid,

            // ]);
            // dd($data);


        } else {

            // $this->product->user_bids()->attach(auth()->user()->id  ,
            // [
            //     'cost' => 100000000000000000000,

            // ]);
            ModelsBid::create([
                'user_id' => auth()->user()->id,
                'product_id' => $this->product_id,
                'cost' => $this->startBid,
                'created_at' => Carbon::now()
            ]);
        }

        session()->flash('message', 'Bid successfully updated.');
        $this->emit('BidUpdated');


    }
    public function render()
    {
        return view('livewire.bid');
    }

}

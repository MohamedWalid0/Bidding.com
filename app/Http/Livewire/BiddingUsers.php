<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Product;
use Livewire\Component;

class BiddingUsers extends Component
{
    public Product $product;
    public array $colors = ['success' , 'info' , 'warning' , 'danger' ,'dark'];
    public $isClosed;
    public $numberFormatter;

    public function render()
    {
        $this->isClosed = Carbon::now()->greaterThanOrEqualTo($this->product->deadline);
        return view('livewire.bidding-users');
    }
    public function str_ordinal($value, $superscript = false)
    {
        $number = abs($value);

        $indicators = ['th','st','nd','rd','th','th','th','th','th','th'];

        $suffix = $superscript ? '<sup>' . $indicators[$number % 10] . '</sup>' : $indicators[$number % 10];
        if ($number % 100 >= 11 && $number % 100 <= 13) {
            $suffix = $superscript ? '<sup>th</sup>' : 'th';
        }

        return number_format($number) . $suffix;
    }

    public function getListeners()
    {
        return [
            'BidUpdated' => 'render',
            "echo:bid.{$this->product->id},BidEvent" => 'render',
        ];
    }
}

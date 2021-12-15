<div>
    <h3 class="product-desc--header mb-4 pad-media">
        Current bid: <span class="product-price"> {{$currentBid}}LE </span>
    </h3>
    <div class="product--underline"></div>
    <p class="product-header--subtitle py-3">Item Condition: New</p>
    <p class="product-header--subtitle py-1">Time left:</p>
    <div class="countdown"></div>
    <p class="product-header--subtitle py-3">
        Auction ends: {{$product->deadline->toDayDateTimeString()}}
    </p>


    <script src="{{asset('js/product/countdown.js')}}"></script>
        <script>
            document.addEventListener('livewire:load', function () {
                var year =  {!! $product->deadline->year !!};
                var month =   {!! $product->deadline->month !!};
                var day =   {!! $product->deadline->day !!};
                var hour =   {!! $product->deadline->hour !!};
                var min =   {!! $product->deadline->minute  !!};

                var countdown = new SV.Countdown('.countdown', {
                    year: year,
                    month: month,
                    day: day,
                    hour: hour,
                    min: min
                });
            })

        </script>

</div>

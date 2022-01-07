<div>
    <h3 class="product-desc--header mb-4 pad-media">
        Current bid: <span class="product-price"> {{$currentBid}}LE </span>
    </h3>
    <div class="product--underline"></div>
    <p class="product-header--subtitle py-3">Item Condition: New</p>
    @if ($isStopped)
        <h3 class="text-center" style="font-weight: 600; font-size:22px">This Product Stopped by Admin at
        {{$product->stopped_product->created_at->toDayDateTimeString()}}</h3>
    @else
    <p class="product-header--subtitle py-1">Time left:</p>
    <div class="countdown">
        <div class="timer-wrapper">
            <table class="bid-timer">
            <thead>
                <tr>
                    <th>Days</th>
                    <th>Hours</th>
                    <th>Mins</th>
                    <th>Secs</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="bid-days"></td>
                    <td class="bid-hours"></td>
                    <td class="bid-mins"></td>
                    <td class="bid-secs"></td>
                </tr>
            </tbody>
            </table>
            </div>
    </div>
    @endif
    <p class="product-header--subtitle py-3">
        Auction ends: {{$product->deadline->toDayDateTimeString()}}
    </p>



<script >

    document.addEventListener('livewire:load', function () {
        var year =  {!! $product->deadline->year !!};
        var month =   {!! $product->deadline->month !!};
        var day =   {!! $product->deadline->day !!};
        var hour =   {!! $product->deadline->hour !!};
        var min =   {!! $product->deadline->minute  !!};
        if (hour == 0)
        hour = '00';

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

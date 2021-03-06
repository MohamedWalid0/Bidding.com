<div>
    <h3 class="product-desc--header mb-4 pad-media">
        {{$bidStatus}}: <span class="product-price"> {{$currentBid}}LE </span>
    </h3>
    <div class="product--underline"></div>
    <?php $rate = number_format($product->user->rate) ?>
    <div class="product-header--subtitle py-3">
        by
        <a href="{{route('profile.show' , $product->user->id)}}">
            {{$product->user->account->full_name}}
        </a>
        <div class="rating">
            @for ($i = 1 ; $i<=$rate ; $i++ )
                <i class="fa fa-star checked"></i>
            @endfor
            @for ($j = $rate+1  ; $j<=5 ; $j++ )
                <i class="fa fa-star "></i>
            @endfor
        </div>
    </div>
    @if ($isStopped)
        <h3 class="text-center" style="font-weight: 600; font-size:22px">This Product Stopped by Admin at
        {{$product->stopped_product->created_at->toDayDateTimeString()}}</h3>
    @else
    <p class="product-header--subtitle py-1">Time left:</p>
    <div class="countdown"
    data-date="{{ \Carbon\Carbon::parse($product->deadline)->format('M d, y H:i:s') }}">
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
                <tbody style="height: 36px;">
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







</script>


</div>

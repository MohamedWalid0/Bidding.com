<div>
    <p class="product-header--subtitle py-3">
         @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        Add your bid now!
    </p>
    <div class="row">
        <div class="col-md-3">
            @if ($product->status === \App\Models\Product::ACTIVE)
            <div class="input-group">
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-number" wire:click="decrement">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-minus" width="20"
                             height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="#9e9e9e" fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <line x1="5" y1="12" x2="19" y2="12"/>
                        </svg>
                    </button>
                </span>

                <input type="text" class="form-control input-number" value=" {{$startBid}} "
                wire:model='startBid' min="1">

                    <span class="input-group-append">
                    <button type="button" class="btn btn-number" wire:click="increment">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="20"
                             height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="#9e9e9e" fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <line x1="12" y1="5" x2="12" y2="19"/>
                            <line x1="5" y1="12" x2="19" y2="12"/>
                        </svg>
                    </button>
                </span>
                </div>

            @endif

        </div>
        <div class="col-md-3 pad-media">
            @if ($product->status === \App\Models\Product::ACTIVE)
                <button type="submit" class="btn bid-btn" data-tooltip="Bid Now" wire:click='bid'>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cash" width="20"
                         height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="#ffffff" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <rect x="7" y="9" width="14" height="10" rx="2"/>
                        <circle cx="14" cy="14" r="2"/>
                        <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2"/>
                    </svg>
                </button>
            @endif
            <a class="toggleProductinWishlist btn wishlist-btn
            @if ( App\Models\User::productInWishlist($product->id)) wishlistActive @endif "
            href="#" data-product-id="{{$product -> id}}">
                {{-- <svg xmlns="http://www.w3.org/2000/svg"
                     class="icon icon-tabler icon-tabler-heart
                     @if ( App\Models\User::productInWishlist($product->id)) wishlistIconActive @endif "
                     data-product-icon-id="{{$product -> id}}"
                      width="16" height="16" viewBox="0 0 24 24" stroke-width="2.5" stroke="#597e8d" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                </svg> --}}
                <i class="far fa-heart @if ( App\Models\User::productInWishlist($product->id)) wishlistIconActive @endif "
                    data-product-icon-id="{{$product -> id}}"></i>
            </a>
        </div>

    </div>
    @if($errors->has('startBid'))
        <span class="alert-default-danger">{{ $errors->first('startBid') }}</span>
    @endif


</div>

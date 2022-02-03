<div>
    <p class="product-header--subtitle py-3">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if($isActive)
        Add your bid now!
        @endif
        </p>
        <div class="row">
            <div class="col-md-3">
                @if ($isActive)
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
            @else
            <span class="label--inactive">This product is Inctive</span>
            @endif

            </div>
            <div class="col-md-3 pad-media">
                @if ($isActive)
                    <button type="submit" class="btn bid-btn" title="Bid" wire:click='bid'>
                        <i style="color:white" class="fas fa-gavel"></i>
                    </button>
                    <a class="toggleProductinWishlist btn wishlist-btn
                @if ( App\Models\User::productInWishlist($product->id)) wishlistActive @endif "
                       href="#" data-product-id="{{$product -> id}}">
                        <i class="far fa-heart @if ( App\Models\User::productInWishlist($product->id)) wishlistIconActive @endif "
                           data-product-icon-id="{{$product -> id}}"></i>
                    </a>
                @endif

            </div>

        </div>
        @if($errors->has('startBid'))
            <span class="text-danger">{{ $errors->first('startBid') }}</span>
        @endif


</div>

<div>
    <div class="pad-ver">
        <div class="btn-group">
            <a class="btn btn-sm btn-light {{$likeButtonBackground}}" wire:click='click("1")'>
                <i class="fa fa-thumbs-up"></i> <span class="ml-1 likes-count"> {{$likeButtonCount}}</span>
            </a>
            <a class="btn btn-sm btn-light {{$disLikeButtonBackground}}" wire:click='click("-1")'>
                <i class="fa fa-thumbs-down"></i> <span class="ml-1 likes-count"> {{$disLikeButtonCount}}</span>
            </a>
        </div>

    </div>
</div>

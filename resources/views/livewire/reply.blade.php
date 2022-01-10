<div >
    @if ($isOwner)
    <textarea type="text" class="md-textarea" wire:model='reply'
    placeholder="Reply to {{$comment->user->account->full_name}}"></textarea>
    <a class="btn btn-sm btn-light" wire:click='reply'>Reply</a>
    @endif

      <hr>


      <!-- Replies -->
            @forelse ($replies as $reply)

            <div class="replies">
                <div class="media-block">
                  <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar2.png"></a>
                  <div class="media-body">
                    <div class="mar-btm ml-3">
                      <a href="#" class="btn-link text-semibold media-heading box-inline"> {{$reply->user->account->full_name}} </a>
                      <p class="text-muted text-sm"> {{$reply->created_at->diffForHumans()}}</p>
                    </div>
                    <p> {{$reply->body }} </p>
                    <hr>
                </div>
                </div>
            </div>

            @empty

            @endforelse
</div>

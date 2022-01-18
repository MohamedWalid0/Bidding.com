<div class="">
    <div class="form-group">
        <label class="add-product--label"  for="exampleInputPassword1">Comment</label>
        @error('comment') <span class="error">{{ $message }}</span> @enderror
        <textarea  cols="20" rows="2" wire:model.lazy='comment' class="form-control w-50" placeholder="Add you Comment"  ></textarea>
        <button type="button" class="btn btn-primary mt-2" wire:click='comment'>Add</button>
    </div>
    <div class="media-block">
        @forelse ($comments as $comment)
        <div class="comment">

            <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar1.png"></a>
            <div class="media-body">
              <div class="mar-btm ml-3">
                <a href="#" class="btn-link text-semibold media-heading box-inline">
                    {{$comment->user->account->full_name}}
                </a>
                <p class="text-muted text-sm"> {{$comment->created_at->diffForHumans()}}</p>
              </div>
              <p> {{$comment->body}} </p>
            @livewire('likable', ['modelType' => 'App\Models\Comment' , 'model' => $comment] ,  key(time().$comment->id))


                <livewire:reply :comment="$comment" :key="$comment->id">


            </div>

            </div>
        @empty

        @endforelse



      </div>

</div>

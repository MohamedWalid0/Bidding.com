<?php

namespace App\Observers;

use App\Models\Comment;
use App\Notifications\CommentAndReplyNotification;

class CommentObserver
{
    /**
     * Handle the Comment "created" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function created(Comment $comment)
    {
        $message = '%s Add new comment on your product %s';
        $comment->product()->withoutGlobalScopes()->first()->user->notify(new CommentAndReplyNotification($comment->product()->withoutGlobalScopes()->first() , $message));
    }

}

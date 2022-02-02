<?php

namespace App\Observers;

use App\Models\Reply;
use App\Notifications\CommentAndReplyNotification;

class ReplyObserver
{

    public function created(Reply $reply)
    {
        $message = '%s Reply to your comment on product %s';
        $reply->comment->user->notify(new CommentAndReplyNotification($reply->comment->product()->withoutGlobalScopes()->first(), $message));
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Reply;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ConversationBestReplyController extends Controller
{
    /**
     * @param Reply $reply
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(Reply $reply): RedirectResponse
    {
        /** @var Conversation $conversation */
        $conversation = $reply->conversation;

        $this->authorize('update', $conversation);
        $conversation->setBestReply($reply);

        return back();
    }
}

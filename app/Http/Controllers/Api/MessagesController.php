<?php

namespace App\Http\Controllers\Api;

use App\Events\MessageCreatePrivateEvent;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    /**
     * @param User    $receiver
     * @param Request $request
     *
     * @return mixed
     */
    public function createMessage(User $receiver, Request $request)
    {
        $params = $request->all();
        $me     = Auth::user();
        $message = Message::create($params);
        $message->sender()->associate($me);
        $message->receiver()->associate($receiver);
        $message->save();
        event(new MessageCreatePrivateEvent($message));
        return $message->toJson();
    }

    /**
     * @param User $user
     *
     * @return mixed
     */
    public function listMessages(User $user)
    {
        /** @var User $me */
        $me = Auth::user();
        return Message::related($me, $user)->with([
            'sender',
            'receiver',
        ])->orderBy('created_at', 'desc')->get();
    }
}

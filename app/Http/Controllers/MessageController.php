<?php

namespace App\Http\Controllers;

use App\Http\Requests\MsgIndexRequest;
use App\Services\Verbox\ChatMessageInterface;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{
    public function index(ChatMessageInterface $chatMessage, MsgIndexRequest $request)
    {
        $msgDate = Carbon::now();

        // dd($msgDate->format('Y-m-d H:i:s'), $msgDateEnd->format('Y-m-d H:i:s'));

        if (isset($request->validated()["msg_date"])) {
            $msgDate->modify($request->validated()["msg_date"]);
        };

        $msgDateEnd = Carbon::create($msgDate)->add(1, 'day');

        // dd(session('msg_date'));

        Session::put('msg_date', $msgDate);
        // dd(session('msg_date'));

        $msgList = $chatMessage->getList([
            "start" => $msgDate->format("Y-m-d H:i:s"),
            "stop" => $msgDateEnd->format("Y-m-d H:i:s")
        ]);

        // dd($msgList);

        return view('messages.index', compact('msgList', 'msgDate'));
    }
}

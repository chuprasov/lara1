<?php

namespace App\Http\Controllers;

use App\Http\Requests\MsgIndexRequest;
use App\Services\Verbox\ChatMessageInterface;
use Illuminate\Log\Logger;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function index(ChatMessageInterface $chatMessage, MsgIndexRequest $request)
    {
        $msgDate = Carbon::now();

        if (isset($request->validated()["msg_date"])) {
            $msgDate->modify($request->validated()["msg_date"]);
        };

        $msgDateEnd = Carbon::create($msgDate)->add(1, 'day');

        Log::info("Verbox message requested from $msgDate to $msgDateEnd");

        Session::put('msg_date', $msgDate);

        $msgList = $chatMessage->getList([
            "start" => $msgDate->format("Y-m-d H:i:s"),
            "stop" => $msgDateEnd->format("Y-m-d H:i:s")
        ]);

        return view('messages.index', compact('msgList', 'msgDate'));
    }
}

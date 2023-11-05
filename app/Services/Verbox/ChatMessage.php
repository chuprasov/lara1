<?php

namespace App\Services\Verbox;

use Illuminate\Support\Facades\Http;

class ChatMessage implements ChatMessageInterface
{
    public function getList(array $dateRange)
    {
        // dd($dateRange);
        $postInput = ['dateRange' => $dateRange];

        $headers = [
            'X-Token'  =>  config('verbox.x-token')
        ];

        $response = Http::accept('application/json')
            ->withHeaders($headers)
            ->post('https://admin.verbox.ru/json/v1.0/chat/message/getList', $postInput);

        return json_decode($response)->result;
    }
}

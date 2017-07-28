<?php

namespace App\Services\Discord;

use App\Models\Webhook;
use App\Services\Discord\Content\Message;
use GuzzleHttp\Client;

final class DiscordService
{
    public function send(Webhook $webhook, Message $message)
    {
        $client = new Client([
            'timeout' => 2.0,
        ]);

        $client->request('POST', $webhook->endpoint, [
            'json' => $message,
        ]);
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Webhook;
use App\Services\Discord\Content\Embed;
use App\Services\Discord\Content\Message;
use App\Services\Discord\DiscordService;
use Illuminate\Http\Request;

final class GitlabController extends Controller
{
    public function index(Request $request, DiscordService $service)
    {
        $key = $request->header('X-Gitlab-Token');
        /* @var Webhook $webhook */
        $webhook = Webhook::query()->where('secret', $key)->firstOrFail();

        if (is_null($webhook)) {
            return response('', 404);
        }

        $embed = (new Embed)->setTitle('Notifier message!')->setDescription('Notifier test!');
        $message = (new Message)->addEmbed($embed);

        $service->send($webhook, $message);

        return response()->json([]);
    }
}
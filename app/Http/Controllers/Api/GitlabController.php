<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Webhook;
use App\Services\Discord\DiscordService;
use App\Services\Gitlab\GitlabParser;
use Illuminate\Http\Request;

final class GitlabController extends Controller
{
    public function index(Request $request, DiscordService $service, GitlabParser $parser)
    {
        $key = $request->header('X-Gitlab-Token');
        $type = $request->header('X-Gitlab-Event');
        $payload = $request->json()->all();
        /* @var Webhook[] $webhooks */
        $webhooks = Webhook::query()->where('secret', $key)->get();

        if (is_null($webhooks) || empty($webhooks)) {
            return response('', 404);
        }

        $message = $parser->parse($type, $payload);
        foreach ($webhooks as $webhook) {
            $service->send($webhook, $message);
        }

        return response()->json([]);
    }
}
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
        /* @var Webhook $webhook */
        $webhook = Webhook::query()->where('secret', $key)->firstOrFail();

        if (is_null($webhook)) {
            return response('', 404);
        }

        $message = $parser->parse($type, $payload);
        $service->send($webhook, $message);

        return response()->json([]);
    }
}
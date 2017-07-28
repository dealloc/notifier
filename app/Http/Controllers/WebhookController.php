<?php

namespace App\Http\Controllers;

use App\Models\Webhook;
use Illuminate\Http\Request;

final class WebhookController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Webhook $webhook)
    {
        return view('home')->with([
            'webhooks' => $webhook->all(),
        ]);
    }

    public function new()
    {
        return view('webhooks.new');
    }
}

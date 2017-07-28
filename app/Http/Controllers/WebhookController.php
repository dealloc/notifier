<?php

namespace App\Http\Controllers;

use App\Models\Webhook;
use Illuminate\Http\Request;

final class WebhookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
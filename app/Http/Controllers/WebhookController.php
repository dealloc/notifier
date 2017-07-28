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
        return view('webhooks.index')->with([
            'webhooks' => $webhook->all(),
        ]);
    }

    public function new()
    {
        return view('webhooks.new');
    }

    public function create(Request $request)
    {
        $hook = new Webhook;
        $hook->name = $request->get('name');
        $hook->secret = $request->get('identifier');
        $hook->endpoint = $request->get('url');
        $hook->saveOrFail();

        $request->session()->flash('info', 'Webhook created!');
        return redirect()->route('home');
    }

    public function show(Webhook $webhook)
    {
        return view('webhooks.show')->with([
            'webhook' => $webhook,
        ]);
    }

    public function update(Request $request, Webhook $webhook)
    {
        $webhook->name = $request->get('name');
        $webhook->secret = $request->get('identifier');
        $webhook->endpoint = $request->get('url');
        $webhook->saveOrFail();

        $request->session()->flash('info', 'Webhook updated!');
        return redirect()->route('home');
    }
}

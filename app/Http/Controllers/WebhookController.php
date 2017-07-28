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

    public function create(Request $request)
    {
        $hook = new Webhook;
        $hook->name = $request->get('name');
        $hook->secret = $request->get('identifier');
        $hook->endpoint = $request->get('url');
        $hook->saveOrFail();

        return redirect()
            ->route('home')
            ->getSession()->flash('info', 'Webhook created!');
    }
}

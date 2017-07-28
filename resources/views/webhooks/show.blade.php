@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading clearfix">
						Update {{ $webhook->name }}
					</div>

					<div class="panel-body">
						<form method="POST" action="{{ route('hooks.update', $webhook) }}">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="name">Webhook name</label>
								<input name="name" value="{{ $webhook->name }}" class="form-control" id="name" placeholder="Webhook name" required>
							</div>
							<div class="form-group">
								<label for="url">Webhook URL</label>
								<input name="url" value="{{ $webhook->endpoint }}" class="form-control" id="url" placeholder="Webhook url" required>
							</div>
							<div class="form-group">
								<label for="identifier">Webhook identifier</label>
								<input name="identifier" value="{{ $webhook->secret }}" class="form-control" id="identifier" placeholder="Webhook identifier" aria-describedby="identifier-help" required>
								<span id="identifier-help" class="help-block">
									Notifier uses this to match incoming requests to the correct webhooks. Gitlab for example offers to send along a "secret" token.
								</span>
							</div>

							<button class="btn btn-info pull-right">update</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
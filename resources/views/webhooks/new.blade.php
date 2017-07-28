@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading clearfix">
						Create new webhook
					</div>

					<div class="panel-body">
						<form method="POST" action="{{ route('hooks.create') }}">
							<div class="form-group">
								<label for="name">Webhook name</label>
								<input name="name" class="form-control" id="name" placeholder="Webhook name">
							</div>
							<div class="form-group">
								<label for="url">Webhook URL</label>
								<input name="url" class="form-control" id="url" placeholder="Webhook url">
							</div>
							<div class="form-group">
								<label for="identifier">Webhook identifier</label>
								<input name="url" class="form-control" id="identifier" placeholder="Webhook identifier" aria-describedby="identifier-help">
								<span id="identifier-help" class="help-block">
									Notifier uses this to match incoming requests to the correct webhooks. Gitlab for example offers to send along a "secret" token.
								</span>
							</div>

							<button class="btn btn-success pull-right">create</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
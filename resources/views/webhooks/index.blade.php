@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading clearfix">
						Webhooks
						<a class="pull-right" href="{{ route('hooks.new') }}">Create new webhook</a>
					</div>

					<div class="panel-body">
						<ul class="list-group">
							@foreach ($webhooks as $webhook)
							<li class="list-group-item">
								{{ $webhook->name }}
								<a class="pull-right" href="{{ route('hooks.show', compact('webhook')) }}">edit</a>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

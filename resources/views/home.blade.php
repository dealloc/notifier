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
						webhooks go here
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

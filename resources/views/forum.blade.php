@extends('layouts.app')

@section('content')
            
	@foreach($discussions as $discussion)

		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-2">
						<img src="{{ asset($discussion->user->avatar) }}" class="img-responsive img-center" width="60px" height="60px">
						<p class="text-center" style="margin-top: 5px;">
							<em>{{ $discussion->user->name }}</em><br>
							<em><i class="fa fa-trophy"></i> Exp: {{ $discussion->user->points }}</em>
						</p>
					</div>
					<div class="col-sm-6">
						<p style="margin-top: 10px; font-size: 18px;" class="text-center">
							<strong>{{ $discussion->title }}</strong>
						</p>
					</div>

					<div class="col-sm-2">
						@if($discussion->hasBestAnswer())

							<p class="text center" style="margin-top: 15px;">
								<span class="label label-success">
									<i class="fa fa-check"></i> CLOSED
								</span>
							</p>

						@else 

							<p class="text center" style="margin-top: 15px;">
								<span class="label label-warning">
									<i class="fa fa-flag"></i> OPEN
								</span>
							</p>

						@endif
					</div>
					<div class="col-sm-2">
						<p class="text-center">
							<a href="{{ route('discussion', ['slug' => $discussion->slug]) }}" class="btn btn-primary" style="margin-top: 10px;">
								See more <i class="fa fa-angle-double-right"></i>
							</a>
						</p>
					</div>
				</div>
					
					
				
			</div>
			<div class="panel-body">
				<p style="font-size: 16px;">
					{{ str_limit($discussion->content, 255) }}
				</p>
			</div>

			<div class="panel-footer">
				<div class="row">
					<div class="col-xs-4">
						<p class="text-center">
							<strong>
								<i class="fa fa-clock-o"></i> 
								{{ $discussion->created_at->diffForHumans() }}
							</strong>
						</p>
					</div>
					<div class="col-xs-4">
						<p class="text-center">
							<strong>
								<i class="fa fa-comments"></i> 
								{{ $discussion->replies->count() }}
							</strong>
							
						</p>
					</div>
					<div class="col-xs-4">
						<p class="text-center">
							<a href="{{ route('channel', ['slug' => $discussion->channel->slug]) }}" style="text-decoration: none;">
								<strong>
									<i class="fa fa-bullhorn"></i>
									{{ $discussion->channel->title }}
								</strong>
							</a>
						</p>
					</div>
				</div>
			</div>
		</div>

	@endforeach

	<div class="text-center">
		{{ $discussions->links() }}
	</div>

@endsection

@extends('layouts.app')

@section('content')
        <div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-2">
						<img src="{{ asset($discussion->user->avatar) }}" alt="{{ $discussion->title }}" class="img-responsive img-center bordered" width="60px" height="60px">

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

					<div class="col-sm-2 text-center">
						@if($discussion->is_watched())
							
							<a href="{{ route('discussion.unwatch', ['id' => $discussion->id]) }}" class="btn btn-default" style="margin-top: 10px;">
								Unwatch <i class="fa fa-eye-slash"></i>
							</a>

						@else

							<a href="{{ route('discussion.watch', ['id' => $discussion->id]) }}" class="btn btn-default" style="margin-top: 10px;">
								Watch <i class="fa fa-eye"></i>
							</a>

						@endif
					</div>
				</div>
					
					
				
			</div>
			<div class="panel-body">

				<!-- Edit button -->
				@if(Auth::id() == $discussion->user->id)

					<p>
						<a href="{{ route('discussions.edit', ['slug' => $discussion->slug]) }}" class="btn btn-xs btn-info pull right">
							<i class="fa fa-pencil"></i> 
							Edit
						</a>
					</p>

				@endif

				<p>
					{!! Markdown::convertToHtml($discussion->content) !!}
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

		<h4>Answer(s)</h4>
		<hr>

		@if($best_answer)

			<h5>Best Answer</h5>

			<div class="panel panel-success">
				
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-4">
							<p> 
								<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
								 Voted as best 
							</p>
						</div>
						<div class="col-xs-2">
							<img src="{{ asset($best_answer->user->avatar) }}"  class="img-responsive img-center bordered" width="60px" height="60px">
						</div>
						<div class="col-xs-4">
							<p style="margin-top: 20px;">
								{{ $best_answer->user->name }}
							</p>
						</div>
						<div class="col-xs-2">
							<p class="text-center" style="margin-top: 20px;">
								<em>
									<i class="fa fa-trophy"></i> 
									Exp: {{ $best_answer->user->points }}
								</em>
							</p>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<p>
						{!! Markdown::convertToHtml($best_answer->content) !!}
					</p>
				</div>

			</div>

			<hr>

		@endif
		
		@foreach($discussion->replies as $reply)
			
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<img src="{{ asset($reply->user->avatar) }}" class="img-responsive img-center bordered" width="80px" height="80px">
						</div>
						<div class="col-xs-3">
							<p class="text-center" style="margin-top: 20px;">
								<em>{{ $reply->user->name }}</em>
							</p>
						</div>
						<div class="col-xs-6">
							<p class="text-center" style="margin-top: 20px;">
								<em>
									<i class="fa fa-trophy"></i> 
									Exp: {{ $reply->user->points }}
								</em>
							</p>
						</div>
					</div>
						
						
					
				</div>
				<div class="panel-body">
					<p>
						{!! Markdown::convertToHtml($reply->content) !!}
					</p>
				</div>

				<div class="panel-footer">
					<div class="row">
						<div class="col-xs-4">
							<p class="text-center">
								<strong><i class="fa fa-clock-o"></i> {{ $reply->created_at->diffForHumans() }}</strong>
							</p>
						</div>
						<div class="col-xs-4">
							@if($reply->is_liked_by_auth_user())
								<p class="text-center">
									<a href="{{ route('reply.unlike', ['id' => $reply->id]) }}" class="btn btn-warning btn-xs">
										<i class="fa fa-thumbs-down"></i> Unlike
									</a> &nbsp;
									<span class="badge">{{ $reply->likes->count() }}</span>
								</p>

							@else
								<p class="text-center">
									<a href="{{ route('reply.like', ['id' => $reply->id]) }}" class="btn btn-primary btn-xs">
										<i class="fa fa-thumbs-up"></i> Like 
									</a> &nbsp;
									<span class="badge">{{ $reply->likes->count() }}</span>
								</p>

							@endif
							
						</div>
						<div class="col-xs-4">
							<p class="text-center">
								@if(!$best_answer)
									
									@if(Auth::id() == $discussion->user->id)

										<a href="{{ route('discussion.best.answer', ['id' => $reply->id]) }}" class="btn btn-xs btn-success">
											<i class="fa fa-bomb"></i> Best answer
										</a> <br>

									@endif

								@endif

								@if(Auth::id() == $reply->user->id)

									@if(!$reply->best_answer)
								
										<a href="{{ route('replies.edit', ['id' => $reply->id ]) }}" class="btn btn-info btn-xs">
											Edit reply
										</a>

									@endif

								@endif
							</p>
						</div>
					</div>
				</div>
			</div>
		
		@endforeach
		
		@if(Auth::check())

			<h4>Leave a reply</h4>
			<hr>
			<div class="panel panel-defalut">
				<div class="panel-heading">
					Leave your opinion below
				</div>
				<div class="panel panel-body">
					<form action="{{ route('discussion.reply', ['id' => $discussion->id]) }}" method="post">

						{{ csrf_field() }}

						<div class="form-group">
							<textarea name="reply" id="reply" cols="6" rows="6" class="form-control"></textarea>
						</div>

						<div class="form-group">
							<p class="text-center">
								<button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane"></i> Leave a reply</button>
							</p>
						</div>

					</form>
				</div>
			</div>

		@else
		
			<div class="text-center" style="padding: 50px 10px;">
				<h3>
					<em>
						<a href="/login"><i class="fa fa-sign-in"></i> Sign in</a> to leave a reply.
					</em>
				</h3>
			</div>
			
		@endif

@endsection

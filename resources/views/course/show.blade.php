@extends('layouts.app')
@section('content')
<h2>{{$course->name}} {{$course->credit}} credits</h2><br>
<p>{{$course->description}}</p><br>
<p>Teacher: {{$course->teacher_name}}</p><br>
<p>Starting date: {{$course->start_date}}</p><br>
<p>Ending date: {{$course->end_date}}</p><br>

@if ($course->user_id == Auth::user()->id || Gate::allows('is-moderator'))

{{ Form::open(['method' => 'get', 'action' => ['CourseController@edit', $course->id]]) }}
	{{ Form::submit('Edit', ['class' => 'btn btn-default']) }}
{{ Form::close() }}

{{ Form::open(['method' => 'delete', 'action' => ['CourseController@destroy', $course->id]]) }}
	{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
{{ Form::close() }}

@endif

<hr>

@include('layouts/errors')
<div id="app"></div>
<div class="card">
	<div class="card-block">
		{{ Form::open(['method' => 'post', 'action' => ['CommentsController@store', $course->id]]) }}
			<div class="form-group">
				<textarea name="body" placeholder="Your comment here." class="form-control" required></textarea>
			</div>
			<div class="form-group">
			{{ Form::submit('Add comment', ['class' => 'btn btn-primary']) }}
			</div>
		{{ Form::close() }}
	</div>
</div>

<div class="comments">
	@foreach ($course->comments as $comment)
		<li class="list-group-item">
			<strong>
				{{ $comment->created_at->diffForHumans() }}
			</strong>
			{{ $comment->body }}
		</li>
	@endforeach
</div>





@endsection
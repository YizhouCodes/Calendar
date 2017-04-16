@extends('layouts.app')
@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

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


<div id="root">
	<div class="card">
		<div class="card-block">
			<form method="post" action="/course/{{ $course->id }}/comments" @submit.prevent="onSubmit">
				<input type="hidden" name="course" value="{{$course->id}}"></input>
				<div class="form-group">
					<textarea name="body" placeholder="Your comment here." class="form-control" required v-model="body"></textarea>
				</div>
				<div class="form-group">
					<button class="btn btn-primary">Add comment</button>
				</div>
			</form>
		</div>
	</div>
	
	<div id="comments">
		@foreach ($course->comments as $comment)
			@include('comments/show');
		@endforeach
	</div>
</div>




@endsection
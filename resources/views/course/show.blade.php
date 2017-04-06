@extends('layouts.app')
@section('content')
<h2>{{$course->name}} {{$course->credit}} credits</h2><br>
	<p>{{$course->description}}</p><br>
	<p>Teacher: {{$course->teacher_name}}</p><br>
	<p>Starting date: {{$course->start_date}}</p><br>
	<p>Ending date: {{$course->end_date}}</p><br>
{{ Form::open(['method' => 'delete', 'action' => ['CourseController@destroy', $course->id]]) }}
	{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
{{ Form::close() }}
@endsection
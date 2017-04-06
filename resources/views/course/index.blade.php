@extends('layouts.app')
@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<ul>
	@foreach ($courses as $course)
		<li>
			<h2><a href="/course/{{$course->id}}">{{$course->name}}</a> {{$course->credit}} credits</h2><br>
			<p>{{$course->description}}</p><br>
			<p>Teacher: {{$course->teacher_name}}</p><br>
			<p>Starting date: {{$course->start_date}}</p><br>
			<p>Ending date: {{$course->end_date}}</p>
		</li>
	@endforeach
</ul>

@endsection

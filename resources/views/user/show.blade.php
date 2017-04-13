@extends('layouts.app')
@section('content')
<h2>{{$user->name}}</h2><br>
	<p>Email: {{$user->email}}</p><br>
	<form action="">
			<label>Roles:</label><br>
			<input type="checkbox" name="admin" disabled @if (Gate::forUser($user)->allows('show-users')) checked @endif>Admin<br>
			<input type="checkbox" name="moderator" disabled @if (Gate::forUser($user)->allows('is-moderator')) checked @endif>Moderator<br>
			<input type="checkbox" name="student" disabled @if (Gate::forUser($user)->allows('is-student')) checked @endif>Student<br>
	</form>
{{ Form::open(['method' => 'get', 'action' => ['UserController@edit', $user->id]]) }}
	{{ Form::submit('Edit', ['class' => 'btn btn-default']) }}
{{ Form::close() }}
{{ Form::open(['method' => 'delete', 'action' => ['UserController@destroy', $user->id]]) }}
	{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
{{ Form::close() }}

@endsection
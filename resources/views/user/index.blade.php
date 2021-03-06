@extends('layouts.app')
@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<ul>
	@foreach ($users as $user)
		<li>
			<h2><a href="/users/{{$user->id}}">{{$user->name}}</a></h2><br>
			<p>Email: {{$user->email}}</p><br>
			<form action="">
				<label>Roles:</label><br>
				<input type="checkbox" name="admin" value="admin" disabled @if (Gate::forUser($user)->allows('is-admin')) checked @endif>Admin<br>
				<input type="checkbox" name="moderator" value="moderator" disabled @if (Gate::forUser($user)->allows('is-moderator')) checked @endif>Moderator<br>
				<input type="checkbox" name="student" value="student" disabled @if (Gate::forUser($user)->allows('is-student')) checked @endif>Student<br>
			</form>

		</li>
	@endforeach
</ul>

@endsection

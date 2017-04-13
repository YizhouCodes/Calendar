@extends('layouts.app')
@section('content')
@include('layouts/errors')

<form action="/users/update" method="post">
  {{ csrf_field() }}
  <input type="hidden" name="id" value={{ $user->id }}>
  User name: <input type="text" name="name" required value={{ $user->name }}><br>
  Email: <input type="text" name="email" required value={{ $user->email }}><br>
  <input type="checkbox" name="admin" @if (Gate::forUser($user)->allows('show-users')) checked @endif>Admin<br>
  <input type="checkbox" name="moderator" @if (Gate::forUser($user)->allows('is-moderator')) checked @endif>Moderator<br>
  <input type="checkbox" name="student" @if (Gate::forUser($user)->allows('is-student')) checked @endif>Student<br>
  <input type="submit" value="Confirm changes">
</form>

@endsection
@extends('layouts.app')
@section('content')
@include('layouts/errors')

<form action="/" method="post">
  {{ csrf_field() }}
  Course name: <input type="text" name="name" required><br>
  Description: <input type="text" name="description" required><br>
  Credits: <input type="number" name="credit" required><br>
  Teacher's name: <input type="text" name="teacher_name" required><br>
  Starting date: <input type="date" name="start_date" required><br>
  Ending date: <input type="date" name="end_date" required><br>
  <input type="submit" value="Submit">
</form>
@endsection

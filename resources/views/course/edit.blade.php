@extends('layouts.app')
@section('content')
@include('layouts/errors')

<form action="/course/update" method="post">
  {{ csrf_field() }}
  <input type="hidden" name="id" value={{ $course->id }}>
  Course name: <input type="text" name="name" required value={{ $course->name }}><br>
  Description: <input type="text" name="description" required value={{ $course->description }}><br>
  Credits: <input type="number" name="credit" required value={{ $course->credit }}><br>
  Teacher's name: <input type="text" name="teacher_name" required value={{ $course->teacher_name }}><br>
  Starting date: <input type="date" name="start_date" required value={{ $course->start_date}}><br>
  Ending date: <input type="date" name="end_date" required value={{ $course->end_date }}><br>
  <input type="submit" value="Confirm changes">
</form>
@endsection

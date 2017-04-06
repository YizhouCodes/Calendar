@extends('layouts.app')
@section('content')
<form action="/" method="post">
  {{ csrf_field() }}
  Course name: <input type="text" name="name"><br>
  Description: <input type="text" name="description"><br>
  Credits: <input type="number" name="credit"><br>
  Teacher's name: <input type="text" name="teacher_name"><br>
  Starting date: <input type="date" name="start_date"><br>
  Ending date: <input type="date" name="end_date"><br>
  <input type="submit" value="Submit">
</form>
@endsection

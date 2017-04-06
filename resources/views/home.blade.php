@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
            <a href="{{ url('/') }}" class="btn btn-primary">
                Back to homepage.
            </a>
        </div>
    </div>
</div>
@endsection

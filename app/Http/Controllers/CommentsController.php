<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreComment;

use App\Course;

use App\Comment;


class CommentsController extends Controller
{
    public function store(Course $course, StoreComment $request) {
    	$comment = $course->comments()->create([
    		'body' => request('body'),
    		'user_id' => $request->user()->id,
    	]);

    	return view('comments.show')->with(compact('comment'));
    }

}

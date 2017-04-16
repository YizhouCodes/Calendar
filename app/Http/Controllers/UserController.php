<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;

use App\User;

use App\Comment;

use App\Course;

use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function index() {
    	$users = User::all();
    	return view('user.index')->with(compact('users'));
    }

    public function show(User $user) {
    	return view('user.show')->with(compact('user'));
    }

    public function destroy(User $user) {
        while (Comment::where('user_id', '=', $user->id)->get()->isNotEmpty()) {
            Comment::where('user_id', '=', $user->id)->first()->delete();
        }
        while (Course::where('user_id', '=', $user->id)->get()->isNotEmpty()) {
            Course::where('user_id', '=', $user->id)->first()->delete();
        }
        User::where('id', '=', $user->id)->first()->delete();

    	return redirect()->action('UserController@index')->with('status', 'User deleted!');
    }

    public function edit(User $user) {
    	return view('user.edit')->with(compact('user'));
    }

    public function save_update(StoreUser $request) {
    	$id = Input::get('id');
    	$user = User::where('id', '=', $id)->first();
    	$user->update($request->all());


    	if (Input::get('admin') == 'on' && $user->roles->find(1) == null) {
    		$user->roles()->attach(1);
    	} else if (Input::get('admin') != 'on' && $user->roles->find(1) != null) {
    		$user->roles()->detach(1);
    	}

    	if (Input::get('moderator') == 'on' && $user->roles->find(2) == null) {
    		$user->roles()->attach(2);
    	} else if (Input::get('moderator') != 'on' && $user->roles->find(2) != null) {
    		$user->roles()->detach(2);
    	}

    	if (Input::get('student') == 'on' && $user->roles->find(3) == null) {
    		$user->roles()->attach(3);
    	} else if (Input::get('student') != 'on' && $user->roles->find(3) != null) {
    		$user->roles()->detach(3);
    	}

    	return redirect()->action('UserController@index')->with('status', 'User edited!');
    }
}

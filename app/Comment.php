<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	protected $fillable = [
    	'body', 'user_id'
    ];

    public function course() {
    	return $this->belongsTo('App\Course');
    }

    public function user() {
    	return $this->hasOne('App\User');
    }
}

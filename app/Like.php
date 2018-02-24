<?php

namespace App;
use App\User;
use App\Reply;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
	protected $fillable = ['reply_id', 'user_id'];

    public function user() {

    	return $this->belongsTo('App\User');
    }

    public function reply() {

    	return $this->belongsTo('App\Reply');
    }
}

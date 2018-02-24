<?php

namespace App;

use App\Channel;
use App\User;
use App\Reply;
use App\Watcher;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable = ['title', 'content', 'user_id', 'channel_id', 'slug'];

    public function channel() {

    	return $this->belongsTo('App\Channel');
    }

    public function user() {

    	return $this->belongsTo('App\User');
    }

    public function replies() {

    	return $this->hasMany('App\Reply');
    }


    //Watchers

    public function watchers() {

        return $this->hasMany('App\Watcher');
    }

    public function is_watched() {

        $id = Auth::id();

        $watchers_id = array();

        foreach($this->watchers as $watcher):

            array_push($watchers_id, $watcher->user_id);

        endforeach;

        if(in_array($id, $watchers_id)) {

            return true;

        } else {

            return false;
        }

    }


    public function hasBestAnswer() {

        $hasBest = false;

        foreach($this->replies as $reply):

            if($reply->best_answer) {

                $hasBest = true;

                break;
            }

        endforeach; 

        return $hasBest;
    }

}

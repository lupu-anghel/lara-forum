<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\User;
use App\Discussion;
use Notification;
use App\Reply;
use Illuminate\Http\Request;

class DiscussionsController extends Controller
{
   

   public function create() {

   		return view('discuss');
   }

   public function store(Request $request) {

   	$this->validate($request, [

   		'channel_id' => 'required',
   		'title' => 'required',
   		'content' => 'required'
   	]);

   	$discussion = Discussion::create([

   		'channel_id' => $request->channel_id,
   		'title' => $request->title,
   		'content' => $request->content,
   		'user_id' => Auth::id(),
   		'slug' => str_slug($request->title)
   	]);

   	Session::flash('success', 'Your discussion was created!');

   	return redirect()->route('discussion', ['slug' => $discussion->slug]);
   }

   public function show($slug) {

         $discussion = Discussion::where('slug', $slug)->first();

         $best_answer = $discussion->replies()->where('best_answer', 1)->first();

   		return view('discussions.show')->with('discussion', $discussion)->with('best_answer', $best_answer);
   }

   public function reply($id) {

      $discussion = Discussion::find($id);


      $reply = Reply::create([

         'user_id' => Auth::id(),
         'discussion_id' => $id,
         'content' => request()->reply

      ]);

      $reply->user->points += 25;

      $reply->user->save();

       $watchers = array();

      foreach($discussion->watchers as $watcher):

         array_push($watchers, User::find($watcher->user_id));

      endforeach;

      Notification::send($watchers, new \App\Notifications\NewReplyAdded($discussion));

      Session::flash('success', 'Your reply has been posted.');

      return redirect()->back();
   }

   public function edit($slug) {

      return view('discussions.edit', ['discussion' => Discussion::where('slug', $slug)->first() ]);
   }

   public function update($id) {

      $this->validate(request(), [

         'content' => 'required'
      ]);

      $discussion = Discussion::find($id);

      $discussion->content = request()->content;

      $discussion->save();

      Session::flash('success', 'Your discussion has been updated.');

      return redirect()->route('discussion', ['slug' => $discussion->slug]);
   }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PlanRequest;
use Image;


class CommentController extends Controller
{
    public function comment(Request $requset)
    {
    	$comment = new Comment ;
    	$comment->user_id = Auth::id();
    	$comment->plan_id = $requset->plan_id;
    	$comment->message = $requset->message;
    	$comment->images = "0" ;
    	$comment->save();
    	return redirect()->route('plan',$requset->plan_id);
    }

    public function reply(Request $requset)
    {
    	$comment = new Comment ;
    	$comment->user_id = Auth::id();
    	$comment->plan_id = $requset->plan_id;
    	$comment->comment_id = $requset->comment_id;
    	$comment->message = $requset->message;
    	$comment->images = "0" ;
    	$comment->save();
    	return redirect()->route('plan',$requset->plan_id);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\ImageComment;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PlanRequest;
use Image;


class CommentController extends Controller
{
    public function comment(Request $request)
    {
    	$comment = new Comment ;
    	$comment->user_id = Auth::id();
    	$comment->plan_id = $request->plan_id;
    	$comment->message = $request->message;
    	$comment->save();

        if($request->hasFile('images')) {
            foreach ($request->images as $images) {
                $filename = time().$images->getClientOriginalName();
                Image::make($images)->resize(300, 300)->save( public_path('/comment_image/'.$filename));
                $images = new ImageComment;
                $images->comment_id = $comment->id;
                $images->image_name = $filename;
                $images->save();
            }
        }
    	return redirect()->route('plan',$request->plan_id);
    }

    public function reply(Request $request)
    {
    	$comment = new Comment ;
    	$comment->user_id = Auth::id();
    	$comment->plan_id = $request->plan_id;
    	$comment->reply_id = $request->comment_id;
    	$comment->message = $request->message;
    	$comment->save();
    	return redirect()->route('plan',$request->plan_id);
    }
}

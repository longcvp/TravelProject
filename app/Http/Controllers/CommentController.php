<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\ImageComment;
use App\Comment;
use Illuminate\Support\Facades\Auth;
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

    public function DeleteComment(Request $request)
    {
        $del_comment = Comment::find($request->id)->delete();
        $reply = Comment::where('reply_id',$request->id)->get();
        foreach ($reply as $key => $value) {
            $del_reply = Comment::find($value->id)->delete();
            $del_img = ImageComment::where('comment_id',$value->id)->delete();
        }
        $del_img = ImageComment::where('comment_id',$request->id)->delete();
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

        if($request->hasFile('image')) {
            foreach ($request->image as $image) {
                $filename = time().$image->getClientOriginalName();
                Image::make($image)->resize(300, 300)->save( public_path('/comment_image/'.$filename));
                $images = new ImageComment;
                $images->comment_id = $comment->id;
                $images->image_name = $filename;
                $images->save();
            }
        }
    	return redirect()->route('plan',$request->plan_id);
    }

    public function deleteReply(Request $request)
    {
        $del_reply = Comment::find($request->id)->delete();
        $del_img = ImageComment::where('comment_id',$request->id)->delete();
        return redirect()->route('plan',$request->plan_id);
    }
}

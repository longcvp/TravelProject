<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use App\Follow;
use App\ImageComment;
use App\Join;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;

class PlanController extends Controller
{
 
    public function showPlan($id)
    {   
        $user_id = Trip::where('id',$id)->value('owner_id');
        if ($user_id == Auth::id()) {
            $image_comment = ImageComment::all();
            $users_id_comment = array();
            $comments = Trip::find($id)->comment_info->where('reply_id',null);
            foreach ($comments as $key => $value) {
                $users_id_comment[] = $value->user_id;
            }
            $users_id_comment = array_unique($users_id_comment);
            $users_comment = array();
            foreach ($users_id_comment as $value) {
                    $users_comment[] = User::find($value);
                }            
            $users_id_reply = array();
            $reply = Trip::find($id)->comment_info->where('reply_id','<>',null);
            foreach ($reply as $key => $value) {
                $users_id_reply[] = $value->user_id;
            }
            $users_id_reply = array_unique($users_id_reply);
            $users_reply = array();
            foreach ($users_id_reply as $value) {
                    $users_reply[] = User::find($value);
                }
            $plan_host = Trip::where('id',$id)->get();
            return view('plan.host',['plan_host' => $plan_host,'comments' => $comments,'reply' => $reply,'image_comment' => $image_comment,'users_comment' => $users_comment,'users_reply' => $users_reply]);
        }
        else {
            $image_comment = ImageComment::all();
            $users_id_comment = array();
            $comments = Trip::find($id)->comment_info->where('reply_id',null);
            foreach ($comments as $key => $value) {
                $users_id_comment[] = $value->user_id;
            }
            $users_id_comment = array_unique($users_id_comment);
            $users_comment = array();
            foreach ($users_id_comment as $value) {
                    $users_comment[] = User::find($value);
                }            
            $users_id_reply = array();
            $reply = Trip::find($id)->comment_info->where('reply_id','<>',null);
            foreach ($reply as $key => $value) {
                $users_id_reply[] = $value->user_id;
            }
            $users_id_reply = array_unique($users_id_reply);
            $users_reply = array();
            foreach ($users_id_reply as $value) {
                    $users_reply[] = User::find($value);
                }
            $check_join = Join::where('user_id',Auth::id())->where('plan_id',$id)->value('join');
            $check_follow = Follow::where('user_id',Auth::id())->where('plan_id',$id)->value('follow');
            $away = Trip::where('id',$id)->get();
            return view('plan.away',['away' => $away,'check_join' => $check_join, 'check_follow' => $check_follow,'comments' => $comments,'reply' => $reply,'image_comment' => $image_comment,'users_comment' => $users_comment,'users_reply' => $users_reply]);
        }
    }

    public function showEditPlan($id)
    {
        $user_id = Trip::where('id',$id)->value('owner_id');
        if ($user_id == Auth::id()) {
    	   $plan_host = Trip::where('id',$id)->get();
    	   return view('plan.edit_plan',['plan_host' => $plan_host]);
        }
        else
            return redirect()->back();
    }

    public function showListPlan($id)
    {
        $user_id = Trip::where('id',$id)->value('owner_id');
        if ($user_id == Auth::id()) {
            $users_id = array();
            $join = Trip::find($id)->joins;
            foreach ($join as $key => $join) {
                $users_id[] = $join->user_id;
            }
            $users = array();
            foreach ($users_id as $value) {
                $users[] = User::find($value);
            }
            $joins = Join::where('plan_id',$id)->select('user_id','join')->get();
            $plan = Trip::where('id',$id)->get();
            return view('plan.list',['plan' => $plan,'users' => $users,'joins' => $joins]); 
        }
        else 
            return redirect()->back();
    }
    public function storeCover(Request $request)
    {
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $filename = time().'.'.$cover->getClientOriginalExtension();
            Image::make($cover)->resize(500, 500)->save( public_path().'/image/cover/'.$filename);

            $user = Trip::where('id',$request->plan_id)->update([
                'cover' => "image/cover/".$filename,
            ]);

        }
        return redirect()->route('plan',$request->plan_id);
    }
}

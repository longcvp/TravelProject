<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Follow;
use App\ImageComment;
use App\Join;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PlanRequest;
use Image;

class PlanController extends Controller
{
    public function showCreatePlan()
    {
    	return view('plan.create');
    }

    public function showPlan($id)
    {   
        $user_id = Plan::where('id',$id)->value('user_id');
        if ($user_id == Auth::id()) {
            $image_comment = ImageComment::all();
            $users_id_comment = array();
            $comments = Plan::find($id)->comment_info->where('reply_id',null);
            foreach ($comments as $key => $value) {
                $users_id_comment[] = $value->user_id;
            }
            $users_id_comment = array_unique($users_id_comment);
            $users_comment = array();
            foreach ($users_id_comment as $value) {
                    $users_comment[] = User::find($value);
                }            
            $users_id_reply = array();
            $reply = Plan::find($id)->comment_info->where('reply_id','<>',null);
            foreach ($reply as $key => $value) {
                $users_id_reply[] = $value->user_id;
            }
            $users_id_reply = array_unique($users_id_reply);
            $users_reply = array();
            foreach ($users_id_reply as $value) {
                    $users_reply[] = User::find($value);
                }
            $plan_host = Plan::where('id',$id)->get();
            return view('plan.host',['plan_host' => $plan_host,'comments' => $comments,'reply' => $reply,'image_comment' => $image_comment,'users_comment' => $users_comment,'users_reply' => $users_reply]);
        }
        else {
            $image_comment = ImageComment::all();
            $users_id_comment = array();
            $comments = Plan::find($id)->comment_info->where('reply_id',null);
            foreach ($comments as $key => $value) {
                $users_id_comment[] = $value->user_id;
            }
            $users_id_comment = array_unique($users_id_comment);
            $users_comment = array();
            foreach ($users_id_comment as $value) {
                    $users_comment[] = User::find($value);
                }            
            $users_id_reply = array();
            $reply = Plan::find($id)->comment_info->where('reply_id','<>',null);
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
            $away = Plan::where('id',$id)->get();
            return view('plan.away',['away' => $away,'check_join' => $check_join, 'check_follow' => $check_follow,'comments' => $comments,'reply' => $reply,'image_comment' => $image_comment,'users_comment' => $users_comment,'users_reply' => $users_reply]);
        }
    }

    public function showEditPlan($id)
    {
        $user_id = Plan::where('id',$id)->value('user_id');
        if ($user_id == Auth::id()) {
    	   $plan_host = Plan::where('id',$id)->get();
    	   return view('plan.edit_plan',['plan_host' => $plan_host]);
        }
        else
            return redirect()->back();
    }

    public function showListPlan($id)
    {
        $user_id = Plan::where('id',$id)->value('user_id');
        if ($user_id == Auth::id()) {
            $users_id = array();
            $join = Plan::find($id)->joins;
            foreach ($join as $key => $join) {
                $users_id[] = $join->user_id;
            }
            $users = array();
            foreach ($users_id as $value) {
                $users[] = User::find($value);
            }
            $joins = Join::where('plan_id',$id)->select('user_id','join')->get();
            $plan = Plan::where('id',$id)->get();
            return view('plan.list',['plan' => $plan,'users' => $users,'joins' => $joins]); 
        }
        else 
            return redirect()->back();
    }

    public function createPlan(PlanRequest $req)
    {
    		$plan = new Plan;
    		$plan->user_id = $req->user_id;
    		$plan->plan_name = $req->name;
    		$plan->start_time = $req->start_time;
    		$plan->end_time = $req->finish_time;
    		$plan->status = 1;
    		$plan->cover_image = 'default.jpg';
    		$plan->max_people = $req->number;
    		$plan->joined = 1;
    		$plan->followed = 0;
    		$plan->comments = 0;
    		$plan->save();
    		return redirect('/home');
    }

    public function storeCover(Request $req)
    {
    	if ($req->hasFile('cover')) {
    		$cover = $req->file('cover');
    		$filename = time().'.'.$cover->getClientOriginalExtension();
    		Image::make($cover)->resize(500, 500)->save( public_path('/coverplan/'.$filename));

    		$plan = Plan::where('id',$req->plan_id)->update([
    			'cover_image' => $filename,
    		]);

    	}
    	return redirect()->back();

    }

    public function editPlan(PlanRequest $request)
    {
    	$plan = Plan::where('id',$request->plan_id)->update([
    		'plan_name' => $request->name,
    		'start_time' => $request->start_time,
    		'end_time' => $request->finish_time,
    		'status' => $request->status,
    		'max_people' => $request->number,
    	]);
    	return redirect()->route('plan',$request->plan_id)->with('success','The Plan update successfull');
    }

}

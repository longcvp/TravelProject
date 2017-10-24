<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Follow;
use App\ImageComment;
use App\Join;
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
            $comments = DB::table('comments')
                ->join('users', 'comments.user_id', '=', 'users.id')
                ->select('comments.*','users.name','users.avatar_image')
                ->where('comments.plan_id',$id)
                ->whereNull('comments.reply_id')
                ->orderBy('comments.created_at','asc')
                ->get();
            $reply = DB::table('comments')
                ->join('users', 'comments.user_id', '=', 'users.id')
                ->select('comments.*','users.name','users.avatar_image')
                ->where('comments.plan_id',$id)
                ->whereNotNull('comments.reply_id')
                ->orderBy('comments.created_at','asc')
                ->get();
            $plan_host = Plan::where('id',$id)->get();
            return view('plan.host',['plan_host' => $plan_host,'comments' => $comments,'reply' => $reply,'image_comment' => $image_comment]);
        }
        else {
            $image_comment = ImageComment::all();
            $comments = DB::table('comments')
                ->join('users', 'comments.user_id', '=', 'users.id')
                ->select('comments.*','users.name','users.avatar_image')
                ->where('comments.plan_id',$id)
                ->whereNull('comments.reply_id')
                ->orderBy('comments.created_at','asc')
                ->get();
            $reply = DB::table('comments')
                ->join('users', 'comments.user_id', '=', 'users.id')
                ->select('comments.*','users.name','users.avatar_image')
                ->where('comments.plan_id',$id)
                ->whereNotNull('comments.reply_id')
                ->orderBy('comments.created_at','asc')
                ->get();
            $check_join = Join::where('user_id',Auth::id())->where('plan_id',$id)->value('join');
            $check_follow = Follow::where('user_id',Auth::id())->where('plan_id',$id)->value('follow');
            $away = Plan::where('id',$id)->get();
            return view('plan.away',['away' => $away,'check_join' => $check_join, 'check_follow' => $check_follow,'comments' => $comments,'reply' => $reply,'image_comment' => $image_comment]);
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
            $users = DB::table('users')
                ->join('joins', 'users.id', '=', 'joins.user_id')
                ->select('users.*','joins.join')
                ->where('joins.plan_id',$id)
                ->get();
            $plan = Plan::where('id',$id)->get();
            return view('plan.list',['plan' => $plan,'users' => $users]); 
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
    	return redirect()->route('host',$request->plan_id)->with('success','The Plan update successfull');
    }

}

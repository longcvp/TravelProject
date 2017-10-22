<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Follow;
use App\Join;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PlanRequest;
use Image;

class FollowController extends Controller
{
    public function followPlan(Request $request)
    {
    	$check = Follow::where('user_id',Auth::id())->where('plan_id',$request->plan_id)->value('follow');
    	if ( is_null($check )) {
    		$follow = new Follow;
    		$follow->user_id = Auth::id();
    		$follow->plan_id = $request->plan_id;
    		$follow->follow  = 1;
    		$follow->save();

    		$plan = Plan::where('id',$request->plan_id)->update([
    			'followed' => Plan::where('id',$request->plan_id)->value('followed') + 1,
    		]);

    		return redirect()->route('plan',$request->plan_id);
    	}
    	else
    		return redirect()->route('plan',$request->plan_id);
    }
}

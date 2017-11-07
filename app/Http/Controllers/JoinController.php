<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use App\Follow;
use App\Join;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PlanRequest;
use Image;

class JoinController extends Controller
{
	public function joinPlan(Request $request)
    {
    	$check_join = Join::where('user_id',Auth::id())->where('plan_id',$request->plan_id)->value('join');
        $check_follow = Follow::where('user_id',Auth::id())->where('plan_id',$request->plan_id)->value('follow');
        if ( is_null($check_follow )) {
            $follow = new Follow;
            $follow->user_id = Auth::id();
            $follow->plan_id = $request->plan_id;
            $follow->follow  = 1;
            $follow->save();
            $trip = Trip::where('id',$request->plan_id)->update([
                'followed' => Trip::where('id',$request->plan_id)->value('followed') + 1,
                ]);
        }   
    	if ( is_null($check_join )) {
    		$join = new Join;
    		$join->user_id = Auth::id();
    		$join->plan_id = $request->plan_id;
    		$join->join  = 1;
    		$join->save();

    		return redirect()->route('plan',$request->plan_id);
    	}
    	else
    		return redirect()->route('plan',$request->plan_id);
    }

    public function unjoinPlan(Request $request)
    {
        $unjoin = Join::where('user_id',Auth::id())->where('plan_id',$request->plan_id)->delete();
        $check_follow = Follow::where('user_id',Auth::id())->where('plan_id',$request->plan_id)->value('follow');
        if ( is_null($check_follow )) {
            return redirect()->route('plan',$request->plan_id);
            $trip = Trip::where('id',$request->plan_id)->update([
                'joined' => Trip::where('id',$request->plan_id)->value('joined') - 1,
                ]);
        }
        else {
            $unfollow = Follow::where('user_id',Auth::id())->where('plan_id',$request->plan_id)->delete();
            $trip = Trip::where('id',$request->plan_id)->update([
                'followed' => Trip::where('id',$request->plan_id)->value('followed') - 1,
                ]);
            return redirect()->route('plan',$request->plan_id);
        }

    }

    public function accept(Request $request)
    {   
        $user_id = Trip::where('id',$request->plan_id)->value('owner_id');
        if (Auth::id() == $user_id) {
            $join = Join::where('user_id',$request->users_id)->where('plan_id',$request->plan_id)->update([
                'join' => 2,
                    ]);

    		$plan = Trip::where('id',$request->plan_id)->update([
    			'joined' => Trip::where('id',$request->plan_id)->value('joined') + 1,
    		]);
    		
            return redirect()->route('list',$request->plan_id);
        }
        else
            return redirect('/home');
    }

    public function deny(Request $request)
    {   
        $user_id = Trip::where('id',$request->plan_id)->value('owner_id');
        if (Auth::id() == $user_id) {
            $join = Join::where('user_id',$request->users_id)->where('plan_id',$request->plan_id)->delete();
            return redirect()->route('list',$request->plan_id);
        }
        else
            return redirect('/home');
    }

    public function delete(Request $request)
    {   
        $user_id = Trip::where('id',$request->plan_id)->value('owner_id');
        if (Auth::id() == $user_id) {
            $join = Join::where('user_id',$request->users_id)->where('plan_id',$request->plan_id)->delete();
            return redirect()->route('list',$request->plan_id);
        }
        else
            return redirect('/home');
    }
}

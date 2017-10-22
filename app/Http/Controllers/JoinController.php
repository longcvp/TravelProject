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

class JoinController extends Controller
{
	public function joinPlan(Request $request)
    {
    	$check = Join::where('user_id',Auth::id())->where('plan_id',$request->plan_id)->value('join');
    	if ( is_null($check )) {
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

    public function accept(Request $request)
    {   
        $user_id = Plan::where('id',$request->plan_id)->value('user_id');
        if (Auth::id() == $user_id) {
            $join = Join::where('user_id',$request->users_id)->where('plan_id',$request->plan_id)->update([
                'join' => 2,
                    ]);

    		$plan = Plan::where('id',$request->plan_id)->update([
    			'joined' => Plan::where('id',$request->plan_id)->value('joined') + 1,
    		]);
    		
            return redirect()->route('list',$request->plan_id);
        }
        else
            return redirect('/home');
    }

    public function deny(Request $request)
    {   
        $user_id = Plan::where('id',$request->plan_id)->value('user_id');
        if (Auth::id() == $user_id) {
            $join = Join::where('user_id',$request->users_id)->where('plan_id',$request->plan_id)->delete();
            return redirect()->route('list',$request->plan_id);
        }
        else
            return redirect('/home');
    }

    public function delete(Request $request)
    {   
        $user_id = Plan::where('id',$request->plan_id)->value('user_id');
        if (Auth::id() == $user_id) {
            $join = Join::where('user_id',$request->users_id)->where('plan_id',$request->plan_id)->delete();
            return redirect()->route('list',$request->plan_id);
        }
        else
            return redirect('/home');
    }
}

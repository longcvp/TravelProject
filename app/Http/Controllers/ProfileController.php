<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EditRequest;
use App\User;
use App\Plan;
use App\Follow;
use App\Join;
use Illuminate\Support\Facades\DB;
use Validator;
use Image;

class ProfileController extends Controller
{
    public function guest()
    {
        $plan = Plan::take(10)->orderBy('created_at','desc')->get();
        $plan_hot = Plan::take(10)->orderBy('comments','desc')->get();
        return view('welcome',['plan' => $plan,'plan_hot' => $plan_hot]);
    }
	//show profile
    public function showProfile()
    {
        $plan = Plan::where('user_id',Auth::id())->get();
        return view('user.profile',['plan' => $plan]);
    }

    public function showEditProfile()
    {
        return view('user.edit_profile');
    }

    public function showPlanJoin()
    {
        $plan_join = DB::table('joins')
            ->join('plans','joins.plan_id', '=', 'plans.id')
            ->select('plans.*')
            ->where('joins.user_id',Auth::id())
            ->where('joins.join',2)
            ->get();
        return view('user.join',['plan_join' => $plan_join]);
    }

    public function showPlanFollow()
    {
        $plan = DB::table('follows')
            ->join('plans','follows.plan_id', '=', 'plans.id')
            ->select('plans.*')
            ->where('follows.user_id',Auth::id())
            ->get();
        return view('user.follow',['plan' => $plan]);
    }

    //store and update avatar
    public function storeAvatar(Request $req)
    {
    	if ($req->hasFile('avatar')) {
    		$avatar = $req->file('avatar');
    		$filename = time().'.'.$avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/avatar/'.$filename));

    		$user = User::where('id',Auth::id())->update([
                'avatar_image' => $filename,
            ]);

    	}
        return redirect()->route('profile');

    }

    public function editUser(EditRequest $request)
    {
    	$user = User::where('id',$request->id)->update([
    		'name' => $request->name,
    		'phone' => $request->phone,
    		'address' => $request->add,
    		'birthday' => $request->birthday,
    		'gender' => $request->gender,
    	]);
    	return redirect()->back();
    }
}


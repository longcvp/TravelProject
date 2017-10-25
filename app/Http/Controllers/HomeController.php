<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plan = Plan::take(10)->orderBy('created_at','desc')->get();
        $plan_hot = Plan::take(10)->orderBy('comments','desc')->get();
        return view('home',['plan' => $plan,'plan_hot' => $plan_hot]);
    }

    public function guest()
    {
        $plan = Plan::take(10)->orderBy('created_at','desc')->get();
        $plan_hot = Plan::take(10)->orderBy('comments','desc')->get();
        return view('welcome',['plan' => $plan,'plan_hot' => $plan_hot]);
    }
}

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','ProfileController@guest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//Profile

Route::group(['prefix'=>'home','middleware' => 'auth'],function(){
	Route::get('/profile/', [
		'as' => 'profile',
		'uses' => 'ProfileController@showProfile',
	]);
	Route::get('/profile/edit', [
		'as' => 'profile_edit',
		'uses' => 'ProfileController@showEditProfile',
	]);
	Route::get('/join/', [
		'uses' => 'ProfileController@showPlanJoin',	
	]);

	Route::get('/follow/', [
		'uses' => 'ProfileController@showPlanFollow',	
	]);

	Route::get('/create_trip', [
	'uses' => 'CreateTripController@create',
	]);

	Route::post('/create_trip', [
		'uses' => 'CreateTripController@store',
		]);

	Route::get('/plan/{id}',[
		'as' => 'plan',
		'uses' => 'PlanController@showPlan',
	]);	

	Route::get('/plan/edit/{id}',[
		'uses' => 'PlanController@showEditPlan',
	]);

	Route::get('/plan/list/{id}',[
		'as' => 'list',
		'uses' => 'PlanController@showListPlan',
	]);

	Route::get('/plan/list',function(){
		return redirect('/home');
	});

});


Route::group(['middleware' => 'auth'],function(){

	//change avatar plan
	Route::get('avatar',function(){
		return redirect('/home');
	});

	Route::post('/home/profile', [
	'as' => 'avatar',
	'uses' => 'ProfileController@storeAvatar',
	]);

	Route::post('profile', [
		'as' => 'edit',
		'uses' => 'ProfileController@editUser',
	]);

	//change cover plan
	Route::get('cover',function(){
		return redirect('/home');
	});

	Route::post('cover', [
		'middleware' => 'auth',
		'as' => 'cover',
		'uses' => 'PlanController@storeCover',
	]);	

	//edit plan
	Route::post('edit', [
		'as' => 'edit_plan',
		'uses' => 'PlanController@editPlan',
	]);

	Route::get('edit',function(){
		return redirect('/home');
	});

	// follow a plan
	Route::get('follow_plan',function(){
		return redirect('/home');
	});

	Route::post('follow_plan', [
		'as' => 'follow',
		'uses' => 'FollowController@followPlan',
	]);

	Route::post('unfollow_plan', [
		'as' => 'unfollow',
		'uses' => 'FollowController@unfollowPlan',
	]);

	// join a plan
	Route::get('join_plan',function(){
		return redirect('/home');
	});

	Route::post('join_plan', [
		'as' => 'join',
		'uses' => 'JoinController@joinPlan',
	]);

	Route::post('unjoin_plan', [
		'as' => 'unjoin',
		'uses' => 'JoinController@unjoinPlan',
	]);


	Route::get('accept',[
	'as' => 'accept',
	'uses' => 'JoinController@accept',
	]);

	Route::get('deny',[
	'as' => 'deny',
	'uses' => 'JoinController@deny',
	]);

	Route::get('delete',[
	'as' => 'delete',
	'uses' => 'JoinController@delete',
	]);

	//comment
	Route::get('comment',function(){
		return redirect('/home');
	});

	Route::post('comment', [
		'middleware' => 'auth',
		'as' => 'comment',
		'uses' => 'CommentController@comment',
	]);

	Route::post('del_comment', [
		'middleware' => 'auth',
		'as' => 'del_comment',
		'uses' => 'CommentController@DeleteComment',
	]);
	//reply
	Route::get('reply',function(){
		return redirect('/home');
	});

	Route::post('reply', [
		'middleware' => 'auth',
		'as' => 'reply',
		'uses' => 'CommentController@reply',
	]);

	Route::post('del_reply', [
		'middleware' => 'auth',
		'as' => 'del_reply',
		'uses' => 'CommentController@deleteReply',
	]);

});



Route::post('home',[
	'middleware' => 'auth',
	'as' => 'create',
	'uses' => 'PlanController@createPlan',	
]);



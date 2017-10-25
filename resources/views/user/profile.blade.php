@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div>
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <?php $img = Auth::user()->avatar_image; $link = 'avatar/'.$img ; ?>
                        <img src="{{ asset($link) }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px; " >
                        <br><br>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalChangeAvatar">Change avatar</button>
                          <!-- Modal -->                        
                        <div class="modal fade" id="modalChangeAvatar" role="dialog">
                            <div class="modal-dialog">
                            
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Change/Update Avatar</h4>
                                </div>
                                <div class="modal-body">
                                <form class="form-horizontal" method="POST" action="{{route('avatar')}}" enctype="multipart/form-data" >
                                    {{ csrf_field() }}
                                    <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                                        <label class="control-label">Update profile Image</label>
                                        <input type="file" accept ="image/*" name="avatar" required>

                                            @if ($errors->has('avatar'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('avatar') }}</strong>
                                                </span>
                                            @endif                                
                                    </div>
                                    <input type="submit" class="btn btn-info">
                                </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                              
                            </div>
                        </div>                      
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4>Name : {{Auth::user()->name}}</h4>
                        <h5>
                            <?php $date = Auth::user()->birthday; ?>
                            <?php $date2 = date_create($date); ?>
                            <?php $birthday = $date2->format("d-m-Y"); ?>
                            <?php echo "Birthday : ".$birthday; ?>
                        </h5>
                        <h5>
                            <?php $gender = Auth::user()->gender; ?>        
                            @if($gender == 1 )
                                {{"Gender: Male"}}
                            @elseif($gender == 2 )
                                {{"Gender: Female"}}
                            @endif
                        </h5>
                        <h5>Phone : {{Auth::user()->phone}}</h5>
                        <h5>Add: {{Auth::user()->address}} </h5>                        
                        <!-- Split button -->
                        <div class="col-sm-4 col-md-4">
                            <a type="button" class="btn btn-danger" href="/home/profile/edit">Edit</a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr style="border-top: 3px double #8c8b8b;">
<div class="container">
    <div id ="menu">
        <ul class='color'>
        <li><a class ="current" href="./profile">My Plan</a></li>
        <li><a href="./follow">Plan Follow</a></li>
        <li><a href="./join">Plan Join</a></li>
        </ul>
    </div>
    <br><br>
    <a href="./create" type="button" class="btn btn-primary">Create new plan</a>
    <br><br>
    @foreach($plan as $key => $data)
        <table>
            <tr>
                <div class="row">

                    <div class="col-md-6">
                        <?php $img = $data->cover_image; $link = 'coverplan/'.$img ; ?>
                        <img class="img-fluid" src="{{asset($link)}}" style="width: 500px; height: 500px;">
                    </div>
                    <div class="col-md-4">
                        <h3>Name : {{$data->plan_name}}</h3>
                        <h3>Plan Details</h3>
                        <ul>
                        <li>Start : {{$data->start_time}}</li>
                        <li>End : {{$data->end_time}}</li>
                        <li>Max of people: {{$data->max_people}}</li>
                        <li>
                            @if($data->status == 1)
                            {{"Status : Creating"}}
                            @elseif($data->status == 2)
                            {{"Status : Running"}}
                            @elseif($data->status == 3)
                            {{"Status : Finish"}}
                            @elseif($data->status == 4)
                            {{"Status : Cancel"}}
                            @endif
                        </li>
                        <li>Join: {{$data->joined}} people</li>
                        <li>Follow: {{$data->followed}} people</li>
                        </ul>
                        <a href="./plan/{{$data->id}}" type="button" class="btn btn-danger">Detail</a>                       
                    </div>
                </div>
            </tr>
        <tr><br><br></tr>
    </table>
    @endforeach
</div>
@endsection
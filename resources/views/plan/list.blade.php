@extends('layouts.app')

@section('content')
<div class="container">
	@foreach($plan as $key => $data)
      <div class="row">

        <div class="col-md-6">
        <?php $img = $data->cover_image; $link = 'coverplan/'.$img ; ?>
          <img class="img-fluid" src="{{asset($link)}}">
        </div>

        <div class="col-md-6">
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
            </ul>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Birthday</th>
                    <th>Gender</th>
                    <th>Phone Number</th>
                    <th>Status</th>
                    <th>Accept</th>
                    <th>Deny</th>
                    <th>Delete</th>
                </tr>
                @foreach($users as $key => $users)
                <tr>
                    <td>{{$users->name}}</td>
                    <td>{{$users->birthday}}</td>
                    <td>
                        <?php $gender = $users->gender; ?>        
                        @if($gender == 1 )
                            {{"Gender: Male"}}
                        @elseif($gender == 2 )
                            {{"Gender: Female"}}
                        @endif
                    </td>
                    <td>{{$users->phone}}</td>
                    <td>
                        <?php $status = $users->join; ?>        
                        @if($status == 1 )
                            {{"Waiting"}}
                        @elseif($status == 2 )
                            {{"Joined"}}
                        @endif
                    </td>
                    <td>
                        <?php $status = $users->join; ?>        
                        @if($status == 1 )
                            <form class="form-horizontal" method="get" action="{{route('accept')}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="users_id" value="{{$users->id}}">
                                <input type="hidden" name="plan_id" value="{{$data->id}}">
                                <input type="submit" value="Accept" class="btn btn-success">
                            </form>
                        @elseif($status == 2 )
                            {{""}}
                        @endif                        
                    </td>
                    <td>
                        <?php $status = $users->join; ?>        
                        @if($status == 1 )
                            <form class="form-horizontal" method="get" action="{{route('deny')}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="users_id" value="{{$users->id}}">
                                <input type="hidden" name="plan_id" value="{{$data->id}}">
                                <input type="submit" value="Deny" class="btn btn-warning">
                            </form>
                        @elseif($status == 2 )
                            {{""}}
                        @endif 
                    </td>
                    <td>
                        <?php $status = $users->join; ?>        
                        @if($status == 1 )
                            {{""}}
                        @elseif($status == 2 )
                            <form class="form-horizontal" method="get" action="{{route('delete')}}">
                                <input type="hidden" name="users_id" value="{{$users->id}}">
                                <input type="hidden" name="plan_id" value="{{$data->id}}">
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>

                        @endif 
                    </td>
                </tr>  
                @endforeach             
            </table>
            <br>
            <a href="/home/plan/{{$data->id}}" type="button" class="btn btn-primary">Back to plan</a>                            
        </div>
      </div>
    @endforeach
</div>
@endsection
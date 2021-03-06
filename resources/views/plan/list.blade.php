@extends('layouts.app')

@section('content')
<div class="container">
	@foreach($plan as $key => $data)
      <div class="row">

        <div class="col-md-6">
            <?php $img = $data->cover; $link = $img ; ?>
            <img class="img-fluid" src="{{asset($link)}}">
        </div>
        <div class="col-md-6">
            <h3 class="my-3">Name : {{$data->name}}</h3>
            <h3 class="my-3">Plan Details</h3>
            <ul>
            <li>Description : {{$data->description}}</li>
            <li>Start : {{$data->starting_time}}</li>
            <li>End : {{$data->ending_time}}</li>
            <li>Max of people: {{$data->max_people}}</li>
            <li>
                @if($data->status == 0)
                {{"Status : Creating"}}
                @elseif($data->status == 1)
                {{"Status : Running"}}
                @elseif($data->status == 2)
                {{"Status : Finish"}}
                @elseif($data->status == 3)
                {{"Status : Cancel"}}
                @endif
            </li>
            <li>Join: {{$data->joined}} people</li>
            <li>Follow: {{$data->followed}} people</li>
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
                    @foreach($joins as $key => $j)
                        @if($j->user_id == $users->id)
                    <td>
                        <?php $status = $j->join; ?>        
                        @if($status == 1 )
                            {{"Waiting"}}
                        @elseif($status == 2 )
                            {{"Joined"}}
                        @endif
                    </td>
                    <td>
                        <?php $status = $j->join; ?>        
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
                        <?php $status = $j->join; ?>        
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
                        <?php $status = $j->join; ?>        
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
                    @endif
                    @endforeach
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
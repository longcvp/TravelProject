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
                        </h5
                        <h5>Phone : {{Auth::user()->phone}}</h5>
                        <h5>Add: {{Auth::user()->address}} </h5>
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
        <li><a href="./profile">My Plan</a></li>
        <li><a href="./follow">Plan Follow</a></li>
        <li><a class ="current" href="./join">Plan Join</a></li>
        </ul>
    </div>
    <div class="row">
        <br>
        <br>
        <br>
        <h3>Plan Join</h3>
        <hr style=" height: 30px; border-style: solid; border-color: #8c8b8b; border-width: 1px 0 0 0; border-radius: 20px">
        @foreach($plan_join as $key => $data)
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
</div>
@endsection
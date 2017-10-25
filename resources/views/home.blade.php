@extends('layouts.app')

@section('content')

    <div class="container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <img src="{{asset('/imghome/1467702984.jpg')}}">
          </div>

          <div class="item">
            <img src="{{asset('/imghome/1508513276.jpg')}}">
          </div>
        
          <div class="item">
            <img src="{{asset('/imghome/1508513289.jpg')}}">
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <br>
        <h2>New Plans</h2>
        <hr style=" height: 30px; border-style: solid; border-color: #8c8b8b; border-width: 1px 0 0 0; border-radius: 20px">
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
                            <li>Create at: {{$data->created_at}}</li>
                            </ul>
                            <a href="home/plan/{{$data->id}}" type="button" class="btn btn-danger">Detail</a>                           
                        </div>
                    </div>
                </tr>
            <tr><br><br></tr>
        </table>
        @endforeach
    </div>
<div class="container">
    <div class="row">
        <br>
        <h2>Hot Plans</h2>
        <hr style=" height: 30px; border-style: solid; border-color: #8c8b8b; border-width: 1px 0 0 0; border-radius: 20px">
            @foreach($plan_hot as $key => $data)
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
                            <li>Comment: {{$data->comments}} </li>
                            </ul>
                            <a href="home/plan/{{$data->id}}" type="button" class="btn btn-danger">Detail</a>                           
                        </div>
                    </div>
                </tr>
            <tr><br><br></tr>
        </table>
        @endforeach   
    </div>
</div>
<footer class="text-center">
      <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
        <span class="glyphicon glyphicon-chevron-up"></span>
      </a><br><br>
      <p>Click to top </p> 
    </footer>

<script>
$(document).ready(function(){
    // Initialize Tooltip
    $('[data-toggle="tooltip"]').tooltip(); 
})
</script>
@endsection

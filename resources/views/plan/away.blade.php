@extends('layouts.app')
@section('content')
<div class="container">
    @foreach($away as $key => $data)
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
            </ul>
            <br>
            <br>
            @if($check_join == null)
                <form class="form-horizontal" method="post" action="{{route('join')}}">
                    {{ csrf_field() }} 
                    <input type="hidden" name="plan_id" value="{{$data->id}}">
                    <input type="submit" name="join" class="btn btn-danger" value="Register">
                </form>
            @else
                <a href="#" type="button" class="btn btn-success" >Registered <i class="fa fa-check"></i></a>
            @endif

            <br>
            <br>
            @if($check_follow == null)
                <form class="form-horizontal" method="post" action="{{route('follow')}}">
                    {{ csrf_field() }} 
                    <input type="hidden" name="plan_id" value="{{$data->id}}">
                    <input type="submit" name="follow" class="btn btn-danger" value="Follow">
                </form> 
            @else
                <a href="#" type="button" class="btn btn-success" >Followed <i class="fa fa-check"></i></a>
            @endif
            <br>
            <br>
            <div>
                <a href="#comment">Comment <span class="glyphicon glyphicon-chevron-down"></span></a> 
            </div>                        
        </div>
      </div>
            <br>
            <br>
            <div class="col-sm-6 col-md-10" style="text-align: center;" >
            	<img src="http://erinlyyc.com/wp-content/uploads/2017/05/google-maps.jpg">
            	<br>
            	<br>
            	<table>
            		<tr>
            			<th>Start</th>
            			<th>End</th>
            			<th>Vehicle</th>
            			<th>Activity</th>
            		</tr>
            		<tr>
            			<td>Vĩnh Yên, Vĩnh Phúc</td>
            			<td>Mỹ Đình, Hà Nội</td>
            			<td>Ô tô</td>
            			<td>Di chuyển</td>
            		</tr>
            		<tr>
            			<td>Mỹ Đình, Hà Nội</td>
            			<td>Sơn Tây, Hà Nội</td>
            			<td>Xe máy</td>
            			<td>Di chuyển</td>
            		</tr>
            		<tr>
            			<td>Mỹ Đình, Hà Nội</td>
            			<td>Sơn Tây, Hà Nội</td>
            			<td>Xe máy</td>
            			<td>Di chuyển</td>
            		</tr>
            		<tr>
            			<td>Mỹ Đình, Hà Nội</td>
            			<td>Sơn Tây, Hà Nội</td>
            			<td>Xe máy</td>
            			<td>Di chuyển</td>
            		</tr>            		
            	</table>
            </div>
		</div>
</div>
<hr style="border-top: 3px double #8c8b8b;">
<div class="container" id ="comment">
    <div class="container bootstrap snippet">
    <div class="row">
        <div class="col-md-12">
            <div class="blog-comment">
                <h3 class="text-success">Comments</h3>
                <hr style=" height: 30px; border-style: solid; border-color: #8c8b8b; border-width: 1px 0 0 0; border-radius: 20px">
                @foreach($comments as $key => $cmt)
                <?php $img = $cmt->avatar_image; $link = 'avatar/'.$img ; ?>
                <ul class="comments">
                <li class="clearfix">
                  <img src="{{asset($link)}}" class="avatar" alt="">
                    <div class="post-comments">
                        <p class="meta">{{$cmt->created_at}}  <a href="#">{{$cmt->name}}</a> says : <i class="pull-right"></i></p>
                        <div>
                            <p>{{$cmt->message}}</p>
                            @foreach($image_comment as $key => $img)
                                @if($img->comment_id == $cmt->id)
                                <?php $img = $img->image_name; $link = 'comment_image/'.$img ; ?>
                                <hr>
                                <img src="{{asset($link)}}">
                                @endif
                            @endforeach
                        </div>
                        <br>
                        <a class="btn btn-success" onclick="reply({{$cmt->id}})"><small>Reply</small></a>
                        <div id = "{{$cmt->id}}" style="display: none;" class="well">
                            <hr>
                            <form method="post" action="{{route('reply')}}">
                                {{ csrf_field() }}
                                <label for="comment">Your Comment</label>
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" name="message" required></textarea>
                                    <input type="hidden" name="comment_id" value="{{$cmt->id}}">
                                    <input type="hidden" name="plan_id" value="{{$data->id}}">

                                </div>
                                <button type="submit" class="btn btn-success">Send</button> 
                            </form>
                        </div>
                    </div>
                    @foreach($reply as $key => $rl)
                    @if($rl->reply_id == $cmt->id)
                    <?php $img = $rl->avatar_image; $link = 'avatar/'.$img ; ?>
                    <ul class="comments">
                        <li class="clearfix">
                          <img src="{{asset($link)}}" class="avatar" alt="">
                            <div class="post-comments">
                                <p class="meta"> {{$rl->created_at}}  <a href="#">{{$rl->name}}</a> says : <i class="pull-right"></i></p>
                                <p>
                                    {{$rl->message}}
                                </p>
                            </div>
                        </li>
                    </ul>
                    @endif
                    @endforeach
                </li>
                </ul>
                @endforeach    
                <div class="well">
                    <form method="post" action="{{route('comment')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <label for="comment">Your Comment</label>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="message" required></textarea>
                            <input type="hidden" name="plan_id" value="{{$data->id}}">
                            <div class="imageupload panel panel-default">
                                <div class="file-tab panel-body">
                                    <label class="btn btn-default btn-file">
                                        <span><i class="fa fa-camera"></i>Upload</span>
                                        <!-- The file is stored here. -->
                                        <input type="file" class="form-control" id="images" name="images[]" onchange="preview_images();" multiple/>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Send</button>
                         <div class="row" id="image_preview"></div>
                    </form>
                </div>            
            </div>
        </div>
    </div>
    </div>
</div>
<script>
    function reply($id) {
    var x = document.getElementById($id);
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
function preview_images() 
{
 var total_file=document.getElementById("images").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<div class='col-md-3'><img class='img-responsive' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
 }
}
</script>
@endforeach
<br><br>
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
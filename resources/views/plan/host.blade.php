@extends('layouts.app')
@section('content')
<div class="container">
@foreach($plan_host as $key => $data)
      <div class="row">

        <div class="col-md-6">
            <?php $img = $data->cover; $link = $img ; ?>
            <img class="img-fluid" src="{{asset($link)}}">
            <br><br>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{route('cover')}}" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('cover') ? ' has-error' : '' }}">
                        <label class="control-label">Update Cover Image</label>
                        <input type="hidden" name="plan_id" value="{{$data->id}}">
                        <input type="file" accept ="image/*" name="cover" required>

                            @if ($errors->has('cover'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cover') }}</strong>
                                </span>
                            @endif                                
                    </div>
                    <input type="submit" class="btn btn-info">
                </form> 
            </div> 
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
                <div class="col-sm-6 col-md-8">
                    <a type="button" class="btn btn-success" href="./edit/{{$data->id}}" >Change</a>
                    <a type="button" class="btn btn-success" href="./list/{{$data->id}}" >List of member</a>
                    <br><br>
                    <a href="#comment">Comment <span class="glyphicon glyphicon-chevron-down"></span></a> 
                </div>
            </div>
      </div>
    <br>
    <br>
</div>
<hr style="border-top: 3px double #8c8b8b;">
<div class="container" id="comment">
    <div class="container bootstrap snippet">
    <div class="row">
        <div class="col-md-12">
            <div class="blog-comment">
                <h3 class="text-success">Comment</h3>
                <hr style=" height: 30px; border-style: solid; border-color: #8c8b8b; border-width: 1px 0 0 0; border-radius: 20px">
                @foreach($comments as $key => $cmt)
                @foreach($users_comment as $key => $uc)
                @if($cmt->user_id == $uc->id)
                <?php $img = $uc->avatar_image; $link = 'avatar/'.$img ; ?>
                <ul class="comments">
                <li class="clearfix">
                  <img src="{{asset($link)}}" class="avatar" alt="">
                    <div class="post-comments">
                        <p class="meta">{{$cmt->created_at}} <a href="#">{{$uc->name}}</a> says : 
                        <i class="pull-right">
                        <form class="form-horizontal" method="POST" action="{{route('del_comment')}}">
                         {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$cmt->id}}">
                            <input type="hidden" name="plan_id" value="{{$cmt->plan_id}}">
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                        </i>
                        </p>
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
                        <a onclick="reply({{$cmt->id}})"><small>Reply</small></a>
                        <div id = "{{$cmt->id}}" style="display: none;" class="well">
                            <hr>
                            <form method="post" action="{{route('reply')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <label for="comment">Your Comment</label >
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" name="message"></textarea>
                                    <input type="hidden" name="comment_id" value="{{$cmt->id}}">
                                    <input type="hidden" name="plan_id" value="{{$data->id}}">
                                    <div class="imageupload panel panel-default">
                                        <div class="file-tab panel-body">
                                            <label class="btn btn-default btn-file">
                                                <span><i class="fa fa-camera"></i>Upload</span>
                                                <!-- The file is stored here. -->
                                                <input type="file" class="form-control" id="image" accept="image/*" name="image[]" onchange="preview_reply();" multiple/>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Send</button>
                                <div class="row" id="image_reply"></div>
                            </form>
                        </div>
                    </div>
                    @foreach($reply as $key => $rl)
                    @foreach($users_reply as $key => $ur)
                    @if($rl->reply_id == $cmt->id)
                    @if($rl->user_id == $ur->id)
                    <?php $img = $ur->avatar_image; $link = 'avatar/'.$img ; ?>
                    <ul class="comments">
                        <li class="clearfix">
                          <img src="{{asset($link)}}" class="avatar" alt="">
                            <div class="post-comments">
                                <p class="meta"> {{$rl->created_at}}  <a href="#">{{$ur->name}}</a> says : <i class="pull-right">
                                <form class="form-horizontal" method="POST" action="{{route('del_reply')}}">
                                 {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$rl->id}}">
                                    <input type="hidden" name="plan_id" value="{{$rl->plan_id}}">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                                </i>
                                </p>
                                <div>
                                    <p>{{$rl->message}}</p>
                                    @foreach($image_comment as $key => $img)
                                        @if($img->comment_id == $rl->id)
                                        <?php $img = $img->image_name; $link = 'comment_image/'.$img ; ?>
                                        <hr>
                                        <img src="{{asset($link)}}">
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    </ul>
                    @endif
                    @endif
                    @endforeach
                    @endforeach
                </li>
                </ul>
                @endif
                @endforeach
                @endforeach
                <hr>
                <div class="well">
                    <form method="post" action="{{route('comment')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <label for="comment">Your Comment</label>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="message"></textarea>
                            <input type="hidden" name="plan_id" value="{{$data->id}}">
                            <div class="imageupload panel panel-default">
                                <div class="file-tab panel-body">
                                    <label class="btn btn-default btn-file">
                                        <span><i class="fa fa-camera"></i>Upload</span>
                                        <!-- The file is stored here. -->
                                        <input type="file" class="form-control" id="images" accept="image/*" name="images[]" onchange="preview_images();" multiple/>
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
function preview_reply() 
{
 var total_file=document.getElementById("image").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_reply').append("<div class='col-md-3'><img class='img-responsive' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
 }
}
</script>
@endforeach
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
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Plan</h2>
    <hr style=" height: 30px; border-style: solid; border-color: #8c8b8b; border-width: 1px 0 0 0; border-radius: 20px">
    @foreach($plan_host as $key => $data)
    <div class="row">         
            <form class="form-horizontal" method="POST" action="{{route('edit_plan')}}">
                {{ csrf_field() }} 
                @if( session('success') )
                  <div class="alert alert-success">
                   {{ session('success') }}
                  </div>
                @endif

                @if(count($errors))

                  <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                  </div>

                @endif
                <div>
                    <input type="hidden" name="plan_id" value="{{$data->id}}">
                </div>                      
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Name of plan</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{$data->plan_name}}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>                      
                <div class="form-group{{ $errors->has('start_time') ? ' has-error' : '' }}">
                    <label for="start_time" class="col-md-4 control-label">Start Plan</label>

                    <div class="col-md-6">
                        <input id="start_time" type="date" class="form-control" name="start_time" value="{{$data->start_time}}" required>

                        @if ($errors->has('start_time'))
                            <span class="help-block">
                                <strong>{{ $errors->first('start_time') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('finish_time') ? ' has-error' : '' }}">
                    <label for="finish_time" class="col-md-4 control-label">Finish Plan</label>

                    <div class="col-md-6">
                        <input id="finish_time" type="date" class="form-control" name="finish_time" value="{{$data->end_time}}" required>

                        @if ($errors->has('finish_time'))
                            <span class="help-block">
                                <strong>{{ $errors->first('finish_time') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>              
                <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                    <label for="number" class="col-md-4 control-label">Number of people</label>

                    <div class="col-md-6">
                        <input id="number" type="string" class="form-control" name="number" value="{{$data->max_people}}" required>

                        @if ($errors->has('number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('number') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="status" class="col-md-4 control-label">Gender</label>
                    <div class="col-md-6">
                        <input id = "status" name="status" type="hidden" class="form-control" value="{{$data->status}}">
                        <select id="MyStatus">
                            <option value="1">Creating</option>
                            <option value="2">Running</option>
                            <option value="3">Finish</option>
                            <option value="4">Cancel</option>
                        </select>
                    </div>
                </div>                                        
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary" onclick="myFunction()">
                            Change
                        </button>
                    </div>
                </div>                
            </form>
            <script>
                function myFunction() {
                    var x = document.getElementById("MyStatus").value;
                    document.getElementById("status").value = x;
                    }
            </script>         
        </div>
    @endforeach
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Your Profile</h2>
    <hr style=" height: 30px; border-style: solid; border-color: #8c8b8b; border-width: 1px 0 0 0; border-radius: 20px">
    <div class="row">         
    <form id="editForm" class="form-horizontal" method="POST" action="{{route('edit')}}">
        {{ csrf_field() }}

        <div class="form-group">
            <input type="hidden" name="id" value="{{Auth::id()}}">
        </div>

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Name</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{Auth::user()->name}}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>                      
        <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
            <label for="birthday" class="col-md-4 control-label">Birthday</label>

            <div class="col-md-6">
                <input id="birthday" type="date" class="form-control" name="birthday" value="{{Auth::user()->birthday}}" required>

                @if ($errors->has('birthday'))
                    <span class="help-block">
                        <strong>{{ $errors->first('birthday') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('add') ? ' has-error' : '' }}">
            <label for="add" class="col-md-4 control-label">Address</label>

            <div class="col-md-6">
                <input id="add" type="string" class="form-control" name="add" required value="{{Auth::user()->address}}">

                @if ($errors->has('add'))
                    <span class="help-block">
                        <strong>{{ $errors->first('add') }}</strong>
                    </span>
                @endif
            </div>
        </div>                                            
        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            <label for="phone" class="col-md-4 control-label">Phone</label>

            <div class="col-md-6">
                <input id="phone" type="string" class="form-control" name="phone" required value="{{Auth::user()->phone}}">

                @if ($errors->has('phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="gender" class="col-md-4 control-label">Gender</label>
            <div class="col-md-6">
                <input id = "gender" name="gender" type="hidden" class="form-control">
                <select id="MyGender">
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary" onclick="gender()">
                    Submit
                </button>
            </div>
        </div>
    </form>
    <script>
        function gender() {
            var x = document.getElementById("MyGender").value;
            document.getElementById("gender").value = x;
            }
    </script>        
    </div>
</div>
@endsection
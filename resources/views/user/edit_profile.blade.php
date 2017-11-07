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
        <?php $x = Auth::user()->gender; ?>
        @if($x == 1)
        <div class="form-group">
            <label for="gender" class="col-md-4 control-label">Gender</label>
            <div class="col-md-6">
                <input id = "abc" name="gender" type="hidden" class="form-control">
                <select id="mySelect">
                    <option value="1" selected>Male</option>
                    <option value="2">Famale</option>
                </select>
            </div>
        </div>
        @elseif($x == 2)
        <div class="form-group">
            <label for="gender" class="col-md-4 control-label">Gender</label>
            <div class="col-md-6">
                <input id = "abc" name="gender" type="hidden" class="form-control">
                <select id="mySelect">
                    <option value="1">Male</option>
                    <option value="2" selected>Famale</option>
                </select>
            </div>
        </div>
        @else
        <div class="form-group">
            <label for="gender" class="col-md-4 control-label">Gender</label>
            <div class="col-md-6">
                <input id = "abc" name="gender" type="hidden" class="form-control">
                <select id="mySelect">
                    <option>Select</option>
                    <option value="1">Male</option>
                    <option value="2">Famale</option>
                </select>
            </div>
        </div>
        @endif
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary" onclick="myFunction()">
                    Submit
                </button>
            </div>
        </div>
    </form>
    <script>
    function myFunction() {
        x = document.getElementById("mySelect").value;
        document.getElementById("abc").value = x;
    }
    </script>       
    </div>
</div>
@endsection
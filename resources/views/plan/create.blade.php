@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New Plan</h2>
    <hr style=" height: 30px; border-style: solid; border-color: #8c8b8b; border-width: 1px 0 0 0; border-radius: 20px">
    <div class="row">
        <div >        	
            <form class="form-horizontal" method="POST" action="{{ route('create') }}">
                {{ csrf_field() }}                       
	            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                <label for="name" class="col-md-4 control-label">Name of plan</label>

	                <div class="col-md-6">
	                    <input id="name" type="text" class="form-control" name="name" value="{{old('name')}}" required autofocus>

	                    @if ($errors->has('name'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('name') }}</strong>
	                        </span>
	                    @endif
	                </div>
	            </div>
	            <div class="form-group">
	            	<input type="hidden" name="user_id" value="{{Auth::id()}}">
	            </div>                      
	            <div class="form-group{{ $errors->has('start_time') ? ' has-error' : '' }}">
	                <label for="start_time" class="col-md-4 control-label">Start Plan</label>

	                <div class="col-md-6">
	                    <input id="start_time" type="date" class="form-control" name="start_time" required value="{{old('start_time')}}">

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
	                    <input id="finish_time" type="date" class="form-control" name="finish_time" required value="{{old('finish_time')}}">

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
	                    <input id="number" type="string" class="form-control" name="number" value="{{old('number')}}" required>

	                    @if ($errors->has('number'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('number') }}</strong>
	                        </span>
	                    @endif
	                </div>
	            </div>
	            <div class="form-group">
	            	<label class="col-md-4 control-label">Status</label>
	            	<label class="col-md-1 control-label">Creating</label>

	            </div>                                         
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Create
                        </button>
	            		<a href="./profile" type="button" class="btn btn-danger">Cancel</a>
                    </div>
                </div>                
            </form>            
        </div>
    </div>
</div>
@endsection
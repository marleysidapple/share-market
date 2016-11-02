@extends('layouts.master')

@section('main-content')
                         
                          <!-- START VERTICAL FORM SAMPLE -->
  {!!csrf_field()!!}
  <div class="panel panel-default">
      <div class="panel-body">
          <h3>Edit Depository Participants(DP) Details</h3>
          {!! Form::open(array('url'=>'dp/edit', 'role'=>'form', 'method'=>'POST', 'id'=>'dpForm')) !!}

              <input type="hidden" name="id" value="{{$pageData->id}}">
              <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                  <label>Name</label>
                  <input type="text" id="name" name="name" class="form-control" value="{{$pageData->name}}"/>
                  @if ($errors->has('name'))
                      <span class="help-block">{{ $errors->first('name') }} </span>
                   @endif
              </div>

              <div class="form-group {{ $errors->has('dp_id') ? ' has-error' : '' }}">
                  <label>DP Code</label>
                  <input type="text" id="dp_id" name="dp_id" class="form-control" value="{{$pageData->dp_id}}"/>
                  @if ($errors->has('dp_id'))
                      <span class="help-block">{{ $errors->first('dp_id') }} </span>
                   @endif
              </div>

              <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                  <label>Address</label>
                  <input type="text" id="address" name="address" class="form-control" value="{{$pageData->address}}"/>
                  @if ($errors->has('address'))
                      <span class="help-block">{{ $errors->first('address') }} </span>
                   @endif
              </div>

              <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                  <label>Phone</label>
                  <input type="text" id="phone" name="phone" class="form-control" value="{{$pageData->phone}}"/>
                  @if ($errors->has('phone'))
                      <span class="help-block">{{ $errors->first('phone') }} </span>
                   @endif
              </div>

              <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                  <label>Email</label>
                  <input type="text" id="email" name="email" class="form-control" value="{{$pageData->email}}"/>
                  @if ($errors->has('email'))
                      <span class="help-block">{{ $errors->first('email') }} </span>
                   @endif
              </div>

              <div class="button pull-left">
                  <button type="submit" class="btn btn-primary btn-sm">Update</button>
                  <a href="{{URL::to('management/dp')}}" class="btn btn-default btn-sm">Cancel</a>
              </div>
          {!! Form::close() !!}
      </div>
  </div>
                       
                      
                   
@endsection

@section('javascript')

<script type="text/javascript" src="{{asset('js/jquery.validate.js')}}"></script>
<script src="{{asset('js/custom.jquery.validate.js')}}"></script>
                   
@endsection

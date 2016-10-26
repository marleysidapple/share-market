@extends('layouts.master')

@section('main-content')
                         
                          <!-- START VERTICAL FORM SAMPLE -->
  {!!csrf_field()!!}
  <div class="panel panel-default">
      <div class="panel-body">
          <h3>Edit Broker Details</h3>
          {!! Form::open(array('url'=>'broker/edit', 'role'=>'form', 'method'=>'POST')) !!}

              <input type="hidden" name="id" value="{{$pageData->id}}">
              <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" value="{{$pageData->name}}"/>
                  @if ($errors->has('name'))
                      <span class="help-block">{{ $errors->first('name') }} </span>
                   @endif
              </div>

              <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                  <label>Address</label>
                  <input type="text" name="address" class="form-control" value="{{$pageData->address}}"/>
                  @if ($errors->has('address'))
                      <span class="help-block">{{ $errors->first('address') }} </span>
                   @endif
              </div>

              <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                  <label>Email</label>
                  <input type="text" name="email" class="form-control" value="{{$pageData->email}}"/>
                  @if ($errors->has('email'))
                      <span class="help-block">{{ $errors->first('email') }} </span>
                   @endif
              </div>

              <div class="form-group {{ $errors->has('broker_no') ? ' has-error' : '' }}">
                  <label>Broker Number</label>
                  <input type="text" name="broker_no" class="form-control" value="{{$pageData->broker_no}}"/>
                  @if ($errors->has('broker_no'))
                      <span class="help-block">{{ $errors->first('broker_no') }} </span>
                   @endif
              </div>

              <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                  <label>Phone</label>
                  <input type="text" name="phone" class="form-control" value="{{$pageData->phone}}"/>
                  @if ($errors->has('phone'))
                      <span class="help-block">{{ $errors->first('phone') }} </span>
                   @endif
              </div>

              <div class="form-group {{ $errors->has('contact_person') ? ' has-error' : '' }}">
                  <label>Contact Person</label>
                  <input type="text" name="contact_person" class="form-control" value="{{$pageData->contact_person}}"/>
                  @if ($errors->has('contact_person'))
                      <span class="help-block">{{ $errors->first('contact_person') }} </span>
                   @endif
              </div>

              <div class="form-group {{ $errors->has('contact_person_no') ? ' has-error' : '' }}">
                  <label>Contact Person Number</label>
                  <input type="text" name="contact_person_no" class="form-control" value="{{$pageData->contact_person_no}}"/>
                  @if ($errors->has('contact_person_no'))
                      <span class="help-block">{{ $errors->first('contact_person_no') }} </span>
                   @endif
              </div>

              <div class="button pull-left">
                  <button type="submit" class="btn btn-primary btn-sm">Update</button>
                  <a href="{{URL::to('management/broker')}}" class="btn btn-default btn-sm">Cancel</a>
              </div>
          {!! Form::close() !!}
      </div>
  </div>
                       
                      
                   
@endsection

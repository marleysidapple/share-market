@extends('layouts.master')

@section('main-content')
                         
                          <!-- START VERTICAL FORM SAMPLE -->
  {!!csrf_field()!!}
  <div class="panel panel-default">
      <div class="panel-heading">
          <h3 class="panel-title">
              <a href="{{URL::to('management/bank')}}"><strong>{{$bankDetails->name}} - </strong></a>Add Branch
          </h3>
      </div>
      <div class="panel-body">
          {!! Form::open(array('url'=>'branch/add', 'role'=>'form', 'class'=>'form-horizontal', 'method'=>'POST')) !!}

              <input type="hidden" name="bank_id" value="{{$bankId}}">
              <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Address</label>
                  <div class="col-md-6 col-xs-12"> 
                    <input type="text" name="address" class="form-control" value="{{old('address')}}"/>
                    @if ($errors->has('address'))
                        <span class="help-block">{{ $errors->first('address') }} </span>
                     @endif
                  </div>
              </div>

              <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Phone</label>
                  <div class="col-md-6 col-xs-12"> 
                    <input type="text" name="phone" class="form-control" value="{{old('phone')}}"/>
                    @if ($errors->has('phone'))
                        <span class="help-block">{{ $errors->first('phone') }} </span>
                     @endif
                  </div>
              </div>

              <div class="form-group {{ $errors->has('contact_person') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Contact Person</label>
                  <div class="col-md-6 col-xs-12"> 
                    <input type="text" name="contact_person" class="form-control" value="{{old('contact_person')}}"/>
                    @if ($errors->has('contact_person'))
                        <span class="help-block">{{ $errors->first('contact_person') }} </span>
                     @endif
                  </div>
              </div>

              <div class="form-group {{ $errors->has('contact_person_no') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Contact Person Number</label>
                  <div class="col-md-6 col-xs-12"> 
                    <input type="text" name="contact_person_no" class="form-control" value="{{old('contact_person_no')}}"/>
                    @if ($errors->has('contact_person_no'))
                        <span class="help-block">{{ $errors->first('contact_person_no') }} </span>
                     @endif
                  </div>
              </div>

              <div class="button" style="margin-left:270px;">
                  <button type="submit" class="btn btn-primary btn-sm">Add</button>
                  <a href="{{URL::previous()}}" class="btn btn-default btn-sm">Cancel</a>

              </div>
          {!! Form::close() !!}
      </div>
  </div>
                       
                      
                   
@endsection
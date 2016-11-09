@extends('layouts.master')

@section('main-content')
                         
                          <!-- START VERTICAL FORM SAMPLE -->
  {!!csrf_field()!!}
  <div class="panel panel-default">
      <div class="panel-heading">
          <h3 class="panel-title"><strong>{{$pageData->name}} - </strong>Edit</h3>
          
      </div>
      <div class="panel-body">
          {!! Form::open(array('url'=>'rts/edit', 'role'=>'form', 'method'=>'POST','class'=>'form-horizontal', 'id'=>'rtaForm')) !!}

              <input type="hidden" name="id" value="{{$pageData->id}}">
              <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Name *</label>
                  <div class="col-md-6 col-xs-12">
                  <input type="text" id="name" name="name" class="form-control" value="{{$pageData->name}}"/>
                  @if ($errors->has('name'))
                      <span class="help-block">{{ $errors->first('name') }} </span>
                   @endif
                   </div>
              </div>

              <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Email *</label>
                  <div class="col-md-6 col-xs-12">
                  <input type="text" id="email" name="email" class="form-control" value="{{$pageData->email}}"/>
                  @if ($errors->has('email'))
                      <span class="help-block">{{ $errors->first('email') }} </span>
                   @endif
                   </div>
              </div>

              <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Phone *</label>
                  <div class="col-md-6 col-xs-12">
                  <input type="text" id="phone" name="phone" class="form-control" value="{{$pageData->phone}}"/>
                  @if ($errors->has('phone'))
                      <span class="help-block">{{ $errors->first('phone') }} </span>
                   @endif
                   </div>
              </div>

              <div class="form-group {{ $errors->has('contact_person') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Contact Person</label>
                  <div class="col-md-6 col-xs-12">
                  <input type="text" name="contact_person" class="form-control" value="{{$pageData->contact_person}}"/>
                  @if ($errors->has('contact_person'))
                      <span class="help-block">{{ $errors->first('contact_person') }} </span>
                   @endif
                   </div>
              </div>

              <div class="form-group {{ $errors->has('contact_person_no') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Contact Person Number</label>
                  <div class="col-md-6 col-xs-12">
                  <input type="text" id="contact_person_no" name="contact_person_no" class="form-control" value="{{$pageData->contact_person_no}}"/>
                  @if ($errors->has('contact_person_no'))
                      <span class="help-block">{{ $errors->first('contact_person_no') }} </span>
                   @endif
                   </div>
              </div>

               <div class="form-group {{ $errors->has('remarks') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Remarks</label>
                  <div class="col-md-6 col-xs-12">
                  <textarea name="remarks" class="form-control" rows="4" >{{$pageData->remarks}}</textarea>
                  @if ($errors->has('remarks'))
                      <span class="help-block">{{ $errors->first('remarks') }} </span>
                   @endif
                   </div>
              </div>

              <div class="button" style="margin-left:270px;">
                  <button type="submit" class="btn btn-primary btn-sm">Update</button>
                  <a href="{{URL::to('management/rts')}}" class="btn btn-default btn-sm">Cancel</a>
              </div>
          {!! Form::close() !!}
      </div>
  </div>
                       
                      
                   
@endsection

@section('javascript')

<script type="text/javascript" src="{{asset('js/jquery.validate.js')}}"></script>
<script src="{{asset('js/custom.jquery.validate.js')}}"></script>
                   
@endsection

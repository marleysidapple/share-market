@extends('layouts.master')

@section('main-content')
                         
  {!!csrf_field()!!}
  <div class="panel panel-default">
      <div class="panel-heading">
          <h3 class="panel-title"><strong>{{$pageData->name}} - </strong>Edit</h3>
          
      </div>
      <div class="panel-body">
          {!! Form::open(array('url'=>'bank/edit', 'role'=>'form', 'class'=>'form-horizontal', 'method'=>'POST', 'id'=>'bankForm')) !!}

              <input type="hidden" name="id" value="{{$pageData->id}}">
              <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Name *</label>
                  <div class="col-md-6 col-xs-12">   
                      <input type="text" id="name" name="name" class="form-control" value="{{$pageData->name}}"/>
                      <div class="fb-error"></div>
                      @if ($errors->has('name'))
                          <span class="help-block">{{ $errors->first('name') }} </span>
                      @endif
                  </div>
              </div>

              <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Address *</label>
                  <div class="col-md-6 col-xs-12">   
                      <input type="text" id="address" name="address" class="form-control" value="{{$pageData->address}}"/>
                      @if ($errors->has('address'))
                          <span class="help-block">{{ $errors->first('address') }} </span>
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

              <div class="form-group {{ $errors->has('bank_grade') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Bank Grade</label>
                  <div class="col-md-6 col-xs-12">   
                      <label class="radio-inline">
                          <input name="bank_grade" value="A" checked type="radio" @if($pageData->bank_grade == 'A'){{'checked'}}@endif>A
                      </label>
                      <label class="radio-inline">
                          <input name="bank_grade" value="B" type="radio" @if($pageData->bank_grade == 'B'){{'checked'}}@endif>B
                      </label>
                      <label class="radio-inline">
                          <input name="bank_grade" value="C" type="radio" @if($pageData->bank_grade == 'C'){{'checked'}}@endif>C
                      </label>
                      <label class="radio-inline">
                          <input name="bank_grade" value="D" type="radio" @if($pageData->bank_grade == 'D'){{'checked'}}@endif>D
                      </label>
                  </div>

              </div>

              <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Email</label>
                  <div class="col-md-6 col-xs-12">   
                      <input type="text" id="email" name="email" class="form-control" value="{{$pageData->email}}"/>
                      @if ($errors->has('email'))
                          <span class="help-block">{{ $errors->first('email') }} </span>
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
                    <input type="text" name="contact_person_no" class="form-control" value="{{$pageData->contact_person_no}}"/>
                    @if ($errors->has('contact_person_no'))
                        <span class="help-block">{{ $errors->first('contact_person_no') }} </span>
                     @endif
                  </div>
              </div>

              <div class="button" style="margin-left:270px;">
                  <button type="submit" class="btn btn-primary btn-sm">Update</button>
                  <a href="{{URL::to('management/bank')}}" class="btn btn-default btn-sm">Cancel</a>
              </div>
          {!! Form::close() !!}
      </div>
  </div>
                       
              
                   
@endsection

@section('javascript')

<script type="text/javascript" src="{{asset('js/jquery.validate.js')}}"></script>
<script src="{{asset('js/custom.jquery.validate.js')}}"></script>
                   
@endsection

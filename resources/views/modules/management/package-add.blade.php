@extends('layouts.master')

@section('main-content')
                         
                          <!-- START VERTICAL FORM SAMPLE -->
  {!!csrf_field()!!}
  <div class="panel panel-default">
      <div class="panel-heading">
          <h3 class="panel-title"><strong>Add New Package System</strong></h3>
      </div>
      <div class="panel-body">
          {!! Form::open(array('url'=>'package/add', 'role'=>'form', 'method'=>'POST', 'class'=>'form-horizontal', 'id'=>'packageForm')) !!}
              <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Name *</label>
                  <div class="col-md-6 col-xs-12">  
                  <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}"/>
                  @if ($errors->has('name'))
                      <span class="help-block">{{ $errors->first('name') }} </span>
                   @endif
                  </div>
              </div>

              <div class="form-group {{ $errors->has('service') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label" for="selectall">Services *</label><br />
                  <div class="col-md-6 col-xs-12">  
                    <div class="chk-container">
                      <div><input type="checkbox" id="selectall" name="allService" checked="checked"> All &nbsp;</div>
                      @foreach($listService as $liS)
                      <div class="checkboxli"><input type="checkbox" class="checkbox1" name="service[]" value="{{$liS}}"> {{$liS}} &nbsp;</div>
                      @endforeach
                    </div>

                    @if ($errors->has('service'))
                        <span class="help-block">{{ $errors->first('service') }} </span>
                     @endif
                  </div>
              </div>

              <div class="form-group {{ $errors->has('primary_price') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Primary Price *</label>
                  <div class="col-md-6 col-xs-12">  
                  <input type="text" id="primary_price" name="primary_price" class="form-control" value="{{old('primary_price')}}"/>
                  @if ($errors->has('primary_price'))
                      <span class="help-block">{{ $errors->first('primary_price') }} </span>
                   @endif
                  </div>
              </div>

              <div class="form-group {{ $errors->has('secondary_price') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Secondary Price *</label>
                  <div class="col-md-6 col-xs-12">  
                  <input type="text" id="secondary_price" name="secondary_price" class="form-control" value="{{old('secondary_price')}}"/>
                  @if ($errors->has('secondary_price'))
                      <span class="help-block">{{ $errors->first('secondary_price') }} </span>
                   @endif
                  </div>
              </div>

              <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Description</label>
                  <div class="col-md-6 col-xs-12">  
                  <textarea name="description" class="form-control">{{old('description')}}</textarea>
                  @if ($errors->has('description'))
                      <span class="help-block">{{ $errors->first('description') }} </span>
                   @endif
                  </div>
              </div>

              <div class="button" style="margin-left:270px;">
                  <button type="submit" class="btn btn-primary btn-sm">Add</button>
                  <a href="{{URL::to('package')}}" class="btn btn-default btn-sm">Cancel</a>
              </div>
          {!! Form::close() !!}
      </div>
  </div>
                       
@endsection

@section('javascript')

<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.validate.js')}}"></script>
<script src="{{asset('js/custom.jquery.validate.js')}}"></script>
                   
@endsection



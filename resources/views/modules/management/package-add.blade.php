@extends('layouts.master')

@section('main-content')
                         
                          <!-- START VERTICAL FORM SAMPLE -->
  {!!csrf_field()!!}
  <div class="panel panel-default">
      <div class="panel-body">
          <h3>Add New Package System</h3>
          {!! Form::open(array('url'=>'package/add', 'role'=>'form', 'method'=>'POST')) !!}
              <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" value="{{old('name')}}"/>
                  @if ($errors->has('name'))
                      <span class="help-block">{{ $errors->first('name') }} </span>
                   @endif
              </div>

              <div class="form-group {{ $errors->has('service') ? ' has-error' : '' }}">
                  <label for="selectall">Services</label><br />
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

              <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                  <label>Description</label>
                  <textarea name="description" class="form-control">{{old('description')}}</textarea>
                  @if ($errors->has('description'))
                      <span class="help-block">{{ $errors->first('description') }} </span>
                   @endif
              </div>

              <div class="form-group {{ $errors->has('primary_price') ? ' has-error' : '' }}">
                  <label>Primary Price</label>
                  <input type="text" name="primary_price" class="form-control" value="{{old('primary_price')}}"/>
                  @if ($errors->has('primary_price'))
                      <span class="help-block">{{ $errors->first('primary_price') }} </span>
                   @endif
              </div>

              <div class="form-group {{ $errors->has('secondary_price') ? ' has-error' : '' }}">
                  <label>Secondary Price</label>
                  <input type="text" name="secondary_price" class="form-control" value="{{old('secondary_price')}}"/>
                  @if ($errors->has('secondary_price'))
                      <span class="help-block">{{ $errors->first('secondary_price') }} </span>
                   @endif
              </div>

              <div class="button pull-left">
                  <button type="submit" class="btn btn-primary btn-sm">Add</button>
                  <a href="{{URL::to('package')}}" class="btn btn-default btn-sm">Cancel</a>
              </div>
          {!! Form::close() !!}
      </div>
  </div>
                       
@endsection

@section('javascript')

<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
                   
@endsection



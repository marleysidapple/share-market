@extends('layouts.master')

@section('main-content')
                         
                          <!-- START VERTICAL FORM SAMPLE -->
  {!!csrf_field()!!}
  <div class="panel panel-default">
      <div class="panel-body">
          <h3>Edit Package System</h3>
          {!! Form::open(array('url'=>'package/edit', 'role'=>'form', 'method'=>'POST')) !!}
              <input type="hidden" name="id" value="{{$pageData->id}}">
              <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" value="{{$pageData->name}}"/>
                  @if ($errors->has('name'))
                      <span class="help-block">{{ $errors->first('name') }} </span>
                   @endif
              </div>

              <div class="form-group {{ $errors->has('service') ? ' has-error' : '' }}">
                  <label>Services</label>
                  <select name="service" class="form-control">
                    <option value="">--Choose Services--</option>
                    @foreach($listService as $liS => $value)
                    <option value="{{$liS}}" @if($liS==$pageData->service) selected @endif>{{$value}}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('service'))
                      <span class="help-block">{{ $errors->first('service') }} </span>
                   @endif
              </div>

              <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                  <label>Description</label>
                  <textarea name="description" class="form-control">{{$pageData->description}}</textarea>
                  @if ($errors->has('description'))
                      <span class="help-block">{{ $errors->first('description') }} </span>
                   @endif
              </div>

              <div class="form-group {{ $errors->has('primary_price') ? ' has-error' : '' }}">
                  <label>Primary Price</label>
                  <input type="text" name="primary_price" class="form-control" value="{{$primaryPrice}}"/>
                  @if ($errors->has('primary_price'))
                      <span class="help-block">{{ $errors->first('primary_price') }} </span>
                   @endif
              </div>

              <div class="form-group {{ $errors->has('secondary_price') ? ' has-error' : '' }}">
                  <label>Secondary Price</label>
                  <input type="text" name="secondary_price" class="form-control" value="{{$secondaryPrice}}"/>
                  @if ($errors->has('secondary_price'))
                      <span class="help-block">{{ $errors->first('secondary_price') }} </span>
                   @endif
              </div>

              <div class="button pull-left">
                  <button type="submit" class="btn btn-primary btn-sm">Update</button>
                  <a href="{{URL::to('package')}}" class="btn btn-default btn-sm">Cancel</a>
              </div>
          {!! Form::close() !!}
      </div>
  </div>
                       
                      
                   
@endsection

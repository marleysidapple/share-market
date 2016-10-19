@extends('layouts.master')

@section('main-content')
                         
                          <!-- START VERTICAL FORM SAMPLE -->
  {!!csrf_field()!!}
  <div class="panel panel-default">
      <div class="panel-body">
          <h3>Add New Company Type</h3>
          {!! Form::open(array('url'=>'company-type/add', 'role'=>'form', 'method'=>'POST')) !!}
              <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                  <label>Name</label>
                  <input type="text" name="type" class="form-control" value="{{old('type')}}"/>
                  @if ($errors->has('type'))
                      <span class="help-block">{{ $errors->first('type') }} </span>
                   @endif
              </div>

              <div class="button pull-left">
                  <button type="submit" class="btn btn-primary btn-sm">Add</button>
                  <a href="{{URL::to('company-type')}}" class="btn btn-default btn-sm">Cancel</a>
              </div>
          {!! Form::close() !!}
      </div>
  </div>
                       
                      
                   
@endsection

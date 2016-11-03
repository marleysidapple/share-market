@extends('layouts.master')

@section('main-content')
                         
                          <!-- START VERTICAL FORM SAMPLE -->
  {!!csrf_field()!!}
  <div class="panel panel-default">
      <div class="panel-body">
          <h3>Add New Package System</h3>
          {!! Form::open(array('url'=>'package/service/add', 'role'=>'form', 'method'=>'POST', 'id'=>'servicePackageForm')) !!}
              <div class="form-group {{ $errors->has('service_name') ? ' has-error' : '' }}">
                  <label>Name</label>
                  <input type="text" id="service_name" name="service_name" class="form-control" value="{{old('service_name')}}"/>
                  @if ($errors->has('service_name'))
                      <span class="help-block">{{ $errors->first('service_name') }} </span>
                   @endif
              </div>

              <div class="button pull-left">
                  <button type="submit" class="btn btn-primary btn-sm">Add</button>
                  <a href="{{URL::to('package/service')}}" class="btn btn-default btn-sm">Cancel</a>
              </div>
          {!! Form::close() !!}
      </div>
  </div>
                       
                      
                   
@endsection

@section('javascript')

<script type="text/javascript" src="{{asset('js/jquery.validate.js')}}"></script>
<script src="{{asset('js/custom.jquery.validate.js')}}"></script>
                   
@endsection

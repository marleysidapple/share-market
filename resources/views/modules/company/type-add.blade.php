@extends('layouts.master')

@section('main-content')
                         
                          <!-- START VERTICAL FORM SAMPLE -->
  {!!csrf_field()!!}
  <div class="panel panel-default">
      <div class="panel-body">
          <h3>Add New Company Type</h3>
          {!! Form::open(array('url'=>'company-type/add', 'role'=>'form', 'method'=>'POST', 'id'=>'companytypeForm')) !!}
              <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                  <label>Name</label>
                  <input type="text" id="type" name="type" class="form-control" value="{{old('type')}}"/>
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

@section('javascript')

<script type="text/javascript" src="{{asset('js/jquery.validate.js')}}"></script>
<script src="{{asset('js/custom.jquery.validate.js')}}"></script>
                   
@endsection

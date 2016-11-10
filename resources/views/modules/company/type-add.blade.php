@extends('layouts.master')

@section('main-content')
                         
                          <!-- START VERTICAL FORM SAMPLE -->
  {!!csrf_field()!!}
  <div class="panel panel-default">
      <div class="panel-heading">
          <h3 class="panel-title"><strong>Add New Company Type</strong></h3>
      </div>
      <div class="panel-body">
          {!! Form::open(array('url'=>'company-type/add', 'role'=>'form', 'class'=>'form-horizontal', 'method'=>'POST', 'id'=>'companytypeForm')) !!}
              <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Name *</label>
                  <div class="col-md-6 col-xs-12">   
                  <input type="text" id="type" name="type" class="form-control" value="{{old('type')}}"/>
                  @if ($errors->has('type'))
                      <span class="help-block">{{ $errors->first('type') }} </span>
                   @endif
                  </div>
              </div>

              <div class="button" style="margin-left:270px;">
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

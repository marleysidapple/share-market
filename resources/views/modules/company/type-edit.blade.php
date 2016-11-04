@extends('layouts.master')

@section('main-content')
                         
                          <!-- START VERTICAL FORM SAMPLE -->
  {!!csrf_field()!!}
  <div class="panel panel-default">
      <div class="panel-body">
          <h3>Edit Company Type Details</h3>
          {!! Form::open(array('url'=>'company-type/edit', 'role'=>'form', 'method'=>'POST', 'id'=>'companytypeForm')) !!}

              <input type="hidden" name="id" value="{{$pageData->id}}">
              <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                  <label>Name</label>
                  <input type="text" id="type" name="type" class="form-control" value="{{$pageData->type}}"/>
                  @if ($errors->has('type'))
                      <span class="help-block">{{ $errors->first('type') }} </span>
                   @endif
              </div>

             

              <div class="button pull-left">
                  <button type="submit" class="btn btn-primary btn-sm">Update</button>
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

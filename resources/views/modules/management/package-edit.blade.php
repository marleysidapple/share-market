@extends('layouts.master')

@section('main-content')
                         
                          <!-- START VERTICAL FORM SAMPLE -->
  {!!csrf_field()!!}
  <div class="panel panel-default">
      <div class="panel-heading">
          <h3 class="panel-title"><strong>{{$pageData->name}} - </strong>Edit</h3>
      </div>
      <div class="panel-body">
          <!-- <h3>Edit Package System</h3> -->
          {!! Form::open(array('url'=>'package/edit', 'role'=>'form', 'class'=>'form-horizontal', 'method'=>'POST', 'id'=>'packageForm')) !!}
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

               <div class="form-group {{ $errors->has('service') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label" for="selectall">Services *</label><br />
                  <div class="col-md-6 col-xs-12">
                    <div class="chk-container">
                      <div><input type="checkbox" id="selectall" name="allService" @if(count($serviceResult) == 0) checked @endif> All &nbsp;</div>
                      @foreach($listService as $liS)
                        {{--*/ $checkStatus = ''; /*--}}
                        @foreach($relatedServiceList as $rSlist)
                          @if($liS == $rSlist){{--*/ $checkStatus = 'checked'; /*--}}@endif
                        @endforeach
                      <div class="checkboxli"><input type="checkbox" class="checkbox1" name="service[]" value="{{$liS}}" {{$checkStatus}}> {{$liS}} &nbsp;</div>
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
                  <input type="text" id="primary_price" name="primary_price" class="form-control" value="{{$primaryPrice}}"/>
                  @if ($errors->has('primary_price'))
                      <span class="help-block">{{ $errors->first('primary_price') }} </span>
                   @endif
                  </div>
              </div>

              <div class="form-group {{ $errors->has('secondary_price') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Secondary Price *</label>
                  <div class="col-md-6 col-xs-12">
                  <input type="text" id="secondary_price" name="secondary_price" class="form-control" value="{{$secondaryPrice}}"/>
                  @if ($errors->has('secondary_price'))
                      <span class="help-block">{{ $errors->first('secondary_price') }} </span>
                   @endif
                  </div>
              </div>

              <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Description</label>
                  <div class="col-md-6 col-xs-12">
                  <textarea name="description" class="form-control">{{$pageData->description}}</textarea>
                  @if ($errors->has('description'))
                      <span class="help-block">{{ $errors->first('description') }} </span>
                   @endif
                  </div>
              </div>

              <div class="button" style="margin-left:270px;">
                  <button type="submit" class="btn btn-primary btn-sm">Update</button>
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

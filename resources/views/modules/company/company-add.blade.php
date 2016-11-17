\@extends('layouts.master')

@section('main-content')
                         
                          <!-- START VERTICAL FORM SAMPLE -->
  {!!csrf_field()!!}
  <div class="panel panel-default">
      <div class="panel-heading">
          <h3 class="panel-title"><strong>Add New Company</strong></h3>
          
      </div>
      <div class="panel-body">
          {!! Form::open(array('url'=>'company/add', 'role'=>'form', 'method'=>'POST', 'class'=>'form-horizontal', 'id'=>'companyForm')) !!}
              <div class="form-group {{ $errors->has('company_name') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Name *</label>
                  <div class="col-md-6 col-xs-12">   
                  <input type="text" id="company_name" name="company_name" class="form-control" value="{{old('company_name')}}"/>
                  @if ($errors->has('company_name'))
                      <span class="help-block">{{ $errors->first('company_name') }} </span>
                   @endif
                  </div>
              </div>

              <div class="form-group {{ $errors->has('company_type_id') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Company Type *</label>
                  <div class="col-md-6 col-xs-12">   
                  <select id="company_type_id" name="company_type_id" class="form-control">
                    <option>--select--</option>
                    @foreach($companyType as $ctData)
                    <option value="{{$ctData->id}}">{{$ctData->type}}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('company_type_id'))
                      <span class="help-block">{{ $errors->first('company_type_id') }} </span>
                   @endif
                  </div>
              </div>

              <div class="form-group {{ $errors->has('company_ticker') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Company Ticker *</label>
                  <div class="col-md-6 col-xs-12">   
                  <input type="text" id="company_ticker" name="company_ticker" class="form-control" value="{{old('company_ticker')}}"/>
                  @if ($errors->has('company_ticker'))
                      <span class="help-block">{{ $errors->first('company_ticker') }} </span>
                   @endif
                  </div>
              </div>

              <div class="form-group {{ $errors->has('rts_id') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Choose RTS *</label>
                  <div class="col-md-6 col-xs-12">   
                  <select id="rts_id" name="rts_id" class="form-control">
                    <option>--select--</option>
                     @foreach($rtaList as $rtaData)
                    <option value="{{$rtaData->id}}">{{$rtaData->name}}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('rts_id'))
                      <span class="help-block">{{ $errors->first('rts_id') }} </span>
                   @endif
                  </div>
              </div>


              <div class="button" style="margin-left:270px;">
                  <button type="submit" class="btn btn-primary btn-sm">Add</button>
                  <a href="{{URL::to('management/listed-company')}}" class="btn btn-default btn-sm">Cancel</a>
              </div>
          {!! Form::close() !!}
      </div>
  </div>
                       
                      
                   
@endsection

@section('javascript')

<script type="text/javascript" src="{{asset('js/jquery.validate.js')}}"></script>
<script src="{{asset('js/custom.jquery.validate.js')}}"></script>
                   
@endsection
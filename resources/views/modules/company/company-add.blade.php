\@extends('layouts.master')

@section('main-content')
                         
                          <!-- START VERTICAL FORM SAMPLE -->
  {!!csrf_field()!!}
  <div class="panel panel-default">
      <div class="panel-body">
          <h3>Add New Company</h3>
          {!! Form::open(array('url'=>'company/add', 'role'=>'form', 'method'=>'POST', 'id'=>'companyForm')) !!}
              <div class="form-group {{ $errors->has('company_name') ? ' has-error' : '' }}">
                  <label>Name</label>
                  <input type="text" id="company_name" name="company_name" class="form-control" value="{{old('company_name')}}"/>
                  @if ($errors->has('company_name'))
                      <span class="help-block">{{ $errors->first('company_name') }} </span>
                   @endif
              </div>

              <div class="form-group {{ $errors->has('company_type_id') ? ' has-error' : '' }}">
                  <label>Company Type</label>
                  <select id="company_type_id" name="company_type_id" class="form-control">
                    <option value="">--select--</option>
                    @foreach($companyType as $ctData)
                    <option value="{{$ctData->id}}">{{$ctData->type}}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('company_type_id'))
                      <span class="help-block">{{ $errors->first('company_type_id') }} </span>
                   @endif
              </div>

              <div class="form-group {{ $errors->has('company_ticker') ? ' has-error' : '' }}">
                  <label>Company Ticker</label>
                  <input type="text" id="company_ticker" name="company_ticker" class="form-control" value="{{old('company_ticker')}}"/>
                  @if ($errors->has('company_ticker'))
                      <span class="help-block">{{ $errors->first('company_ticker') }} </span>
                   @endif
              </div>

              <div class="form-group {{ $errors->has('rta_id') ? ' has-error' : '' }}">
                  <label>RTA</label>
                  <select id="rta_id" name="rta_id" class="form-control">
                    <option value="">--select--</option>
                     @foreach($rtaList as $rtaData)
                    <option value="{{$rtaData->id}}">{{$rtaData->name}}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('rta_id'))
                      <span class="help-block">{{ $errors->first('rta_id') }} </span>
                   @endif
              </div>


              <div class="button pull-left">
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
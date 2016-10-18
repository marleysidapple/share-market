@extends('layouts.master')

@section('main-content')
                         
                          <!-- START VERTICAL FORM SAMPLE -->
  {!!csrf_field()!!}
  <div class="panel panel-default">
      <div class="panel-body">
          <h3>Edit Company Details</h3>
          {!! Form::open(array('url'=>'company/edit', 'role'=>'form', 'method'=>'POST')) !!}
               <input type="hidden" name="id" value="{{$pageData->id}}">
              <div class="form-group {{ $errors->has('company_name') ? ' has-error' : '' }}">
                  <label>Name</label>
                  <input type="text" name="company_name" class="form-control" value="{{$pageData->company_name}}"/>
                  @if ($errors->has('company_name'))
                      <span class="help-block">{{ $errors->first('company_name') }} </span>
                   @endif
              </div>

              <div class="form-group {{ $errors->has('company_type_id') ? ' has-error' : '' }}">
                  <label>Choose Company Type</label>
                  <select name="company_type_id" class="form-control">
                    @foreach($companyType as $ctData)
                    <option value="{{$ctData->id}}" @if($pageData->company_type_id == $ctData->id) selected @endif>{{$ctData->type}}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('company_type_id'))
                      <span class="help-block">{{ $errors->first('company_type_id') }} </span>
                   @endif
              </div>

              <div class="form-group {{ $errors->has('company_ticker') ? ' has-error' : '' }}">
                  <label>Company Ticker</label>
                  <input type="text" name="company_ticker" class="form-control" value="{{$pageData->company_ticker}}"/>
                  @if ($errors->has('company_ticker'))
                      <span class="help-block">{{ $errors->first('company_ticker') }} </span>
                   @endif
              </div>

              <div class="form-group {{ $errors->has('rta_id') ? ' has-error' : '' }}">
                  <label>Choose RTA</label>
                  <select name="rta_id" class="form-control">
                    @foreach($rtaList as $rtaData)
                    <option value="{{$rtaData->id}}" @if($pageData->rta_id == $rtaData->id) selected @endif>{{$rtaData->name}}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('rta_id'))
                      <span class="help-block">{{ $errors->first('rta_id') }} </span>
                   @endif
              </div>


              <div class="button pull-left">
                  <button type="submit" class="btn btn-primary btn-sm">Update</button>
                  <a href="{{URL::to('company')}}" class="btn btn-default btn-sm">Cancel</a>
              </div>
          {!! Form::close() !!}
      </div>
  </div>
                       
                      
                   
@endsection

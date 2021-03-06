@extends('layouts.master')

@section('main-content')
                         
                          <!-- START VERTICAL FORM SAMPLE -->
  {!!csrf_field()!!}
  <div class="panel panel-default">
      <div class="panel-body">
          <h3>Add New Bank</h3>
          {!! Form::open(array('url'=>'bank/add', 'role'=>'form', 'method'=>'POST', 'id'=>'bankForm')) !!}
              <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                  <label>Name</label>
                  <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}"/>
                  <div class="fb-error"></div>
                  @if ($errors->has('name'))
                      <span class="help-block">{{ $errors->first('name') }} </span>
                   @endif
              </div>

              <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                  <label>Address</label>
                  <input type="text" id="address" name="address" class="form-control" value="{{old('address')}}"/>
                  @if ($errors->has('address'))
                      <span class="help-block">{{ $errors->first('address') }} </span>
                   @endif
              </div>

              <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                  <label>Phone</label>
                  <input type="text" id="phone" name="phone" class="form-control" value="{{old('phone')}}"/>
                  @if ($errors->has('phone'))
                      <span class="help-block">{{ $errors->first('phone') }} </span>
                   @endif
              </div>

              <div class="form-group {{ $errors->has('bank_grade') ? ' has-error' : '' }}">
                  <label>Bank Grade</label><br />
                  <label class="radio-inline">
                      <input name="bank_grade" value="A" checked type="radio">A
                  </label>
                  <label class="radio-inline">
                      <input name="bank_grade" value="B" type="radio">B
                  </label>
                  <label class="radio-inline">
                      <input name="bank_grade" value="C" type="radio">C
                  </label>
                  <label class="radio-inline">
                      <input name="bank_grade" value="D" type="radio">D
                    </label>

              </div>

              <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                  <label>Email</label>
                  <input type="text" id="email" name="email" class="form-control" value="{{old('email')}}"/>
                  @if ($errors->has('email'))
                      <span class="help-block">{{ $errors->first('email') }} </span>
                   @endif
              </div>

              <div class="form-group {{ $errors->has('contact_person') ? ' has-error' : '' }}">
                  <label>Contact Person</label>
                  <input type="text" name="contact_person" class="form-control" value="{{old('contact_person')}}"/>
                  @if ($errors->has('contact_person'))
                      <span class="help-block">{{ $errors->first('contact_person') }} </span>
                   @endif
              </div>

              <div class="form-group {{ $errors->has('contact_person_no') ? ' has-error' : '' }}">
                  <label>Contact Person Number</label>
                  <input type="text" name="contact_person_no" class="form-control" value="{{old('contact_person_no')}}"/>
                  @if ($errors->has('contact_person_no'))
                      <span class="help-block">{{ $errors->first('contact_person_no') }} </span>
                   @endif
              </div>

              <div class="button pull-left">
                  <button type="submit" class="btn btn-primary btn-sm">Add</button>
                  <a href="{{URL::to('management/bank')}}" class="btn btn-default btn-sm">Cancel</a>
              </div>
          {!! Form::close() !!}
      </div>
  </div>
                       
              
                   
@endsection

@section('javascript')

<script type="text/javascript" src="{{asset('js/jquery.validate.js')}}"></script>
<script src="{{asset('js/custom.jquery.validate.js')}}"></script>
                   
@endsection

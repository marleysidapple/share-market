@extends('layouts.master')


@section('main-content')
<style>
.personal{
	padding-bottom: 15px;
}

.row .last{
	padding-bottom: 20px;
}

.btn-sm{
	margin-bottom: 5px;
}

.bankdetail{
	padding-bottom: 10px;
}


</style>
 <form action="{{url('home/customer/store')}}" method="post">
 	 <div class="panel panel-default">
        <div class="panel-body">
	        <h3>Add New Customer</h3>
	        <hr/> 	
	        <div class="row personal">
			 	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
			              <label>Full Name</label>
			              <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Full name" />
			              @if ($errors->has('name'))<span class="help-block">{{ $errors->first('name') }} </span>@endif
			          </div>
			 	</div>

			 	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
			              <label>Email</label>
			              <input type="text" name="email" class="form-control" value="{{old('email')}}" placeholder="Email address" />
			              @if ($errors->has('email'))<span class="help-block">{{ $errors->first('email') }} </span>@endif
			          </div>
			 	</div>

			 	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
			              <label>Gender</label>
			              <select class="form-control select" name="gender">
			                <option value="">Select Gender</option>
			              	<option value="male">Male</option>
			              	<option value="female">Female</option>
			              	<option value="Other">other</option>
			              </select>
			              @if ($errors->has('gender'))<span class="help-block">{{ $errors->first('gender') }} </span>@endif
			          </div>
			 	</div>
			 	
			 	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('dateofbirth') ? ' has-error' : '' }}">
			              <label>Date Of Birth</label>
			              <input type="text" name="dateofbirth" class="form-control datepicker" value="{{old('dateofbirth')}}" placeholder="Date of birth" />
			              @if ($errors->has('dateofbirth'))<span class="help-block">{{ $errors->first('dateofbirth') }} </span>@endif
			          </div>
			 	</div>
			</div>

			<div class="row personal">
			 	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('fathername') ? ' has-error' : '' }}">
			              <label>Father's name</label>
			              <input type="text" name="fathername" class="form-control" value="{{old('fathername')}}"/>
			              @if ($errors->has('fathername'))<span class="help-block">{{ $errors->first('fathername') }} </span>@endif
			          </div>
			 	</div>


			 	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('mothername') ? ' has-error' : '' }}">
			              <label>Mother's Name</label>
			              <input type="text" name="mothername" class="form-control" value="{{old('mothername')}}"/>
			              @if ($errors->has('mothername'))<span class="help-block">{{ $errors->first('mothername') }} </span>@endif
			          </div>
			 	</div>


			 	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('grandfathername') ? ' has-error' : '' }}">
			              <label>Grand Father's name</label>
			              <input type="text" name="grandfathername" class="form-control" value="{{old('grandfathername')}}"/>
			              @if ($errors->has('grandfathername'))<span class="help-block">{{ $errors->first('grandfathername') }} </span>@endif
			          </div>
			 	</div>


			  	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('grandmothername') ? ' has-error' : '' }}">
			              <label>Grand mother's name</label>
			              <input type="text" name="grandmothername" class="form-control" value="{{old('grandmothername')}}"/>
			              @if ($errors->has('grandmothername'))<span class="help-block">{{ $errors->first('grandmothername') }} </span>@endif
			          </div>
			 	</div>
			</div>

			<div class="row personal">
			 	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('permanentaddress') ? ' has-error' : '' }}">
			              <label>Permanent Address</label>
			              <input type="text" name="permanentaddress" class="form-control" value="{{old('permanentaddress')}}"/>
			              @if ($errors->has('permanentaddress'))<span class="help-block">{{ $errors->first('permanentaddress') }} </span>@endif
			          </div>
			 	</div>


			 	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('temporaryaddress') ? ' has-error' : '' }}">
			              <label>Temporary address</label>
			              <input type="text" name="temporaryaddress" class="form-control" value="{{old('temporaryaddress')}}"/>
			              @if ($errors->has('temporaryaddress'))<span class="help-block">{{ $errors->first('temporaryaddress') }} </span>@endif
			          </div>
			 	</div>


			 	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
			              <label>Phone No.</label>
			              <input type="text" name="phone" class="form-control" value="{{old('phone')}}"/>
			              @if ($errors->has('phone'))<span class="help-block">{{ $errors->first('phone') }} </span>@endif
			          </div>
			 	</div>


			  	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
			              <label>Mobile No.</label>
			              <input type="text" name="mobile" class="form-control" value="{{old('mobile')}}"/>
			              @if ($errors->has('mobile'))<span class="help-block">{{ $errors->first('mobile') }} </span>@endif
			          </div>
			 	</div>
			</div>

			<div class="row personal">
			 	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('permanentaddress') ? ' has-error' : '' }}">
			              <label>Country</label>
			              <select class="form-control bfh-countries" data-country="NP" name="country"></select>
			              @if ($errors->has('country'))<span class="help-block">{{ $errors->first('country') }} </span>@endif
			          </div>
			 	</div>


			 	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('citizenshipno') ? ' has-error' : '' }}">
			              <label>Citizenship no.</label>
			              <input type="text" name="citizenshipno" class="form-control" value="{{old('citizenshipno')}}"/>
			              @if ($errors->has('citizenshipno'))<span class="help-block">{{ $errors->first('citizenshipno') }} </span>@endif
			          </div>
			 	</div>


			 	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('maritalstatus') ? ' has-error' : '' }}">
			              <label>Marital Status</label>
			             <select class="form-control select" name="maritalstatus">
			             	<option value="">Select Marital status</option>
			             	<option value="single">Single</option>
			             	<option value="married">Married</option>
			             	<option value="other">Other</option>
			             </select>
			              @if ($errors->has('maritalstatus'))<span class="help-block">{{ $errors->first('maritalstatus') }} </span>@endif
			          </div>
			 	</div>


			  	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('occupation') ? ' has-error' : '' }}">
			              <label>Occupation</label>
			              <input type="text" name="occupation" class="form-control" value="{{old('occupation')}}"/>
			              @if ($errors->has('occupation'))<span class="help-block">{{ $errors->first('occupation') }} </span>@endif
			          </div>
			 	</div>
			</div>

			<h3>Bank Information</h3>
			<hr/>	
			<div class="row">
			<span class="btn btn-primary btn-sm newrow">Add New Row</span> &nbsp; <span class="btn btn-primary btn-sm removerow">Remove row</span>
				<div class="bankdetail">
					<div class="col-sm-3">
				 		  <div class="form-group {{ $errors->has('bank') ? ' has-error' : '' }}">
				              <label>Bank Name</label>
				              <select class="form-control select" name="bank[]">
				                <option value="">Select Bank</option>
				                @foreach($bank as $key => $val)
				                <option value="{{$val->id}}">{{$val->name}}</option>
				                @endforeach
				              </select>
				              @if ($errors->has('bank'))<span class="help-block">{{ $errors->first('bank') }} </span>@endif
				          </div>
				 	</div>


				 	<div class="col-sm-3">
				 		  <div class="form-group {{ $errors->has('accountnumber') ? ' has-error' : '' }}">
				              <label>Account No</label>
				              <input type="text" name="accountnumber[]" class="form-control" value="{{old('accountnumber')}}" />
				              @if ($errors->has('accountnumber'))<span class="help-block">{{ $errors->first('accountnumber') }} </span>@endif
				          </div>
				 	</div>

				 	<div class="col-sm-3">&nbsp;</div>
				 	<div class="col-sm-3">&nbsp;</div>
				 	<div class="clearfix"></div>
			</div>

		 </div>

		 <div class="row added">

		
      	</div>
 </form>

@endsection


@section('javascript')
<script type="text/javascript">
	$('.newrow').off('click').on('click', function(e){
        $('.bankdetail:first').clone(true).appendTo('.added');
	});

	$('.removerow').off('click').on('click', function(e){
		if ($('.added').find('.bankdetail').length == 0){
			//$('.bankdetail:last').remove();
			alert('You cannot delete first row');
			return;
		} 
		$('.bankdetail:last').remove();
		
	});
</script>
@endsection
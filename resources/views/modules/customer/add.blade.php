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
 {!! csrf_field() !!}
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
			<span class="btn btn-primary btn-sm newrow">Add New Bank</span>
				<div class="bankdetail">
					<div class="col-sm-3">
				 		  <div class="form-group">
				              <label>Bank Name</label>
				              <select class="form-control" name="customer[0][bank]">
				                <option value="">Select Bank</option>
				                @foreach($bank as $key => $val)
				                <option value="{{$val->id}}">{{$val->name}}</option>
				                @endforeach
				              </select>
				               @if ($errors->has('customer.0.bank'))<span class="help-block">{{ $errors->first('customer.0.bank') }} </span>@endif
				          </div>
				 	</div>


				 	<div class="col-sm-3">
				 		  <div class="form-group">
				              <label>Account No</label>
				              <input type="text" name="customer[0][accountno]" class="form-control" value="{{old('accountnumber')}}" />
				               @if ($errors->has('customer.0.accountno'))<span class="help-block">{{ $errors->first('customer.0.accountno') }} </span>@endif
				          </div>
				 	</div>

				 	<div class="col-sm-3">&nbsp;</div>
				 	<div class="col-sm-3">&nbsp;</div>
				 	<div class="clearfix"></div>
			</div>

		 </div>

		 <div class="row added"></div>

		 <!--login details-->

		 <h3 style="margin-top:5px;">Login Credentials</h3>
		 <hr/>

		 <div class="row">
		 	 <div class=" col-sm-6 form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="{{$username}}" readonly/>
                @if ($errors->has('username'))<span class="help-block">{{ $errors->first('username') }} </span>@endif
			 </div> 
		 </div>

		 <div class="row" style="margin-top:15px;">
			 <div class=" col-sm-6 form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="{{old('password')}}"/>
                @if ($errors->has('password'))<span class="help-block">{{ $errors->first('password') }} </span>@endif
			 </div>
		</div>

		<div class="clearfix"></div>
		<div class="col-sm-6" style="margin-top:10px;">
			<span class="text text-primary"><strong>Multiple users or not?&nbsp;&nbsp;</strong><input type="radio" name="multiple" value="1">Yes &nbsp; <input type="radio" name="multiple" value="0">No</span>
			 @if ($errors->has('multiple'))<span class="help-block">{{ $errors->first('multiple') }} </span>@endif
		</div>
		<div class="clearfix"></div><br/>
		<button type="submit" class="btn btn-primary btn-sm">Submit</button>
   </div>
 </form>
@endsection


@section('javascript')
<script type="text/javascript">
    var i = 1;
	$('.newrow').off('click').on('click', function(e){
		var newi = i++;
        var htmlbuild = `<div class="bankdetail"><div class="col-sm-3">
				 		  <div class="form-group">
				              <label>Bank Name</label>
				              <select class="form-control select" name="customer[`+newi+`][bank]">
				                <option value="">Select Bank</option>
				                @foreach($bank as $key => $val)
				                <option value="{{$val->id}}">{{$val->name}}</option>
				                @endforeach
				              </select>
				            
				          </div>
				 	</div>

				 	<div class="col-sm-3">
				 		  <div class="form-group">
				              <label>Account No</label>
				              <input type="text" name="customer[`+newi+`][accountno]" class="form-control" value="{{old('accountnumber')}}"/>
				            
				          </div>
				 	</div>
				 	<div class="col-sm-3" style="margin-top:25px;"><span class="btn btn-danger btn-sm rmrow">Remove Row</span></div>
				 	<div class="col-sm-3">&nbsp;</div>
				 	<div class="clearfix"></div>
				 	</div>`;
        $('.added').append(htmlbuild);
	});



	$('.added').off('click').on('click', '.rmrow', function(){
		$(this).parent().parent().remove();
	});
</script>
@endsection
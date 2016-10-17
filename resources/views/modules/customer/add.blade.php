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
 <form action="{{url('home/customer/store')}}" method="post" enctype="multipart/form-data">
 {!! csrf_field() !!}
 	 <div class="panel panel-default">
        <div class="panel-body">
	        <h4>Customer Detail - Personal Info</h4>
	        <hr/> 	
	        <div class="row personal">
			 	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
			              <label>Full Name</label>
			              <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Full name" />
			              @if ($errors->has('name'))<span class="help-block">{{ $errors->first('name') }} </span>@endif
			          </div>
			 	</div>

			 	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
			              <label>Email</label>
			              <input type="text" name="email" class="form-control" value="{{old('email')}}" placeholder="Email address" />
			              @if ($errors->has('email'))<span class="help-block">{{ $errors->first('email') }} </span>@endif
			          </div>
			 	</div>

			 	<div class="col-sm-2">
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
			 	
			 	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('dateofbirth') ? ' has-error' : '' }}">
			              <label>Date Of Birth</label>
			              <input type="text" name="dateofbirth" class="form-control" id="dob" value="{{old('dateofbirth')}}" placeholder="Date of birth" />
			              @if ($errors->has('dateofbirth'))<span class="help-block">{{ $errors->first('dateofbirth') }} </span>@endif
			          </div>
			 	</div>

			 	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('fathername') ? ' has-error' : '' }}">
			              <label>Father's name</label>
			              <input type="text" name="fathername" class="form-control" value="{{old('fathername')}}"/>
			              @if ($errors->has('fathername'))<span class="help-block">{{ $errors->first('fathername') }} </span>@endif
			          </div>
			 	</div>


			 	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('mothername') ? ' has-error' : '' }}">
			              <label>Mother's Name</label>
			              <input type="text" name="mothername" class="form-control" value="{{old('mothername')}}"/>
			              @if ($errors->has('mothername'))<span class="help-block">{{ $errors->first('mothername') }} </span>@endif
			          </div>
			 	</div>

			</div>

			<div class="row personal">
			 	

			 	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('grandfathername') ? ' has-error' : '' }}">
			              <label>Grand Father's name</label>
			              <input type="text" name="grandfathername" class="form-control" value="{{old('grandfathername')}}"/>
			              @if ($errors->has('grandfathername'))<span class="help-block">{{ $errors->first('grandfathername') }} </span>@endif
			          </div>
			 	</div>


			  	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('grandmothername') ? ' has-error' : '' }}">
			              <label>Grand mother's name</label>
			              <input type="text" name="grandmothername" class="form-control" value="{{old('grandmothername')}}"/>
			              @if ($errors->has('grandmothername'))<span class="help-block">{{ $errors->first('grandmothername') }} </span>@endif
			          </div>
			 	</div>


			  	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
			              <label>Mobile No.</label>
			              <input type="text" name="mobile" class="form-control" value="{{old('mobile')}}"/>
			              @if ($errors->has('mobile'))<span class="help-block">{{ $errors->first('mobile') }} </span>@endif
			          </div>
			 	</div>

			 	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('pan') ? ' has-error' : '' }}">
			              <label>PAN No.</label>
			              <input type="text" name="pan" class="form-control" value="{{old('pan')}}"/>
			              @if ($errors->has('pan'))<span class="help-block">{{ $errors->first('pan') }} </span>@endif
			          </div>
			 	</div>

			 		<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('profilephoto') ? ' has-error' : '' }}">
			              <label>Profile Picture</label>
			              <input type="file" name="profilephoto" class="form-control" value="{{old('profilephoto')}}"/>
			              @if ($errors->has('profilephoto'))<span class="help-block">{{ $errors->first('profilephoto') }} </span>@endif
			          </div>
			 	</div>
			</div>

		
			<br/>
			<h4>Address Information</h4>
			<hr/>
			<h5>Permanent Address Detail</h5><br/>
			<div class="row personal">
					<div class="col-sm-2">
			 		   <div class="form-group {{ $errors->has('zone') ? ' has-error' : '' }}">
			              <label>Zone</label>
			             <select class="form-control zone" name="zone">
			             	<option value="">Select zone</option>
			             	@foreach($zone as $key => $val)
			             		<option value="{{$val->id}}">{{$val->name}}</option>
			             	@endforeach
			             </select>
			              @if ($errors->has('zone'))<span class="help-block">{{ $errors->first('zone') }} </span>@endif
			          </div>
			 		</div>


			 	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('district') ? ' has-error' : '' }}">
			              <label>District</label>
			             <select class="form-control district" name="district">
			             	
			             </select>
			              @if ($errors->has('district'))<span class="help-block">{{ $errors->first('district') }} </span>@endif
			          </div>
			 	</div>


			 	 	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('vdc_municipality') ? ' has-error' : '' }}">
			              <label>VDC/Municipality</label>
			              <input type="text" name="vdc_municipality" class="form-control" value="{{old('vdc_municipality')}}"/>
			              @if ($errors->has('vdc_municipality'))<span class="help-block">{{ $errors->first('vdc_municipality') }} </span>@endif
			          </div>
			 	   </div>

			 	   	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('ward') ? ' has-error' : '' }}">
			              <label>Ward No.</label>
			              <input type="text" name="ward" class="form-control" value="{{old('ward')}}"/>
			              @if ($errors->has('ward'))<span class="help-block">{{ $errors->first('ward') }} </span>@endif
			          </div>
			 	   </div>


			  	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('street') ? ' has-error' : '' }}">
			              <label>Street Address</label>
			              <input type="text" name="street" class="form-control" value="{{old('street')}}"/>
			              @if ($errors->has('street'))<span class="help-block">{{ $errors->first('street') }} </span>@endif
			          </div>
			 	</div>
			</div>



			<h5>Temporary Address Detail</h5><br/>
			<div class="row personal">
					<div class="col-sm-2">
			 		   <div class="form-group {{ $errors->has('tzone') ? ' has-error' : '' }}">
			              <label>Zone</label>
			             <select class="form-control tzone" name="tzone">
			             	<option value="">Select zone</option>
			             	@foreach($zone as $key => $val)
			             		<option value="{{$val->id}}">{{$val->name}}</option>
			             	@endforeach
			             </select>
			              @if ($errors->has('tzone'))<span class="help-block">{{ $errors->first('tzone') }} </span>@endif
			          </div>
			 		</div>


			 	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('tdistrict') ? ' has-error' : '' }}">
			              <label>District</label>
			             <select class="form-control tdistrict" name="tdistrict">
			             	
			             </select>
			              @if ($errors->has('tdistrict'))<span class="help-block">{{ $errors->first('tdistrict') }} </span>@endif
			          </div>
			 	</div>


			 	 	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('tvdc_municipality') ? ' has-error' : '' }}">
			              <label>VDC/Municipality</label>
			              <input type="text" name="tvdc_municipality" class="form-control" value="{{old('tvdc_municipality')}}"/>
			              @if ($errors->has('tvdc_municipality'))<span class="help-block">{{ $errors->first('tvdc_municipality') }} </span>@endif
			          </div>
			 	   </div>

			 	   	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('tward') ? ' has-error' : '' }}">
			              <label>Ward No.</label>
			              <input type="text" name="tward" class="form-control" value="{{old('tward')}}"/>
			              @if ($errors->has('tward'))<span class="help-block">{{ $errors->first('tward') }} </span>@endif
			          </div>
			 	   </div>


			  	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('tstreet') ? ' has-error' : '' }}">
			              <label>Street Address</label>
			              <input type="text" name="tstreet" class="form-control" value="{{old('tstreet')}}"/>
			              @if ($errors->has('tstreet'))<span class="help-block">{{ $errors->first('tstreet') }} </span>@endif
			          </div>
			 	</div>
			</div>

			<br/>
			<h4>Citizenship Information</h4><hr/>
			<div class="row personal">
			 	<div class="col-sm-2">
			 		   <div class="form-group {{ $errors->has('issuedistrict') ? ' has-error' : '' }}">
			              <label>Citizenship Issued District</label>
			             <select class="form-control" name="issuedistrict">
			             	<option value="">Select District</option>
			             	@foreach($district as $key => $val)
			             	<option value="{{$val->id}}">{{$val->name}}</option>
			             	@endforeach
			             </select>
			              @if ($errors->has('issuedistrict'))<span class="help-block">{{ $errors->first('issuedistrict') }} </span>@endif
			          </div>
			 	</div>


			 	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('citizenshipno') ? ' has-error' : '' }}">
			              <label>Citizenship no.</label>
			              <input type="text" name="citizenshipno" class="form-control" value="{{old('citizenshipno')}}"/>
			              @if ($errors->has('citizenshipno'))<span class="help-block">{{ $errors->first('citizenshipno') }} </span>@endif
			          </div>
			 	</div>


			 	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('issuedate') ? ' has-error' : '' }}">
			              <label>Citizenship Issued Date.</label>
			              <input type="text" name="issuedate" id="issuedate" class="form-control" value="{{old('issuedate')}}"/>
			              @if ($errors->has('issuedate'))<span class="help-block">{{ $errors->first('issuedate') }} </span>@endif
			          </div>
			 	</div>


			  	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('scancitizenshipcopy') ? ' has-error' : '' }}">
			              <label>Scanned copy of citizenship</label>
			              <input type="file" name="scancitizenshipcopy" class="form-control" value="{{old('scancitizenshipcopy')}}"/>
			              @if ($errors->has('scancitizenshipcopy'))<span class="help-block">{{ $errors->first('scancitizenshipcopy') }} </span>@endif
			          </div>
			 	</div>
			</div>

	
			<br/>
			<h4>Bank Information</h4>
			<hr/>	
			<div class="row">
			<span class="btn btn-primary btn-sm newrow">Add New Bank</span>
				<div class="bankdetail">
					<div class="col-sm-2">
				 		  <div class="form-group">
				              <label>Bank Name</label>
				              <select class="form-control bank" name="customer[0][bank]">
				                <option value="">Select Bank</option>
				                @foreach($bank as $key => $val)
				                <option value="{{$val->id}}">{{$val->name}}</option>
				                @endforeach
				              </select>
				               @if ($errors->has('customer.0.bank'))<span class="help-block">{{ $errors->first('customer.0.bank') }} </span>@endif
				          </div>
				 	</div>


				 	<div class="col-sm-2">
				 		  <div class="form-group mybranch">
				              <label>Select Branch</label>
				              <select class="form-control branch" name="customer[0][branch]">

				              </select>
				               @if ($errors->has('customer.0.branch'))<span class="help-block">{{ $errors->first('customer.0.branch') }} </span>@endif
				          </div>
				 	</div>



				 	<div class="col-sm-2">
				 		  <div class="form-group">
				              <label>Account No</label>
				              <input type="text" name="customer[0][accountno]" class="form-control" value="{{old('accountnumber')}}" />
				               @if ($errors->has('customer.0.accountno'))<span class="help-block">{{ $errors->first('customer.0.accountno') }} </span>@endif
				          </div>
				 	</div>

				 	<div class="col-sm-6">&nbsp;</div>
				 	<div class="clearfix"></div>
			</div>

		 </div>

		 <div class="row added"></div>

		 <br/>
		 <h4>Occupation Information</h4><hr/>
			<div class="row personal">
			 

			 	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('organisation') ? ' has-error' : '' }}">
			              <label>Organisation Name</label>
			              <input type="text" name="organisation" class="form-control" value="{{old('organisation')}}"/>
			              @if ($errors->has('organisation'))<span class="help-block">{{ $errors->first('organisation') }} </span>@endif
			          </div>
			 	</div>

			 	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('designation') ? ' has-error' : '' }}">
			              <label>Designation</label>
			              <input type="text" name="designation" class="form-control" value="{{old('designation')}}"/>
			              @if ($errors->has('designation'))<span class="help-block">{{ $errors->first('designation') }} </span>@endif
			          </div>
			 	</div>


			  	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
			              <label>Office Address</label>
			              <input type="text" name="address" class="form-control" value="{{old('address')}}"/>
			              @if ($errors->has('address'))<span class="help-block">{{ $errors->first('address') }} </span>@endif
			          </div>
			 	</div>

			 	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('contact') ? ' has-error' : '' }}">
			              <label>Contact No.</label>
			              <input type="text" name="contact" class="form-control" value="{{old('contact')}}"/>
			              @if ($errors->has('contact'))<span class="help-block">{{ $errors->first('contact') }} </span>@endif
			          </div>
			 	</div>
			</div>

		 <!--login details-->
		 <br/>
		 <h4 style="margin-top:5px;">Login Credentials</h4>
		 <hr/>

		 	 <div class=" col-sm-2 form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="{{$username}}" readonly/>
                @if ($errors->has('username'))<span class="help-block">{{ $errors->first('username') }} </span>@endif
			 </div> 
		

		 
			 <div class=" col-sm-2 form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="{{old('password')}}"/>
                @if ($errors->has('password'))<span class="help-block">{{ $errors->first('password') }} </span>@endif
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
        var htmlbuild = `<div class="bankdetail">
        			<div class="col-sm-2">
				 		  <div class="form-group">
				              <label>Bank Name</label>
				              <select class="form-control bank" name="customer[`+newi+`][bank]">
				                <option value="">Select Bank</option>
				                @foreach($bank as $key => $val)
				                <option value="{{$val->id}}">{{$val->name}}</option>
				                @endforeach
				              </select>
				            
				          </div>
				 	</div>

				 		<div class="col-sm-2">
				 		  <div class="form-group mybranch">
				              <label>Select Branch</label>
				              <select class="form-control branch" name="customer[`+newi+`][branch]">

				              </select>
				          </div>
				 	</div>

				 	<div class="col-sm-2">
				 		  <div class="form-group">
				              <label>Account No</label>
				              <input type="text" name="customer[`+newi+`][accountno]" class="form-control" value="{{old('accountnumber')}}"/>
				            
				          </div>
				 	</div>
				 	<div class="col-sm-2" style="margin-top:25px;"><span class="btn btn-danger btn-sm rmrow">Remove Row</span></div>
				 	<div class="clearfix"></div>
				 	</div>`;
        $('.added').append(htmlbuild);
	});



	$('.added').off('click').on('click', '.rmrow', function(){
		$(this).parent().parent().remove();
	});


	$('select.zone').off('change').on('change', function(){
		var zone = $('select.zone option:selected').val();

		$.ajax({
			type:'post',
			url: '{{url("home/customer/district")}}',
			data: {zone: zone, _token: $('input[name=_token]').val()},
			success: function(data){
				$('select.district').html('');
				$.each(data, function(key, value){
					var tapp = "<option value='"+value.id+"'>"+value.name+"</option>";
					$('select.district').append(tapp);  
				});
				
			}
		});
	});

	$('select.tzone').off('change').on('change', function(){
		var tempzone = $('select.tzone option:selected').val();

		$.ajax({
			type:'post',
			url: '{{url("home/customer/district")}}',
			data: {zone: tempzone, _token: $('input[name=_token]').val()},
			success: function(data){
				$('select.tdistrict').html('');
				$.each(data, function(key, value){
					var tapp = "<option value='"+value.id+"'>"+value.name+"</option>";
					$('select.tdistrict').append(tapp);  
				});
				
			}
		});
	});


	$(document.body).off('change').on('change', 'select.bank', function(){
		var $this = $(this);
		var bank = $(this).find('option:selected').val();
		$.ajax({
			type:'post',
			url: '{{url("home/customer/branch")}}',
			data: {bank: bank, _token: $('input[name=_token]').val()},
			success: function(data){
				$this.closest('.bankdetail').find('.branch').html('');
				$.each(data, function(key, value){
					var tbank = "<option value='"+value.id+"'>"+value.address+"</option>";
					//$('.bankdetail').('select.branch').append(tbank);  
					//$('select.branch').append(tbank);  
					$this.closest('.bankdetail').find('.branch').append(tbank);
				});
				
			}
		});
		
	});


  $(function(){
     $( "#dob, #issuedate" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: '1930:2016',
      dateFormat: 'yy-mm-dd'
    });
  });
 
</script>
@endsection
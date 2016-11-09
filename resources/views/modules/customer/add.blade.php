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

span.required{
	color: red;
}


</style>
 <form action="{{url('home/customer/store')}}" method="post" enctype="multipart/form-data" id="customer">
 {!! csrf_field() !!}
 	 <div class="panel panel-default">
        <div class="panel-body">

        <!--package and service detail-->
        <h4>Package detail</h4>
	        <hr/> 	
	        <div class="row personal">
			 	
			 	<div class="col-sm-6">
			 		  <div class="form-group {{ $errors->has('package') ? ' has-error' : '' }}">
			              <label>Choose Package</label>
			              <select class="form-control select" name="package">
			              	<option value="">Select Package</option>
			              @foreach($packages as $key => $val)
			              	<option value="{{$val->id}}">{{$val->name}}</option>
			              @endforeach
			              </select>
			              @if ($errors->has('package'))<span class="help-block">{{ $errors->first('package') }} </span>@endif
			          </div>
			 	</div>
			 	 	

			 	<div class="col-sm-6">
				 	<div class="form-group">
				 		<label>Focus Services</label>
				 		<div class="form-group">
				 		<table class="table table bordered">
				 			@foreach($service as $key => $val)
				 				<tr>
				 					<td>{{$val->service_name}}</td>
				 					<td><input type="checkbox" name="service[]" value="{{$val->id}}"/></td>
				 				</tr>
				 			@endforeach
				 		</table>
				 		<!--  @foreach($service as $key => $val)
					 		<div class="col-sm-4">
					 			<input type="checkbox" name="service[]" value="{{$val->id}}"/>&nbsp; {{$val->service_name}}<br/>
					 		</div>
					 	@endforeach -->
					 	</div>
				 	</div>
			 	</div>


			 	<!-- <div class="col-sm-6">
			 	   <label>Select Service</label>
			 	 	@foreach($service as $key => $val)
			            <div class="form-group col-sm-2">
			              <input type="checkbox" name="service[]" value="{{$val->id}}"/>&nbsp; {{$val->service_name}}<br/>
			            </div>
			          </div>
			           @if ($errors->has('service'))<span class="help-block">{{ $errors->first('service') }} </span>@endif
			        @endforeach
			 	</div> -->
			 	 	
			</div>


		
        <!--package and service detail-->

	        <h4>Customer Detail - Client Profile</h4>
	        <hr/> 	
	        <div class="row personal">
			 	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
			              <label>Full Name<span class="required">&nbsp;*</span></label>
			              <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Full name" />
			              @if ($errors->has('name'))<span class="help-block">{{ $errors->first('name') }} </span>@endif
			          </div>
			 	</div>


			 	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
			              <label>Gender</label>
			              <select class="form-control select" name="gender">
			              	<option value="male" {{old('gender') == 'male' ? 'selected' : ''}}>Male</option>
			              	<option value="female" {{old('gender') == 'female' ? 'selected' : ''}}>Female</option>
			              	<option value="other" {{old('gender') == 'other' ? 'selected' : ''}}>other</option>
			              </select>
			              @if ($errors->has('gender'))<span class="help-block">{{ $errors->first('gender') }} </span>@endif
			          </div>
			 	</div>
			 	
			 	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('dateofbirth') ? ' has-error' : '' }}">
			              <label>Date Of Birth</label>
			              <input type="text" name="dateofbirth" class="form-control" id="dob" value="{{old('dateofbirth')}}" placeholder="Date of birth" />
			              @if ($errors->has('dateofbirth'))<span class="help-block">{{ $errors->first('dateofbirth') }} </span>@endif
			          </div>
			 	</div>


			 	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('fathername') ? ' has-error' : '' }}">
			              <label>Father's name</label>
			              <input type="text" name="fathername" class="form-control" value="{{old('fathername')}}"/>
			              @if ($errors->has('fathername'))<span class="help-block">{{ $errors->first('fathername') }} </span>@endif
			          </div>
			 	</div>
			 </div>


			 <div class="row personal">

			 	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('grandfathername') ? ' has-error' : '' }}">
			              <label>Grand Father's name</label>
			              <input type="text" name="grandfathername" class="form-control" value="{{old('grandfathername')}}"/>
			              @if ($errors->has('grandfathername'))<span class="help-block">{{ $errors->first('grandfathername') }} </span>@endif
			          </div>
			 	</div>

			 	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('husband_wife_name') ? ' has-error' : '' }}">
			              <label>Husband/Wife's Name</label>
			              <input type="text" name="husband_wife_name" class="form-control" value="{{old('husband_wife_name')}}"/>
			              @if ($errors->has('husband_wife_name'))<span class="help-block">{{ $errors->first('husband_wife_name') }} </span>@endif
			          </div>
			 	</div>


			 		<div class="col-sm-2" style="margin-top: 10px;">
			 		  <div class="form-group {{ $errors->has('profilephoto') ? ' has-error' : '' }}">
			              <label>Profile Picture</label>
			              <input type="file" name="profilephoto" class="form-control" value="{{old('profilephoto')}}"/>
			              @if ($errors->has('profilephoto'))<span class="help-block">{{ $errors->first('profilephoto') }} </span>@endif
			          </div>
			 	</div>
			</div>
			



			<!--Contact info-->
			 <h4>Contact Info</h4>
	        <hr/> 	
	        <div class="row personal">
	        		<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
			              <label>Email</label>
			              <input type="text" name="email" class="form-control" value="{{old('email')}}" placeholder="Email address" />
			              @if ($errors->has('email'))<span class="help-block">{{ $errors->first('email') }} </span>@endif
			          </div>
			 		</div>

			 	 <div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
			              <label>Mobile No.</label>
			              <input type="text" name="mobile" class="form-control" value="{{old('mobile')}}"/>
			              @if ($errors->has('mobile'))<span class="help-block">{{ $errors->first('mobile') }} </span>@endif
			          </div>
			 	</div>

			 	 <div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('homeno') ? ' has-error' : '' }}">
			              <label>Home No.</label>
			              <input type="text" name="homeno" class="form-control" value="{{old('homeno')}}"/>
			              @if ($errors->has('homeno'))<span class="help-block">{{ $errors->first('homeno') }} </span>@endif
			          </div>
			 	</div>

			</div>

			<!--end of contact info-->

		
		
			<br/>
			<h4>Contact Address</h4>
			<hr/>
			<h5>Permanent Address</h5><br/>
			<div class="row personal">
					<div class="col-sm-2">
			 		   <div class="form-group {{ $errors->has('zone') ? ' has-error' : '' }}">
			              <label>Zone <span class="required">*</span></label>
			             <select class="form-control zone" name="zone">
			             	<option value="">Select zone</option>
			             	@foreach($zone as $key => $val)
			             		<option value="{{$val->id}}" {{old('zone') == $val->id ? 'selected' : ''}}>{{$val->name}}</option>
			             	@endforeach
			             </select>
			              @if ($errors->has('zone'))<span class="help-block">{{ $errors->first('zone') }} </span>@endif
			          </div>
			 		</div>


			 	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('district') ? ' has-error' : '' }}">
			              <label>District <span class="required">*</span></label>
			             <select class="form-control district" name="district">
			             	
			             </select>
			              @if ($errors->has('district'))<span class="help-block">{{ $errors->first('district') }} </span>@endif
			          </div>
			 	</div>


			 	 	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('vdc_municipality') ? ' has-error' : '' }}">
			              <label>Municipality/VDC <span class="required">*</span></label>
			              <input type="text" name="vdc_municipality" class="form-control" value="{{old('vdc_municipality')}}"/>
			              @if ($errors->has('vdc_municipality'))<span class="help-block">{{ $errors->first('vdc_municipality') }} </span>@endif
			          </div>
			 	   </div>

			 	   	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('ward') ? ' has-error' : '' }}">
			              <label>Ward No. <span class="required">*</span></label>
			              <input type="text" name="ward" class="form-control" value="{{old('ward')}}"/>
			              @if ($errors->has('ward'))<span class="help-block">{{ $errors->first('ward') }} </span>@endif
			          </div>
			 	   </div>


			  	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
			              <label>Address <span class="required">*</span></label>
			              <input type="text" name="address" class="form-control" value="{{old('address')}}"/>
			              @if ($errors->has('address'))<span class="help-block">{{ $errors->first('address') }} </span>@endif
			          </div>
			 	</div>

			</div>



			<h5>Temporary Address</h5><br/>
			<div class="row personal">
					<div class="col-sm-2">
			 		   <div class="form-group {{ $errors->has('tzone') ? ' has-error' : '' }}">
			              <label>Zone</label>
			             <select class="form-control tzone" name="tzone">
			             	<option value="">Select zone</option>
			             	@foreach($zone as $key => $val)
			             		<option value="{{$val->id}}" {{old('tzone') == $val->id ? 'selected' : ''}}>{{$val->name}}</option>
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
			              <label>Municipality/VDC</label>
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
			 		  <div class="form-group {{ $errors->has('taddress') ? ' has-error' : '' }}">
			              <label>Address</label>
			              <input type="text" name="taddress" class="form-control" value="{{old('taddress')}}"/>
			              @if ($errors->has('taddress'))<span class="help-block">{{ $errors->first('taddress') }} </span>@endif
			          </div>
			 	   </div>

			</div>

			<br/>
			<h4>Citizenship Details</h4><hr/>
			<div class="row personal">
			 	<div class="col-sm-3">
			 		   <div class="form-group {{ $errors->has('issuedistrict') ? ' has-error' : '' }}">
			              <label>Citizenship Issued Place <span class="required">*</span></label>
			             <select class="form-control" name="issuedistrict">
			             	<option value="">Select District</option>
			             	@foreach($district as $key => $val)
			             	<option value="{{$val->id}}">{{$val->name}}</option>
			             	@endforeach
			             </select>
			              @if ($errors->has('issuedistrict'))<span class="help-block">{{ $errors->first('issuedistrict') }} </span>@endif
			          </div>
			 	</div>


			 	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('citizenshipno') ? ' has-error' : '' }}">
			              <label>Citizenship no. <span class="required">*</span></label>
			              <input type="text" name="citizenshipno" class="form-control" value="{{old('citizenshipno')}}"/>
			              @if ($errors->has('citizenshipno'))<span class="help-block">{{ $errors->first('citizenshipno') }} </span>@endif
			          </div>
			 	</div>


			 	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('issuedate') ? ' has-error' : '' }}">
			              <label>Issued Date. <span class="required">*</span></label>
			              <input type="text" name="issuedate" id="issuedate" class="form-control" value="{{old('issuedate')}}"/>
			              @if ($errors->has('issuedate'))<span class="help-block">{{ $errors->first('issuedate') }} </span>@endif
			          </div>
			 	</div>

			  	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('scancitizenshipcopy') ? ' has-error' : '' }}">
			              <label>Scanned copy of citizenship <span class="required">*</span></label>
			              <input type="file" name="scancitizenshipcopy" class="form-control" value="{{old('scancitizenshipcopy')}}"/>
			              @if ($errors->has('scancitizenshipcopy'))<span class="help-block">{{ $errors->first('scancitizenshipcopy') }} </span>@endif
			          </div>
			 	</div>
			</div>

	<!-- 
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
				              <label>Branch Office</label>
				              <select class="form-control branch" name="customer[0][branch]">

				              </select>
				               @if ($errors->has('customer.0.branch'))<span class="help-block">{{ $errors->first('customer.0.branch') }} </span>@endif
				          </div>
				 	</div>

				 	<div class="col-sm-2">
				 		  <div class="form-group mybranch">
				              <label>Account Name</label>
				              <input type="text" name="customer[0][accname]" class="form-control">
				               @if ($errors->has('customer.0.accname'))<span class="help-block">{{ $errors->first('customer.0.accname') }} </span>@endif
				          </div>
				 	</div>



				 	<div class="col-sm-2">
				 		  <div class="form-group">
				              <label>Account No</label>
				              <input type="text" name="customer[0][accountno]" class="form-control" value="{{old('accountnumber')}}" />
				               @if ($errors->has('customer.0.accountno'))<span class="help-block">{{ $errors->first('customer.0.accountno') }} </span>@endif
				          </div>
				 	</div>

				 	<div class="col-sm-4">&nbsp;</div>
				 	<div class="clearfix"></div>
			</div>

		 </div>

		 <div class="row added"></div> -->

		 <br/>
		 <h4>Occupation Information</h4><hr/>
			<div class="row personal">
			 

			 	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('organisation') ? ' has-error' : '' }}">
			              <label>Organisation Name</label>
			              <input type="text" name="organisation" class="form-control" value="{{old('organisation')}}"/>
			              @if ($errors->has('organisation'))<span class="help-block">{{ $errors->first('organisation') }} </span>@endif
			          </div>
			 	</div>

			 	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('designation') ? ' has-error' : '' }}">
			              <label>Designation</label>
			              <input type="text" name="designation" class="form-control" value="{{old('designation')}}"/>
			              @if ($errors->has('designation'))<span class="help-block">{{ $errors->first('designation') }} </span>@endif
			          </div>
			 	</div>


			  	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
			              <label>Organisation Address</label>
			              <input type="text" name="address" class="form-control" value="{{old('address')}}"/>
			              @if ($errors->has('address'))<span class="help-block">{{ $errors->first('address') }} </span>@endif
			          </div>
			 	</div>

			 	<div class="col-sm-3">
			 		  <div class="form-group {{ $errors->has('contact') ? ' has-error' : '' }}">
			              <label>Contact No.</label>
			              <input type="text" name="contact" class="form-control" value="{{old('contact')}}"/>
			              @if ($errors->has('contact'))<span class="help-block">{{ $errors->first('contact') }} </span>@endif
			          </div>
			 	</div>
			</div>




		 <br/>
		 <h4>Other Information</h4><hr/>
			<div class="row personal">
			 

			 	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('reference') ? ' has-error' : '' }}">
			              <label>Reference Person</label>
			              <input type="text" name="reference" class="form-control" value="{{old('reference')}}"/>
			              @if ($errors->has('reference'))<span class="help-block">{{ $errors->first('reference') }} </span>@endif
			          </div>
			 	</div>

			 	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('focus') ? ' has-error' : '' }}">
			              <label>Main Focus</label>
			              <input type="text" name="focus" class="form-control" value="{{old('focus')}}"/>
			              @if ($errors->has('focus'))<span class="help-block">{{ $errors->first('focus') }} </span>@endif
			          </div>
			 	</div>


			  	<div class="col-sm-2">
			 		  <div class="form-group {{ $errors->has('clienttype') ? ' has-error' : '' }}">
			              <label>Client Type</label>
			              <input type="text" name="clienttype" class="form-control" value="{{old('clienttype')}}"/>
			              @if ($errors->has('clienttype'))<span class="help-block">{{ $errors->first('clienttype') }} </span>@endif
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
			 		  <div class="form-group {{ $errors->has('income') ? ' has-error' : '' }}">
			              <label>Income (p.a)</label>
			              <input type="text" name="income" class="form-control" value="{{old('income')}}"/>
			              @if ($errors->has('income'))<span class="help-block">{{ $errors->first('income') }} </span>@endif
			          </div>
			 	</div>
			</div>




		<!-- DMAT Detail-->
		<!--  <br/>
		 <h4>DMAT Account Information</h4><hr/>
			<div class="row personal">
				<span class="btn btn-primary btn-sm newreg">Add New Row</span>
				 <div class="registrardetail">
						<div class="col-sm-2">
						 	<div class="form-group">
						              <label>Select DMAT Registrar</label>
						              <select class="form-control registrar" name="dmat[0][registrar]">
						                <option value="">Select DMAT Registrar</option>
						               	<option value="broker">Broker</option>
						               	<option value="dp">DP</option>
						               	<option value="rta">RTA</option>
						              </select>
						               @if ($errors->has('dmat.0.registrar'))<span class="help-block">{{ $errors->first('dmat.0.registrar') }} </span>@endif
						    </div>
						</div>

					 	<div class="col-sm-2">
						 		  <div class="form-group"> 
						 		  	  <label>Name</label>
						              <select class="form-control regname" name="dmat[0][regname]">
						              
						              </select>
						               @if ($errors->has('dmat.0.regname'))<span class="help-block">{{ $errors->first('dmat.0.regname') }} </span>@endif
						          </div>
						</div>


					  
					 	<div class="col-sm-2">
					 		  <div class="form-group {{ $errors->has('accno') ? ' has-error' : '' }}">
					              <label>Account No.</label>
					              <input type="text" name="dmat[0][accno]" class="form-control" value="{{old('accno')}}"/>
					               @if ($errors->has('dmat.0.accno'))<span class="help-block">{{ $errors->first('dmat.0.accno') }} </span>@endif
					          </div>
					 	</div>
					 	<div class="col-sm-6">&nbsp;</div>
						<div class="clearfix"></div>
				</div>
			</div>

			<div class="row addede"></div> -->
		<!--End of DMAT Detail-->

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
                <input type="password" name="password" class="form-control" value="{{$username}}" readonly/>
                @if ($errors->has('password'))<span class="help-block">{{ $errors->first('password') }} </span>@endif
			 </div>
		

		<div class="clearfix"></div><br/>
		<button type="submit" class="btn btn-primary btn-sm">Submit</button>
   </div>
 </form>
@endsection


@section('javascript')
<script type="text/javascript">

   $().ready(function() {
      $(".zone").trigger('change');
      $(".tzone").trigger('change');      
    });

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
				 		  <div class="form-group mybranch">
				              <label>Account Name</label>
				              <input type="text" name="customer[`+newi+`][accname]" class="form-control">
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
					var tapp = `<option value='`+value.id+`'>`+value.name+`</option>`;
					$('select.district').append(tapp);  
				});
				
			}
		});
	});



	$('select.district').on('change', function(){
			localStorage.setItem('district', $('select.district option:selected').val());
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


	


	$(document).on('change', '.bank', function(){
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



	 var i = 1;
	$('.newreg').off('click').on('click', function(e){
		var newe = i++;
        var htmlbuilde = ` <div class="registrardetail">
						<div class="col-sm-2">
						 	<div class="form-group">
						              <label>Select DMAT Registrar</label>
						              <select class="form-control registrar" name="dmat[`+newe+`][registrar]">
						                <option value="">Select DMAT Registrar</option>
						               	<option value="broker">Broker</option>
						               	<option value="dp">DP</option>
						               	<option value="rta">RTA</option>
						              </select>
						    </div>
						</div>

					 	<div class="col-sm-2">
						 		  <div class="form-group"> 
						 		  	  <label>Name</label>
						              <select class="form-control regname" name="dmat[`+newe+`][regname]">
						              </select>
						          </div>
						</div>

					 	<div class="col-sm-2">
					 		  <div class="form-group {{ $errors->has('accno') ? ' has-error' : '' }}">
					              <label>Account No.</label>
					              <input type="text" name="dmat[`+newe+`][accno]" class="form-control" value="{{old('accno')}}"/>
					          </div>
					 	</div>
				 	<div class="col-sm-2" style="margin-top:25px;"><span class="btn btn-danger btn-sm rmreg">Remove Row</span></div>
				 	<div class="clearfix"></div>
				 	</div>`;
        $('.addede').append(htmlbuilde);
	});



	$('.addede').off('click').on('click', '.rmreg', function(){
		$(this).parent().parent().remove();
	});


	$(document).on('change', '.registrar', function(){
		var $this = $(this);
		var registrar = $(this).closest('.registrardetail').find('select.registrar option:selected').val();
		$.ajax({
			type:'post',
			url: '{{url("home/customer/registrar")}}',
			data: {registrar: registrar, _token: $('input[name=_token]').val()},
			success: function(data){
				$this.closest('.registrardetail').find('.regname').html('');
				$.each(data, function(key, value){
					var tname = "<option value='"+value.id+"'>"+value.name+"</option>";
					//$('.bankdetail').('select.branch').append(tbank);  
					//$('select.branch').append(tbank);  
					$this.closest('.registrardetail').find('.regname').append(tname);
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



   $("#customer").validate({
   
   rules: {
	     // no quoting necessary
	     name: "required",
	     zone: "required",
	     district: "required",
	     vdc_municipality: "required",
	     ward: "required",
	     address: "required",
	     issuedistrict: "required",
	     citizenshipno: "required",
	     issuedate: "required",
	     scancitizenshipcopy: "required",
	     password: "required"

   }
 });
 
</script>
@endsection
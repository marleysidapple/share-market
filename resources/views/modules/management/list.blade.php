@extends('layouts.master')

@section('main-content')


 @include('errors.errors')
  
<div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Management</h3>

    </div>
<!--     <div class="panel-body">
     <div class="table-responsive">

     </div>
    </div> -->

    <div class="panel panel-default tabs">
        <ul class="nav nav-tabs">
            <li class="@if($tabId=='bank' || $tabId==''){{'active'}}@endif"><a href="pages-edit-profile.html#tab1" data-toggle="tab" id="bank">Bank</a></li>
            <li class="@if($tabId=='broker'){{'active'}}@endif"><a href="pages-edit-profile.html#tab2" data-toggle="tab" id="broker">Broker</a></li>
            <li class="@if($tabId=='rts'){{'active'}}@endif"><a href="pages-edit-profile.html#tab3" data-toggle="tab" id="rts">RTS</a></li>
            <li class="@if($tabId=='dp'){{'active'}}@endif"><a href="pages-edit-profile.html#tab4" data-toggle="tab" id="dp">Depository Participants(DP)</a></li>
            <li class="@if($tabId=='listed-company'){{'active'}}@endif"><a href="pages-edit-profile.html#tab5" data-toggle="tab" id="listed-company">Listed Company</a></li>                                    
        </ul>
        <div class="tab-content">
            <div class="tab-pane panel-body @if($tabId=='bank' || $tabId==''){{'active'}}@endif" id="tab1">   
	            <div class="row">
	            	<a href="{{URL::to('bank/add')}}" class="btn btn-success btn-sm pull-right">Add New</a>   
	            </div> 
	            <br />
            	<div class="table-responsive">
		         <table id="customers2" class="table datatable">
		             <thead>
		                 <tr>
		                     <th>S.no</th>
		                     <th>Name</th>
		                     <th>Address</th>
		                     <th>Phone</th>
		                     <th>Email</th>
		                     <th>Level</th>
		                     <th>Action</th>
		                 </tr>
		             </thead>

		             @if(Input::has('page'))
		                {{--*/$start = Input::get('page')*20-20/*--}}
		              @else
		                {{--*/$start = 0/*--}}
		              @endif

		             <tbody>
		                @foreach($bankData as $pData)
		                {{--*/$start++;/*--}}
		                <tr>
		                    <td>{{$start}}</td>
		                    <td>{{$pData->name}}</td>
		                    <td>{{$pData->address}}</td>
		                    <td>{{$pData->phone}}</td>
		                    <td>{{$pData->email}}</td>
		                    <td>{{$pData->bank_grade}}</td>
		                    <td><a href="{{URL::to('bank/edit/'.$pData->id)}}" class="btn btn-warning btn-sm">Edit</a>&nbsp; 
		                        <a href="javascript:void(0)" data-toggle="modal" data-target="#confirm-delete" data-href="{{URL::to('/bank/delete/'.$pData->id)}}" class="btn btn-danger btn-sm">Delete</a>&nbsp; 
		                        <a href="{{URL::to('branch/'.$pData->id)}}" class="btn btn-success btn-sm">Add Branch</a>
		                    </td>
		                </tr>
		                @endforeach
		             </tbody>
		         </table>
		     </div>

            </div>

            <div class="tab-pane panel-body @if($tabId=='broker'){{'active'}}@endif" id="tab2">
            	<div class="row">
	            	<a href="{{URL::to('broker/add')}}" class="btn btn-success btn-sm pull-right">Add New</a>   
	            </div> 
	            <br />                                        
                <div class="table-responsive">
		         <table id="customers2" class="table datatable">
		             <thead>
		                 <tr>
		                     <th>S.no</th>
		                     <th>Name</th>
		                     <th>Address</th>
		                     <th>Email</th>
		                     <th>Broker No.</th>
		                     <th>Phone</th>
		                     <th>Action</th>
		                 </tr>
		             </thead>

		             @if(Input::has('page'))
		                {{--*/$start = Input::get('page')*20-20/*--}}
		              @else
		                {{--*/$start = 0/*--}}
		              @endif

		             <tbody>
		                @foreach($brokerData as $pData)
		                {{--*/$start++;/*--}}
		                <tr>
		                    <td>{{$start}}</td>
		                    <td>{{$pData->name}}</td>
		                    <td>{{$pData->address}}</td>
		                    <td>{{$pData->email}}</td>
		                    <td>{{$pData->broker_no}}</td>
		                    <td>{{$pData->phone}}</td>
		                    <td><a href="{{URL::to('broker/edit/'.$pData->id)}}" class="btn btn-warning btn-sm">Edit</a>&nbsp; 
		                        <a href="javascript:void(0)" data-toggle="modal" data-target="#confirm-delete" data-href="{{URL::to('/broker/delete/'.$pData->id)}}" class="btn btn-danger btn-sm">Delete</a>&nbsp; 
		                    </td>
		                </tr>
		                @endforeach
		             </tbody>
		         </table>
		     </div>                             
            </div>    

            <div class="tab-pane panel-body @if($tabId=='rts'){{'active'}}@endif" id="tab3">   
            	<div class="row">
	            	<a href="{{URL::to('rts/add')}}" class="btn btn-success btn-sm pull-right">Add New</a>   
	            </div> 
	            <br />                                     
                <div class="table-responsive">
		         <table id="customers2" class="table datatable">
		             <thead>
		                 <tr>
		                     <th>S.no</th>
		                     <th>Name</th>
		                     <th>Email</th>
		                     <th>Phone</th>
		                     <th>Contact Person</th>
		                     <th>Action</th>
		                 </tr>
		             </thead>

		             @if(Input::has('page'))
		                {{--*/$start = Input::get('page')*20-20/*--}}
		              @else
		                {{--*/$start = 0/*--}}
		              @endif

		             <tbody>
		                @foreach($rtsData as $pData)
		                {{--*/$start++;/*--}}
		                <tr>
		                    <td>{{$start}}</td>
		                    <td>{{$pData->name}}</td>
		                    <td>{{$pData->email}}</td>
		                    <td>{{$pData->phone}}</td>
		                    <td>{{$pData->contact_person}}</td>
		                    <td><a href="{{URL::to('rts/edit/'.$pData->id)}}" class="btn btn-warning btn-sm">Edit</a>&nbsp; 
		                        <a href="javascript:void(0)" data-toggle="modal" data-target="#confirm-delete" data-href="{{URL::to('/rts/delete/'.$pData->id)}}" class="btn btn-danger btn-sm">Delete</a>&nbsp; 
		                    </td>
		                </tr>
		                @endforeach
		             </tbody>
		         </table>
		     </div>                             
            </div>  

            <div class="tab-pane panel-body @if($tabId=='dp'){{'active'}}@endif" id="tab4">   
            	<div class="row">
	            	<a href="{{URL::to('dp/add')}}" class="btn btn-success btn-sm pull-right">Add New</a>   
	            </div> 
	            <br />                                     
        		<div class="table-responsive">
		         <table id="customers2" class="table datatable">
		             <thead>
		                 <tr>
		                     <th>S.no</th>
		                     <th>Name</th>
		                     <th>DP Code</th>
		                     <th>Address</th>
		                     <th>Phone</th>
		                     <th>Email</th>
		                     <th>Action</th>
		                 </tr>
		             </thead>

		             @if(Input::has('page'))
		                {{--*/$start = Input::get('page')*20-20/*--}}
		              @else
		                {{--*/$start = 0/*--}}
		              @endif

		             <tbody>
		                @foreach($dpData as $pData)
		                {{--*/$start++;/*--}}
		                <tr>
		                    <td>{{$start}}</td>
		                    <td>{{$pData->name}}</td>
		                    <td>{{$pData->dp_code}}</td>
		                    <td>{{$pData->address}}</td>
		                    <td>{{$pData->phone}}</td>
		                    <td>{{$pData->email}}</td>
		                    <td><a href="{{URL::to('dp/edit/'.$pData->id)}}" class="btn btn-warning btn-sm">Edit</a>&nbsp; 
		                        <a href="javascript:void(0)" data-toggle="modal" data-target="#confirm-delete" data-href="{{URL::to('/dp/delete/'.$pData->id)}}" class="btn btn-danger btn-sm">Delete</a>&nbsp; 
		                    </td>
		                </tr>
		                @endforeach
		             </tbody>
		         </table>
		     </div>                          
            </div>  

            <div class="tab-pane panel-body @if($tabId=='listed-company'){{'active'}}@endif" id="tab5"> 
            	<div class="row">
            		<a href="{{URL::to('company-type')}}" class="btn btn-success btn-sm" style="margin-left:860px">Company Type</a>
	            	<a href="{{URL::to('company/add')}}" class="btn btn-success btn-sm pull-right">Add New</a>   
	            </div> 
	            <br />                                       
                <div class="table-responsive">
		         <table id="customers2" class="table datatable">
		             <thead>
		                 <tr>
		                     <th>S.no</th>
		                     <th>Name</th>
		                     <th>Type</th>
		                     <th>Company Ticker</th>
		                     <th>RTS</th>
		                     <th>Action</th>
		                 </tr>
		             </thead>

		             @if(Input::has('page'))
		                {{--*/$start = Input::get('page')*20-20/*--}}
		              @else
		                {{--*/$start = 0/*--}}
		              @endif

		             <tbody>
		                @foreach($companyData as $pData)
		                {{--*/$start++;/*--}}
		                <tr>
		                    <td>{{$start}}</td>
		                    <td>{{$pData->company_name}}</td>
		                	<td>{{$pData->companyComtype->type}}</td>
		                    <td>{{$pData->company_ticker}}</td>
		                    <td>{{$pData->companyRta->name}}</td>
		                    <td><a href="{{URL::to('company/edit/'.$pData->id)}}" class="btn btn-warning btn-sm">Edit</a>&nbsp; 
		                        <a href="javascript:void(0)" data-toggle="modal" data-target="#confirm-delete" data-href="{{URL::to('/company/delete/'.$pData->id)}}" class="btn btn-danger btn-sm">Delete</a>&nbsp; 
		                    </td>
		                </tr>
		                @endforeach
		             </tbody>
		         </table>
		     	</div>                           
            </div>                                                                      
            
        </div>
        
    </div>
</div>

 @include('shared.confirm-delete')


@endsection

@section('javascript')

<script>
	$( "#bank" ).click(function() {
	  	var url = "{{URL::to('management/bank')}}";
	  	window.location.href = url;
	});
	$( "#broker" ).click(function() {
	  	var url = "{{URL::to('management/broker')}}";
	  	window.location.href = url;
	});
	$( "#rts" ).click(function() {
	  	var url = "{{URL::to('management/rts')}}";
	  	window.location.href = url;
	});
	$( "#dp" ).click(function() {
	  	var url = "{{URL::to('management/dp')}}";
	  	window.location.href = url;
	});
	$( "#listed-company" ).click(function() {
	  	var url = "{{URL::to('management/listed-company')}}";
	  	window.location.href = url;
	});
</script>

@endsection

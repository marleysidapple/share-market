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
            <li class="active"><a href="pages-edit-profile.html#tab1" data-toggle="tab">Bank</a></li>
            <li><a href="pages-edit-profile.html#tab2" data-toggle="tab">Broker</a></li>
            <li><a href="pages-edit-profile.html#tab3" data-toggle="tab">RTS</a></li>
            <li><a href="pages-edit-profile.html#tab4" data-toggle="tab">Depository Participants(DP)</a></li>
            <li><a href="pages-edit-profile.html#tab5" data-toggle="tab">Listed Company</a></li>                                    
        </ul>
        <div class="tab-content">
            <div class="tab-pane panel-body active" id="tab1">                                                                      
            	<div class="table-responsive">
		         <table id="customers2" class="table datatable">
		             <thead>
		                 <tr>
		                     <th>S.no</th>
		                     <th>Name</th>
		                     <th>Address</th>
		                     <th>Phone</th>
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

            <div class="tab-pane panel-body" id="tab2">                                        
                broker                             
            </div>    

            <div class="tab-pane panel-body" id="tab3">                                        
                RTS                             
            </div>  

            <div class="tab-pane panel-body" id="tab4">                                        
                DP                             
            </div>  

            <div class="tab-pane panel-body" id="tab5">                                        
                listed company                             
            </div>                                                                      
            
        </div>
        
    </div>
</div>

 @include('shared.confirm-delete')


@endsection

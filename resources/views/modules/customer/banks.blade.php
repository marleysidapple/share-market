@extends('layouts.customer')

@section('sub-content')
   <div class="panel panel-default">
   		 <div class="panel-body">
       <h3>Edit Bank Detail</h3>
   		     <table id="customers2" class="table">
                                         <thead>
                                             <tr>
                                                 <th>#</th>
                                                 <th>Bank</th>
                                                 <th>Branch</th>                                                 
                                                 <th>Account Name</th>
                                                 <th>Account No.</th>
                                                 <th>Action</th>
                                             </tr>
                                         </thead>
                                         <tbody>  
                                         @foreach($customer_bank as $key => $val)
                                         <tr>
                                           <td>{{$key+1}}</td>
                                           <td>{{$val->bankname->name}}</td>
                                           <td>{{$val->branchname->address}}</td>
                                           <td>{{$val->accountname}}</td>
                                           <td>{{$val->accountno}}</td>
                                           <td><a href="{{url('home/customer/bank/'.$val->customer_id.'/edit/'.$val->branch_id)}}"><i class="fa fa-pencil"></i></a> &nbsp; <a href=""><i class="fa fa-trash-o"></i></a></td>
                                         </tr>
                                         @endforeach
                                         </tbody>
                                     </table>
   		 </div>
   </div>
@endsection

@section('javascript')
<script type="text/javascript">
	
</script>
@endsection
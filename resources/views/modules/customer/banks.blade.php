@extends('layouts.customer')

@section('sub-content')
   <div class="panel panel-default">
   		 <div class="panel-body">
       <h3>Edit Bank Detail</h3> <a href="{{url('home/customer/bank/add/'.$customer->id)}}" class="btn btn-success btn-sm">Add New Bank</a>
   		     <table id="customers2" class="table">
                                         <thead>
                                             <tr>
                                                 <th>#</th>
                                                 <th>Bank</th>
                                                 <th>Branch</th>                                                 
                                                 <th>Account Name</th>
                                                 <th>Account No.</th>
                                                 <th>Is Primary?</th>
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
                                           <td>{{$val->isprimary == 1 ? 'Yes' : 'No'}}</td>
                                           <td><a href="{{url('home/customer/bank/edit/'.$val->id)}}"><i class="fa fa-pencil"></i></a> &nbsp; <a onclick="return confirm('Are you sure?');" href="{{url('home/customer/bank/delete/'.$val->id)}}"><i class="fa fa-trash-o"></i></a></td>
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
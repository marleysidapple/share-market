@extends('layouts.customer')

@section('sub-content')
   <div class="panel panel-default">
   		 <div class="panel-body">
       <h3>Edit DMAT Detail</h3> <a href="{{url('home/customer/dmat/add/'.$customer->id)}}" class="btn btn-success btn-sm">Add New Registrar</a>
   		     <table id="customers2" class="table">
                                         <thead>
                                             <tr>
                                                 <th>#</th>
                                                 <th>Registrar</th>                                                
                                                 <th>Name</th>
                                                 <th>Account No.</th>
                                                 <th>Action</th>
                                             </tr>
                                         </thead>
                                         <tbody>  
                                         @foreach($customer_dmat as $key => $val)
                                         <tr>
                                           <td>{{$key+1}}</td>
                                           <td>{{$val->registrar_type}}</td>
                                           <td>{{GH::getAgent($val->registrar_type, $val->registrar_agent_id)}}</td>
                                           <td>{{$val->accountnumber}}</td>
                                           <td><a href="{{url('home/customer/dmat/edit/'.$val->id)}}"><i class="fa fa-pencil"></i></a> &nbsp; <a onclick="return confirm('Are you sure?');" href="{{url('home/customer/dmat/delete/'.$val->id)}}"><i class="fa fa-trash-o"></i></a></td>
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
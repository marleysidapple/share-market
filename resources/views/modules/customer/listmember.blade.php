@extends('layouts.customer')

@section('sub-content')
   <div class="panel panel-default">
   		 <div class="panel-body">
       <h3>Current Members</h3> <a href="{{url('home/customer/addmember/'.$customer->user_id)}}" class="btn btn-success btn-sm">Add New Member</a>
   		     <table id="customers2" class="table">
                                         <thead>
                                             <tr>
                                                 <th>#</th>
                                                 <th>Member Name</th>
                                                 <th>Email</th>                                                 
                                                 <th>Action</th>
                                             </tr>
                                         </thead>
                                         <tbody>  
                                          @foreach($childrens as $key => $val)
                                            <tr>
                                              <td>{{$key+1}}</td>
                                              <td>{{$val->name}}</td>
                                              <td>{{$val->email}}</td>
                                              <td><a href="#" class="btn btn-danger btn-sm disabled">Delete</a></td>
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
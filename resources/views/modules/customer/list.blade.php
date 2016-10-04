@extends('layouts.master')

@section('main-content')


 
  
      <div class="panel panel-default">
                             <div class="panel-heading">
                                 <h3 class="panel-title">List of Customers&nbsp;<a href="{{url('home/customer/add')}}" class="btn btn-success btn-sm">Add Customer</a></h3>
                                 <div class="btn-group pull-right">
                                     <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown" style="display:none;"><i class="fa fa-bars"></i> Export Data</button>
                                     <ul class="dropdown-menu">
                                         <li><a href="table-export.html#" onClick ="$('#customers2').tableExport({type:'json',escape:'false'});"><img src='img/icons/json.png' width="24"/> JSON</a></li>
                                         <li><a href="table-export.html#" onClick ="$('#customers2').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"><img src='img/icons/json.png' width="24"/> JSON (ignoreColumn)</a></li>
                                         <li><a href="table-export.html#" onClick ="$('#customers2').tableExport({type:'json',escape:'true'});"><img src='img/icons/json.png' width="24"/> JSON (with Escape)</a></li>
                                         <li class="divider"></li>
                                         <li><a href="table-export.html#" onClick ="$('#customers2').tableExport({type:'xml',escape:'false'});"><img src='img/icons/xml.png' width="24"/> XML</a></li>
                                         <li><a href="table-export.html#" onClick ="$('#customers2').tableExport({type:'sql'});"><img src='img/icons/sql.png' width="24"/> SQL</a></li>
                                         <li class="divider"></li>
                                         <li><a href="table-export.html#" onClick ="$('#customers2').tableExport({type:'csv',escape:'false'});"><img src='img/icons/csv.png' width="24"/> CSV</a></li>
                                         <li><a href="table-export.html#" onClick ="$('#customers2').tableExport({type:'txt',escape:'false'});"><img src='img/icons/txt.png' width="24"/> TXT</a></li>
                                         <li class="divider"></li>
                                         <li><a href="table-export.html#" onClick ="$('#customers2').tableExport({type:'excel',escape:'false'});"><img src='img/icons/xls.png' width="24"/> XLS</a></li>
                                         <li><a href="table-export.html#" onClick ="$('#customers2').tableExport({type:'doc',escape:'false'});"><img src='img/icons/word.png' width="24"/> Word</a></li>
                                         <li><a href="table-export.html#" onClick ="$('#customers2').tableExport({type:'powerpoint',escape:'false'});"><img src='img/icons/ppt.png' width="24"/> PowerPoint</a></li>
                                         <li class="divider"></li>
                                         <li><a href="table-export.html#" onClick ="$('#customers2').tableExport({type:'png',escape:'false'});"><img src='img/icons/png.png' width="24"/> PNG</a></li>
                                         <li><a href="table-export.html#" onClick ="$('#customers2').tableExport({type:'pdf',escape:'false'});"><img src='img/icons/pdf.png' width="24"/> PDF</a></li>
                                     </ul>
                                 </div>

                             </div>
                             <div class="panel-body">
                                 <div class="table-responsive">
                                     <table id="customers2" class="table datatable">
                                         <thead>
                                             <tr>
                                                 <th>S.no</th>
                                                 <th>Name</th>
                                                 <th>Email</th>
                                                 <th>Username</th>
                                                 <th>Contact</th>
                                                 <th>Temporary Address</th>
                                                 <th>Citizenship No.</th>
                                                 <th>Date of Birth.</th>
                                                 <th>Action</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                         @foreach($customer as $key => $val)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$val->userdetail->name}}</td>
                                                <td>{{$val->userdetail->email}}</td>
                                                <td>{{$val->userdetail->username}}</td>
                                                <td>{{$val->mobile}}</td>
                                                <td>{{$val->temporaryaddress}}</td>
                                                <td>{{$val->citizenshipno}}</td>
                                                <td>{{$val->dateofbirth}}</td>
                                                <td><a href="" class="btn btn-warning btn-sm">Edit</a>&nbsp;<a href="" class="btn btn-danger btn-sm" disabled>Delete</a></td>
                                            </tr>
                                         @endforeach
                                            
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                         </div>
   
 


@endsection

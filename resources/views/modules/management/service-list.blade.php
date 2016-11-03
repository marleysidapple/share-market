@extends('layouts.master')

@section('main-content')


 @include('errors.errors')
  
<div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title"> <a href="{{URL::to('package')}}">Package Management System</a> -> Service Management</h3>

    </div>
    <div class="panel-body">
    <div class="row">
 
        <a href="{{URL::to('package/service/add')}}" class="btn btn-success btn-sm pull-right">Add New</a>

    </div> 
    <br />
     <div class="table-responsive">
         <table id="customers2" class="table datatable">
             <thead>
                 <tr>
                     <th>S.no</th>
                     <th>Name</th>
                     <th>Action</th>
                 </tr>
             </thead>

             @if(Input::has('page'))
                {{--*/$start = Input::get('page')*20-20/*--}}
              @else
                {{--*/$start = 0/*--}}
              @endif

             <tbody>
                @foreach($pageData as $pData)
                {{--*/$start++;/*--}}
                <tr>
                    <td>{{$start}}</td>
                    <td>{{$pData->service_name}}</td>
                    <td><a href="{{URL::to('package/service/edit/'.$pData->id)}}" class="btn btn-warning btn-sm">Edit</a>&nbsp; 
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#confirm-delete" data-href="{{URL::to('package/service/delete/'.$pData->id)}}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
             </tbody>
         </table>
     </div>
    </div>
</div>

 @include('shared.confirm-delete')


@endsection

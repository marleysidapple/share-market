@extends('layouts.master')

@section('main-content')


 @include('errors.errors')
  
<div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Registrar and Transfer Agent (RTA) Management <a href="{{URL::to('rta/add')}}" class="btn btn-success btn-sm">Add New</a></h3>

    </div>
    <div class="panel-body">
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
                @foreach($pageData as $pData)
                {{--*/$start++;/*--}}
                <tr>
                    <td>{{$start}}</td>
                    <td>{{$pData->name}}</td>
                    <td>{{$pData->email}}</td>
                    <td>{{$pData->phone}}</td>
                    <td>{{$pData->contact_person}}</td>
                    <td><a href="{{URL::to('rta/edit/'.$pData->id)}}" class="btn btn-warning btn-sm">Edit</a>&nbsp; 
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#confirm-delete" data-href="{{URL::to('/rta/delete/'.$pData->id)}}" class="btn btn-danger btn-sm">Delete</a>&nbsp; 
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

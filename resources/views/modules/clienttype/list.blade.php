@extends('layouts.master')

@section('main-content')


 @include('errors.errors')

<div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Client Type Management <a href="{{URL::to('home/clienttype/add')}}" class="btn btn-success btn-sm">Add New</a></h3>

    </div>
    <div class="panel-body">
     <div class="table-responsive">
        <table id="customers2" class="table datatable">
             <thead>
                 <tr>
                     <th>S.no</th>
                     <th>Name</th>
                     <th>Description</th>
                     <th>Status</th>
                     <th>Action</th>
                 </tr>
             </thead>

            

             <tbody>
                @foreach($clients as $key => $pData)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$pData->name}}</td>
                    <td>{{$pData->description}}</td>
                    <td>{{$pData->status == 1 ? 'Active' : 'Suspended'}}</td>
                    <td><a href="{{url('home/clienttype/edit/'.$pData->id)}}" class="btn btn-warning btn-sm">Edit</a>&nbsp; 
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#confirm-delete" data-href="{{URL::to('/broker/delete/'.$pData->id)}}" class="btn btn-danger btn-sm disabled">Delete</a>&nbsp; 
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

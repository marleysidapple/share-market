@extends('layouts.master')

@section('main-content')


 @include('errors.errors')
  
<div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">
<<<<<<< HEAD
        <a href="{{URL::to('home/bank')}}">Bank Management</a> -> Branch List <a href="{{URL::to('home/branch/'.$bankId.'/add')}}" class="btn btn-success btn-sm">Add New Branch</a></h3>

=======
        <a href="{{URL::to('management/bank')}}">Bank Management</a> -> Branch List </h3>
>>>>>>> 0cab9c056deb49ba004bc5696b4409fada0e5b36

    </div>
    <div class="panel-body">
     <div class="table-responsive">
        <div class="row"><a href="{{URL::to('branch/'.$bankId.'/add')}}" class="btn btn-success btn-sm pull-right" style="margin-left:860px;">Add New</a></div><br />
         <table id="customers2" class="table datatable">
             <thead>
                 <tr>
                     <th>S.no</th>
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
                @foreach($pageData as $pData)
                {{--*/$start++;/*--}}
                <tr>
                    <td>{{$start}}</td>
                    <td>{{$pData->address}}</td>
                    <td>{{$pData->phone}}</td>
<<<<<<< HEAD
                    <td><a href="{{URL::to('home/branch/edit/'.$pData->id)}}" class="btn btn-warning btn-sm">Edit</a>&nbsp; 
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#confirm-delete" data-href="{{URL::to('home/branch/'.$pData->bank_id.'/delete/'.$pData->id)}}" class="btn btn-danger btn-sm">Delete</a>&nbsp; 
=======
                    <td>{{$pData->email}}</td>
                    <td><a href="{{URL::to('branch/edit/'.$pData->id)}}" class="btn btn-warning btn-sm">Edit</a>&nbsp; 
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#confirm-delete" data-href="{{URL::to('/branch/'.$pData->bank_id.'/delete/'.$pData->id)}}" class="btn btn-danger btn-sm">Delete</a>&nbsp; 
>>>>>>> 0cab9c056deb49ba004bc5696b4409fada0e5b36
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

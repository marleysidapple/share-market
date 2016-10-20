@extends('layouts.master')

@section('main-content')


 @include('errors.errors')
  
<div class="panel panel-default">
    <div class="panel-heading">

     <h3 class="panel-title">Bank Management <a href="{{URL::to('home/bank/add')}}" class="btn btn-success btn-sm">Add New Bank</a></h3>


    </div>
    <div class="panel-body">
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
                @foreach($pageData as $pData)
                {{--*/$start++;/*--}}
                <tr>
                    <td>{{$start}}</td>
                    <td>{{$pData->name}}</td>
                    <td>{{$pData->address}}</td>
                    <td>{{$pData->phone}}</td>
                    <td>{{$pData->bank_grade}}</td>
                    <td><a href="{{URL::to('home/bank/edit/'.$pData->id)}}" class="btn btn-warning btn-sm">Edit</a>&nbsp; 
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#confirm-delete" data-href="{{URL::to('home/bank/delete/'.$pData->id)}}" class="btn btn-danger btn-sm">Delete</a>&nbsp; 
                        <a href="{{URL::to('home/branch/'.$pData->id)}}" class="btn btn-success btn-sm">Add Branch</a>
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

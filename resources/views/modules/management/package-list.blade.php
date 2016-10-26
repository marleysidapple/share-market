@extends('layouts.master')

@section('main-content')


 @include('errors.errors')
  
<div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Package Management System</h3>

    </div>
    <div class="panel-body">
    <div class="row">
        <a href="{{URL::to('package/add')}}" class="btn btn-success btn-sm pull-right">Add New</a>   
    </div> 
    <br />
     <div class="table-responsive">
         <table id="customers2" class="table datatable">
             <thead>
                 <tr>
                     <th>S.no</th>
                     <th>Name</th>
                     <th>Service</th>
                     <th>Primary Price</th>
                     <th>Secondary Price</th>
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
                    <td>{{$pData->service}}</td>
                    <td>
                        @foreach($pData->packagePrice as $lData)
                            @if($lData->status == 'active'){{$lData->primary_price}}@endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($pData->packagePrice as $lData)
                            @if($lData->status == 'active'){{$lData->secondary_price}}@endif
                        @endforeach
                    </td>
                    <td><a href="{{URL::to('package/edit/'.$pData->id)}}" class="btn btn-warning btn-sm">Edit</a>&nbsp; 
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#confirm-delete" data-href="{{URL::to('/package/delete/'.$pData->id)}}" class="btn btn-danger btn-sm">Delete</a>
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

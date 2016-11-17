@extends('layouts.master')

@section('main-content')
                         
  {!!csrf_field()!!}

  @include('errors.errors')

  <div class="panel panel-default">
      <div class="panel-heading">
          <h3 class="panel-title"><strong>Bank Details</strong></h3>
          
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-4">
            <h5><strong>Name : </strong></h5>
          </div>
          <div class="col-md-4">
            <strong>{{$pageData->name}}</strong>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <h5><strong>Email : </strong></h5>
          </div>
          <div class="col-md-4">
            <strong>{{$pageData->email}}</strong>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <h5><strong>Address : </strong></h5>
          </div>
          <div class="col-md-4">
            <strong>{{$pageData->address}}</strong>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <h5><strong>Phone : </strong></h5>
          </div>
          <div class="col-md-4">
            <strong>{{$pageData->phone}}</strong>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <h5><strong>Bank Grade : </strong></h5>
          </div>
          <div class="col-md-4">
            <strong>{{$pageData->bank_grade}}</strong>
          </div>
        </div>


      </div>

      <div class="panel-heading">
          <h3 class="panel-title"><strong>Add Contact Person</strong></h3>
      </div>
      <div class="panel-body">
          {!! Form::open(array('url'=>'bank/add-contact-person', 'role'=>'form', 'class'=>'form-horizontal', 'method'=>'POST', 'id'=>'contactPersonForm')) !!}
          <input type="hidden" name="id" value="{{$pageData->id}}">
          <div id="addRow0">
            <div class="col-md-5"></div>
            <div class="col-md-5">
              <div class="form-group {{ $errors->has('branch_id') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Branch </label>
                  <div class="col-md-9 col-xs-12">   
                      <select class="form-control" name="branch_id[]" >
                        @foreach($branchList as $bList)
                        <option value="{{$bList->id}}">{{$bList->address}}</option>
                        @endforeach
                      </select>
                      @if ($errors->has('branch_id'))
                          <span class="help-block">{{ $errors->first('branch_id') }} </span>
                       @endif
                  </div>
              </div>
            </div>
    <!--         <div class="col-md-2">
                <a class="btn btn-danger btn-condensed btn-xs" onclick="deleteRow(0);"><i class="glyphicon glyphicon-remove"></i></a>
              </div> -->
            <br /><br /><br />
            <div class="col-md-5">
              <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Name *</label>
                  <div class="col-md-9 col-xs-12">   
                      <input type="text" name="name[]" class="form-control" value="{{old('name')}}"/>
                      <div class="fb-error"></div>
                      @if ($errors->has('name'))
                          <span class="help-block">{{ $errors->first('name') }} </span>
                      @endif
                  </div>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group {{ $errors->has('designation') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Designation *</label>
                  <div class="col-md-9 col-xs-12">   
                      <input type="text" name="designation[]" class="form-control" value="{{old('designation')}}"/>
                      <div class="fb-error"></div>
                      @if ($errors->has('designation'))
                          <span class="help-block">{{ $errors->first('designation') }} </span>
                      @endif
                  </div>
              </div>
            </div>
            <div class="clearfix"></div><br />
            <div class="col-md-5">
              <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Email</label>
                  <div class="col-md-9 col-xs-12">   
                      <input type="text" name="email[]" class="form-control" value="{{old('email')}}"/>
                      @if ($errors->has('email'))
                          <span class="help-block">{{ $errors->first('email') }} </span>
                       @endif
                  </div>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group {{ $errors->has('contact') ? ' has-error' : '' }}">
                  <label class="col-md-3 col-xs-12 control-label">Contact *</label>
                  <div class="col-md-9 col-xs-12">   
                      <input type="text" name="contact[]" class="form-control" value="{{old('contact')}}"/>
                      @if ($errors->has('contact'))
                          <span class="help-block">{{ $errors->first('contact') }} </span>
                       @endif
                  </div>
              </div>
            </div>
            
            <div class="clearfix"></div><br />
            </div>
            

              <div class="button pull-right uptoHere">
                  
                  <button type="submit" class="btn btn-primary btn-sm">Add</button>
                  <a href="{{URL::to('management/bank')}}" class="btn btn-default btn-sm">Back</a>
              </div>
          {!! Form::close() !!}
          <button id="multipleContactPerson" class="btn btn-success btn-sm btn-condensed"><i class="fa fa-plus"></i></button>
      </div>

      <div class="panel-heading">
          <h3 class="panel-title"><strong>Contact Person Details</strong></h3>
      </div>
      <div class="panel-body">
          <div class="table-responsive">
             <table id="customers2" class="table datatable">
                 <thead>
                     <tr>
                         <th>S.no</th>
                         <th>Name</th>
                         <th>Branch</th>
                         <th>Designation</th>
                         <th>Email</th>
                         <th>Phone</th>
                         <th>Action</th>
                     </tr>
                 </thead>

                 @if(Input::has('page'))
                    {{--*/$start = Input::get('page')*20-20/*--}}
                  @else
                    {{--*/$start = 0/*--}}
                  @endif

                 <tbody>
                    @foreach($contactPersonList as $cpData)
                    {{--*/$start++;/*--}}
                    <tr>
                        <td>{{$start}}</td>
                        <td>{{$cpData->name}}</td>
                        <td>{{$cpData->branchContactPerson->address}}</td>
                        <td>{{$cpData->designation}}</td>
                        <td>{{$cpData->email}}</td>
                        <td>{{$cpData->contact}}</td>
                        <td><a onClick="javascript:loadEdit('{{URL::to('bank/'.$cpData->bank_id.'/contact-person/edit'.'/'.$cpData->id)}}')" class="btn btn-warning btn-sm">Edit</a>&nbsp; 
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#confirm-delete" data-href="{{URL::to('bank/'.$cpData->bank_id.'/contact-person/delete/'.$cpData->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                 </tbody>
             </table>
          </div>
        </div>
  </div>

  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editModal" class="modal fade" data-backdrop="static">
      @include('modules.bank.contact-person-edit')
  </div>

   @include('shared.confirm-delete')
 
                  
@endsection

@section('javascript')

<script type="text/javascript" src="{{asset('js/jquery.validate.js')}}"></script>
<script src="{{asset('js/custom.jquery.validate.js')}}"></script>

<script>
  $("#multipleContactPerson").click(function(){
    // alert('test');
    var a = 1;
    var nextRow = '<div id="addRow'+a+'">'+
      '<div class="col-md-5"></div>'+
      '<div class="col-md-5">'+
        '<div class="form-group {{ $errors->has('branch_id') ? ' has-error' : '' }}">'+
            '<label class="col-md-3 col-xs-12 control-label">Branch </label>'+
            '<div class="col-md-9 col-xs-12">   '+
                '<select class="form-control" name="branch_id[]" >'+
                  '@foreach($branchList as $bList)'+
                  '<option value="{{$bList->id}}">{{$bList->address}}</option>'+
                  '@endforeach'+
                '</select>'+
                '@if ($errors->has('branch_id')) <span class="help-block">{{ $errors->first('branch_id') }} </span> @endif'+
            '</div>'+
        '</div>'+
      '</div>'+
      '<div class="col-md-2">'+
          '<a class="btn btn-danger btn-condensed btn-xs" onclick="deleteRow('+a+');"><i class="glyphicon glyphicon-remove"></i></a>'+
      '</div><br /><br /><br />'+
      '<div class="col-md-5">'+
        '<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">'+
            '<label class="col-md-3 col-xs-12 control-label">Name *</label>'+
            '<div class="col-md-9 col-xs-12">'+   
                '<input type="text" name="name[]" class="form-control" value="{{old('name')}}"/>'+
                '<div class="fb-error"></div>'+
                '@if ($errors->has('name')) <span class="help-block">{{ $errors->first('name') }} </span>@endif'+
            '</div>'+
        '</div>'+
      '</div>'+
      '<div class="col-md-5">'+
        '<div class="form-group {{ $errors->has('designation') ? ' has-error' : '' }}">'+
            '<label class="col-md-3 col-xs-12 control-label">Designation *</label>'+
            '<div class="col-md-9 col-xs-12">   '+
                '<input type="text" name="designation[]" class="form-control" value="{{old('designation')}}"/>'+
                '@if ($errors->has('designation')) <span class="help-block">{{ $errors->first('designation') }} </span> @endif'+
            '</div>'+
        '</div>'+
      '</div>'+
      '<div class="clearfix"></div><br />'+
      '<div class="col-md-5">'+
        '<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">'+
            '<label class="col-md-3 col-xs-12 control-label">Email</label>'+
            '<div class="col-md-9 col-xs-12">   '+
                '<input type="text" name="email[]" class="form-control" value="{{old('email')}}"/>'+
                '@if ($errors->has('email')) <span class="help-block">{{ $errors->first('email') }} </span> @endif'+
            '</div>'+
        '</div>'+
      '</div>'+
      '<div class="col-md-5">'+
        '<div class="form-group {{ $errors->has('contact') ? ' has-error' : '' }}">'+
            '<label class="col-md-3 col-xs-12 control-label">Contact *</label>'+
            '<div class="col-md-9 col-xs-12"> '+
                '<input type="text" name="contact[]" class="form-control" value="{{old('contact')}}"/>'+
                '@if ($errors->has('contact')) <span class="help-block">{{ $errors->first('contact') }} </span> @endif '+
            '</div>'+
        '</div>'+
      '</div>'+
      '<div class="clearfix"></div><br />';

      $(nextRow).insertBefore(".uptoHere");
      a++;


  });

  function deleteRow(id){
                $('#addRow'+id).remove();
            };
</script>
                   
@endsection

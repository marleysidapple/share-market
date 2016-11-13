<div class="modal-dialog">
  <div class="modal-content">

    <div class="modal-header">
      <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
      <h4 class="modal-title">Edit Contact Person </h4>
    </div>
    <div class="modal-body">
      <div class="panel panel-default">
        <div class="panel-body">

          {!! Form::open(array('url'=>'bank/contact-person/edit', 'role'=>'form', 'class'=>'form-horizontal', 'method'=>'POST', 'id'=>'contactPersonForm')) !!}
              <input type="hidden" name="id" value="{{$pageData->id}}">
              <input type="hidden" name="bank_id" value="{{$pageData->bank_id}}">
  
                  <div class="form-group {{ $errors->has('branch_id') ? ' has-error' : '' }}">
                      <label class="col-md-3 col-xs-12 control-label">Branch </label>
                      <div class="col-md-9 col-xs-12">   
                          <select class="form-control" name="branch_id" >
                            @foreach($branchList as $bList)
                            <option value="{{$bList->id}}" @if($pageData->branch_id == $bList->id) selected @endif >{{$bList->address}}</option>
                            @endforeach
                          </select>
                          @if ($errors->has('branch_id'))
                              <span class="help-block">{{ $errors->first('branch_id') }} </span>
                           @endif
                      </div>
                  </div>
      
                  <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                      <label class="col-md-3 col-xs-12 control-label">Name *</label>
                      <div class="col-md-9 col-xs-12">   
                          <input type="text" id="name" name="name" class="form-control" value="{{$pageData->name}}"/>
                          <div class="fb-error"></div>
                          @if ($errors->has('name'))
                              <span class="help-block">{{ $errors->first('name') }} </span>
                          @endif
                      </div>
                  </div>
  
                  <div class="form-group {{ $errors->has('designation') ? ' has-error' : '' }}">
                      <label class="col-md-3 col-xs-12 control-label">Designation *</label>
                      <div class="col-md-9 col-xs-12">   
                          <input type="text" id="designation" name="designation" class="form-control" value="{{$pageData->designation}}"/>
                          @if ($errors->has('designation'))
                              <span class="help-block">{{ $errors->first('designation') }} </span>
                           @endif
                      </div>
                  </div>

                  <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                      <label class="col-md-3 col-xs-12 control-label">Email</label>
                      <div class="col-md-9 col-xs-12">   
                          <input type="text" id="email" name="email" class="form-control" value="{{$pageData->email}}"/>
                          @if ($errors->has('email'))
                              <span class="help-block">{{ $errors->first('email') }} </span>
                           @endif
                      </div>
                  </div>
   
                  <div class="form-group {{ $errors->has('contact') ? ' has-error' : '' }}">
                      <label class="col-md-3 col-xs-12 control-label">Contact *</label>
                      <div class="col-md-9 col-xs-12">   
                          <input type="text" id="contact" name="contact" class="form-control" value="{{$pageData->contact}}"/>
                          @if ($errors->has('contact'))
                              <span class="help-block">{{ $errors->first('contact') }} </span>
                           @endif
                      </div>
                  </div>

                
                <div class="clearfix"></div><br />
                

                  <div class="button pull-right">
                      
                      <button type="submit" class="btn btn-primary btn-sm">Update</button>
                      <button aria-hidden="true" data-dismiss="modal" class="btn btn-default btn-sm" type="button">Cancel</button>
                  </div>
              {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
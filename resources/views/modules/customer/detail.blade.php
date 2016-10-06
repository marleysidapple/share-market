 @extends('layouts.master')


 @section('main-content')        
                        <div class="col-md-3 col-sm-4 col-xs-5">
                            
                            <form action="{{url('home/customer/updatelogininfo/'.$customer->user_id)}}" class="form-horizontal" method="post">
                            {!! csrf_field() !!}
                            <div class="panel panel-default">                                
                                <div class="panel-body">
                                    <h3><span class="fa fa-user">&nbsp;</span>{{ucfirst($customer->userdetail->name)}}</h3>
                                    <p>{{$customer->permanentaddress}}</p>
                                    <div class="text-center" id="user_image">
                                        <img src="{{asset('img/user-image.png')}}" class="img-thumbnail img-responsive" style="width:100px;" />
                                    </div>                                    
                                </div>
                                <div class="panel-body form-group-separated">
                                    <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                                        <label class="col-md-3 col-xs-5 control-label">Username</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" name="username" value="{{$customer->userdetail->username}}" class="form-control" />
                                            @if ($errors->has('username'))<span class="help-block">{{ $errors->first('username') }} </span>@endif
                                        </div>
                                    </div>
                                    
                                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label class="col-md-3 col-xs-5 control-label">Password</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="password" name="password" class="form-control"/>
                                             @if ($errors->has('password'))<span class="help-block">{{ $errors->first('password') }} </span>@endif
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">                                        
                                        <div class="col-md-12 col-xs-12">
                                            <button type="submit" class="btn btn-danger btn-block btn-rounded">Update Login Information</button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            </form>
                            
                        </div>
                        <div class="col-md-6 col-sm-8 col-xs-7">
                            
                            <form action="{{url('home/customer/update/'.$customer->id)}}" class="form-horizontal" method="post">
                            {!! csrf_field() !!}
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span> Profile</h3>
                                    <p>Profile summary of the user</p>
                                </div>
                                <div class="panel-body form-group-separated">
                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label class="col-md-3 col-xs-5 control-label">Full Name</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" name="name" value="{{$customer->userdetail->name}}" class="form-control"/>
                                              @if ($errors->has('name'))<span class="help-block">{{ $errors->first('name') }} </span>@endif
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('permanentaddress') ? ' has-error' : '' }}">
                                        <label class="col-md-3 col-xs-5 control-label">Permanent Address</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" name="permanentaddress" value="{{$customer->permanentaddress}}" class="form-control"/>
                                            @if ($errors->has('permanentaddress'))<span class="help-block">{{ $errors->first('permanentaddress') }} </span>@endif
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('temporaryaddress') ? ' has-error' : '' }}">
                                        <label class="col-md-3 col-xs-5 control-label">Temporary Address</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" name="temporaryaddress" value="{{$customer->temporaryaddress}}" class="form-control"/>
                                            @if ($errors->has('temporaryaddress'))<span class="help-block">{{ $errors->first('temporaryaddress') }} </span>@endif
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
                                        <label class="col-md-3 col-xs-5 control-label">Mobile No.</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" name="mobile" value="{{$customer->mobile}}" class="form-control"/>
                                            @if ($errors->has('mobile'))<span class="help-block">{{ $errors->first('mobile') }} </span>@endif
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('fathername') ? ' has-error' : '' }}">
                                        <label class="col-md-3 col-xs-5 control-label">Father's Name</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" name="fathername" value="{{$customer->fathername}}" class="form-control"/>
                                            @if ($errors->has('fathername'))<span class="help-block">{{ $errors->first('fathername') }} </span>@endif
                                        </div>
                                    </div>
                                     <div class="form-group {{ $errors->has('mothername') ? ' has-error' : '' }}">
                                        <label class="col-md-3 col-xs-5 control-label">Mother's Name</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" name="mothername" value="{{$customer->mothername}}" class="form-control"/>
                                            @if ($errors->has('mothername'))<span class="help-block">{{ $errors->first('mothername') }} </span>@endif
                                        </div>
                                    </div>

                                     <div class="form-group {{ $errors->has('citizenshipno') ? ' has-error' : '' }}">
                                        <label class="col-md-3 col-xs-5 control-label">Citizenship No.</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" name="citizenshipno" value="{{$customer->citizenshipno}}" class="form-control"/>
                                            @if ($errors->has('citizenshipno'))<span class="help-block">{{ $errors->first('citizenshipno') }} </span>@endif
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('multiple') ? ' has-error' : '' }}">
                                        <label class="col-md-3 col-xs-5 control-label">Multiple Enabled?</label>
                                         <div class="col-md-9 col-xs-7">
                                            <input type="radio" name="multiple" value="1" {{($customer->ismultiple == 1) ? 'checked' : ''}}> &nbsp;Yes&nbsp;<input type="radio" name="multiple" value="0" {{($customer->ismultiple == 0) ? 'checked' : ''}}> &nbsp;No
                                            @if ($errors->has('multiple'))<span class="help-block">{{ $errors->first('multiple') }} </span>@endif
                                         </div>
                                    </div>
                                   <!--  <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">About me</label>
                                        <div class="col-md-9 col-xs-7">
                                            <textarea class="form-control" rows="5">I'm realy great web developer. Godlike with internet...</textarea>
                                        </div>
                                    </div>     -->                                      
                                    <div class="form-group">
                                        <div class="col-md-12 col-xs-5">
                                            <button class="btn btn-primary btn-rounded pull-right" type="submit">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                            
                            <div class="panel panel-default tabs">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1" data-toggle="tab">Bank Detail</a></li>                                 
                                     <li><a href="#tab2" data-toggle="tab">Add New Bank</a></li>                                    
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane panel-body active" id="tab1">                                                                                
                                        
                                        <div class="list-group list-group-contacts border-bottom">
                                            
                                          @foreach($customer->bank as $key => $val)
                                             <a href="#" id="test" data-target="#modal_change_password" data-toggle="modal" class="list-group-item">            
                                                <div class="list-group-status status-online"></div>
                                                <img src="{{asset('img/bank.png')}}" class="pull-left" alt="Nadia Ali">
                                                <span class="contacts-title">{{$val->bankname->name}}</span>
                                                <p>Account no: <span class="acc">{{$val->accountno}}</span></p>                                    
                                                <div class="list-group-controls">
                                                    <!-- <button class="btn btn-primary btn-rounded" data-toggle="modal" target="#modal_change_password"><span class="fa fa-pencil"></span></button> -->
                                                </div>                                    
                                            </a>         
                                          @endforeach
                                        </div>                                        
                                    </div>


                                      <div class="tab-pane panel-body" id="tab2">                                        
                                        <p>Add New Bank.</p>
                                       <form action="{{url('home/customer/addbank/'.$customer->id)}}" class="form-horizontal" method="post">
                                        {!! csrf_field() !!}
                                         <div class="form-group">
                                            <label>Bank</label>
                                            <select name="bank" class="form-control">
                                                @foreach($bank as $key => $val)
                                                    <option value="{{$val->id}}">{{$val->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Account No.</label>
                                            <input type="text" name="accountno" class="form-control" placeholder="Account no." required>
                                        </div>                                
                                        <div class="form-group">
                                           <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                        </div>
                                        </form>                                
                                    </div>             
                                                                                             
                                    
                                </div>
                                
                            </div>

                        </div>
                        
                        <div class="col-md-3">
                            <div class="panel panel-default form-horizontal">
                                <div class="panel-body">
                                    <h3><span class="fa fa-info-circle"></span> Quick Info</h3>
                                    <p>Some quick info about this user</p>
                                </div>
                                <div class="panel-body form-group-separated">                                    
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Gender</label>
                                        <div class="col-md-8 col-xs-7 line-height-30">{{ucfirst($customer->gender)}}</div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Date of Birth</label>
                                        <div class="col-md-8 col-xs-7 line-height-30">{{$customer->dateofbirth}}</div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Citizenship No.</label>
                                        <div class="col-md-8 col-xs-7">{{$customer->citizenshipno}}</div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Marital Status</label>
                                        <div class="col-md-8 col-xs-7 line-height-30">{{ucfirst($customer->maritalstatus)}}</div>
                                    </div>
                                </div>
                                
                            </div>

        <div class="modal animated fadeIn" id="modal_change_password" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="smallModalHead">Edit Bank Detail</h4>
                    </div>
                   
                    <div class="modal-body form-horizontal form-group-separated">                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Bank Name</label>
                            <div class="col-md-9">
                                <select name="bank" class="form-control">
                                    @foreach($bank as $key => $val)
                                        <option value="{{$val->id}}">{{$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Account No.</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="new_password"/>
                            </div>
                        </div>
                     
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Proccess</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>        
    </div>

@endsection


@section('javascript')
<script type="text/javascript">
    $('.list-group-item').off('click').on('click', function(){
       
    });
</script>
@endsection
                        
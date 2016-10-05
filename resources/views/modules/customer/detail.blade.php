 @extends('layouts.master')


 @section('main-content')        
                        <div class="col-md-3 col-sm-4 col-xs-5">
                            
                            <form action="#" class="form-horizontal">
                            <div class="panel panel-default">                                
                                <div class="panel-body">
                                    <h3><span class="fa fa-user">&nbsp;</span>{{ucfirst($customer->userdetail->name)}}</h3>
                                    <p>{{$customer->permanentaddress}}</p>
                                    <div class="text-center" id="user_image">
                                        <img src="{{asset('img/user-image.png')}}" class="img-thumbnail img-responsive" style="width:100px;" />
                                    </div>                                    
                                </div>
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Username</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" name="username" value="{{$customer->userdetail->username}}" class="form-control" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Password</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="password" name="password" class="form-control"/>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">                                        
                                        <div class="col-md-12 col-xs-12">
                                            <a href="pages-edit-profile.html#" class="btn btn-danger btn-block btn-rounded" data-toggle="modal" data-target="#modal_change_password">Update Login Information</a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            </form>
                            
                        </div>
                        <div class="col-md-6 col-sm-8 col-xs-7">
                            
                            <form action="#" class="form-horizontal">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span> Profile</h3>
                                    <p>Profile summary of the user</p>
                                </div>
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Full Name</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" name="name" value="{{$customer->userdetail->name}}" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Permanent Address</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" name="permanentaddress" value="{{$customer->permanentaddress}}" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Temporary Address</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="{{$customer->temporaryaddress}}" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Mobile No.</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" name="mobile" value="{{$customer->mobile}}" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Father's Name</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" name="fathername" value="{{$customer->fathername}}" class="form-control"/>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Mother's Name</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" name="mothername" value="{{$customer->mothername}}" class="form-control"/>
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
                                            <button class="btn btn-primary btn-rounded pull-right">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                            
                            <div class="panel panel-default tabs">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="pages-edit-profile.html#tab1" data-toggle="tab">Bank Detail</a></li>                                 
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane panel-body active" id="tab1">                                                                                
                                        
                                        <div class="list-group list-group-contacts border-bottom">
                                            
                                          @foreach($customer->bank as $key => $val)
                                             <a href="pages-edit-profile.html#" class="list-group-item">            
                                                <div class="list-group-status status-online"></div>
                                                <img src="{{asset('img/bank.png')}}" class="pull-left" alt="Nadia Ali">
                                                <span class="contacts-title">{{$val->bankname->name}}</span>
                                                <p>Account no: {{$val->accountno}}</p>                                    
                                               <!--  <div class="list-group-controls">
                                                    <button class="btn btn-primary btn-rounded"><span class="fa fa-pencil"></span></button>
                                                </div>   -->                                  
                                            </a>         
                                          @endforeach
                                        </div>                                        
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
                           <!--  
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-cog"></span> Settings</h3>
                                    <p>Sample of settings block</p>
                                </div>
                                <div class="panel-body form-horizontal form-group-separated">                                    
                                    <div class="form-group">
                                        <label class="col-md-6 col-xs-6 control-label">Notifications</label>
                                        <div class="col-md-6 col-xs-6">
                                            <label class="switch">
                                                <input type="checkbox" checked value="1"/>
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <label class="col-md-6 col-xs-6 control-label">Mailing</label>
                                        <div class="col-md-6 col-xs-6">
                                            <label class="switch">
                                                <input type="checkbox" checked value="1"/>
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-6 col-xs-6 control-label">Priority</label>
                                        <div class="col-md-6 col-xs-6">
                                            <label class="switch">
                                                <input type="checkbox" value="0"/>
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>

@endsection
                        
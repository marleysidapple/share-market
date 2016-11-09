 @extends('layouts.master')


@section('main-content')        
 <div class="row">
                        <div class="col-md-3">
                            
                            <div class="panel panel-default">
                                <div class="panel-body profile" style="background: url({{asset('assets/images/gallery/music-4.jpg')}}) center center no-repeat;">
                                    <div class="profile-image">
                                        <img src="{{asset($customer->photo)}}" alt="{{$customer->userdetail->name}}"/>
                                    </div>
                                    <div class="profile-data">
                                        <div class="profile-data-name">{{$customer->userdetail->name}}</div>
                                       <!--  <div class="profile-data-title" style="color: #FFF;">Singer-Songwriter</div> -->
                                    </div>                              
                                </div>                                
                                
                                <div class="panel-body list-group border-bottom">
                                    <a href="{{url('home/customer/'.$customer->id.'/personaldetail')}}" class="list-group-item {{(\Request::route()->getName() == 'editpersonaldetail') ? 'active' : ''}}"><span class="fa fa-user"></span> Client Profile</a>
                                       <a href="{{url('home/customer/'.$customer->id.'/contactinfo')}}" class="list-group-item {{(\Request::route()->getName() == 'editcontactinfo') ? 'active' : ''}}"><span class="fa fa-mobile"></span>Contact Info</a>                               
                                    <a href="{{url('home/customer/'.$customer->id.'/paddressdetail')}}" class="list-group-item {{(\Request::route()->getName() == 'editpermanentaddress') ? 'active' : ''}}"><span class="fa fa-building"></span>Permanent Address Detail</a>
                                    <a href="{{url('home/customer/'.$customer->id.'/taddressdetail')}}" class="list-group-item {{(\Request::route()->getName() == 'edittemporaryaddress') ? 'active' : ''}}"><span class="fa fa-building"></span>Temporary Address Detail</a>
                                    <a href="{{url('home/customer/'.$customer->id.'/citizenship')}}" class="list-group-item {{(\Request::route()->getName() == 'editcitizenshipdetail') ? 'active' : ''}}"><span class="fa fa-folder"></span> Citizenship Detail</a>
                                    <a href="{{url('home/customer/'.$customer->id.'/banks')}}" class="list-group-item {{(\Request::route()->getName() == 'editbankdetail') ? 'active' : ''}}"><span class="fa fa-bank"></span> Bank Detail</a>
                                    <a href="{{url('home/customer/'.$customer->id.'/dmat')}}" class="list-group-item {{(\Request::route()->getName() == 'editdmataccountdetail') ? 'active' : ''}}"><span class="fa fa-bank"></span> DMAT Detail</a>
                                    <a href="{{url('home/customer/'.$customer->id.'/profession')}}" class="list-group-item {{(\Request::route()->getName() == 'editprofession') ? 'active' : ''}}"><span class="fa fa-briefcase"></span> Occupation Detail</a>
                                     <a href="{{url('home/customer/'.$customer->id.'/otherinfo')}}" class="list-group-item {{(\Request::route()->getName() == 'otherinfo') ? 'active' : ''}}"><span class="fa fa-briefcase"></span>Other Information</a>
                                    <a href="{{url('home/customer/'.$customer->id.'/login')}}" class="list-group-item {{(\Request::route()->getName() == 'editloginthroughprofile') ? 'active' : ''}}"><span class="fa fa-cog"></span>Change Password</a>
                                </div>
                            </div>                            
                            
                        </div>
                        
                        <div class="col-md-9">
                                @yield('sub-content')
                        </div>
                        
                    </div>
@endsection


                        
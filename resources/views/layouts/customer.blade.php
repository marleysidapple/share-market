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
                                    <a href="{{url('home/customer/'.$customer->id.'/personaldetail')}}" class="list-group-item"><span class="fa fa-user"></span> Personal Detail</a>                                
                                    <a href="{{url('home/customer/'.$customer->id.'/paddressdetail')}}" class="list-group-item"><span class="fa fa-building"></span>Permanent Address Detail</a>
                                    <a href="{{url('home/customer/'.$customer->id.'/taddressdetail')}}" class="list-group-item"><span class="fa fa-building"></span>Temporary Address Detail</a>
                                    <a href="{{url('home/customer/'.$customer->id.'/citizenship')}}" class="list-group-item"><span class="fa fa-folder"></span> Citizenship Detail</a>
                                    <a href="{{url('home/customer/'.$customer->id.'/banks')}}" class="list-group-item"><span class="fa fa-bank"></span> Bank Detail</a>
                                    <a href="#" class="list-group-item"><span class="fa fa-bank"></span> DMAT Detail</a>
                                    <a href="#" class="list-group-item"><span class="fa fa-briefcase"></span> Profession Detail</a>
                                    <a href="#" class="list-group-item"><span class="fa fa-cog"></span> Login Detail</a>
                                </div>
                            </div>                            
                            
                        </div>
                        
                        <div class="col-md-9">
                                @yield('sub-content')
                        </div>
                        
                    </div>
@endsection


                        
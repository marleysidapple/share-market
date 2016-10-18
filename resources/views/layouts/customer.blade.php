 @extends('layouts.master')


@section('main-content')        
 <div class="row">
                        <div class="col-md-3">
                            
                            <div class="panel panel-default">
                                <div class="panel-body profile" style="background: url({{asset('assets/images/gallery/music-4.jpg')}}) center center no-repeat;">
                                    <div class="profile-image">
                                        <img src="{{asset($customer->photo)}}" alt="Nadia Ali"/>
                                    </div>
                                    <div class="profile-data">
                                        <div class="profile-data-name">{{$customer->userdetail->name}}</div>
                                       <!--  <div class="profile-data-title" style="color: #FFF;">Singer-Songwriter</div> -->
                                    </div>                              
                                </div>                                
                                
                                <div class="panel-body list-group border-bottom">
                                    <a href="{{url('home/customer/'.$customer->id.'/personaldetail')}}" class="list-group-item"><span class="fa fa-coffee"></span> Personal Detail</a>                                
                                    <a href="#" class="list-group-item"><span class="fa fa-users"></span>Address Detail</a>
                                    <a href="#" class="list-group-item"><span class="fa fa-folder"></span> Citizenship Detail</a>
                                    <a href="#" class="list-group-item"><span class="fa fa-cog"></span> Bank Detail</a>
                                    <a href="#" class="list-group-item"><span class="fa fa-cog"></span> Profession Detail</a>
                                    <a href="#" class="list-group-item"><span class="fa fa-cog"></span> Login Detail</a>
                                </div>
                            </div>                            
                            
                        </div>
                        
                        <div class="col-md-9">
                                @yield('sub-content')
                        </div>
                        
                    </div>
@endsection


@section('javascript')

@endsection
                        
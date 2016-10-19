    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo1" style="background:#fe9804;">
            <a href="" style="    text-align: center;font-size: 20px;">SHARE MARKET</a>
            <a href="index.html#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="index.html#" class="profile-mini">
                <img src="assets/images/users/avatar.jpg" alt="John Doe"/>
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="{{asset('img/user-image.png')}}" alt="Administrator"/>
                </div>
                <div class="profile-data">
                    <div class="profile-data-name">{{Auth::user()->roles()->first()->display_name}}</div>
                <div class="profile-data-title">Administrator Console</div>
                </div>
                <div class="profile-controls">
                    <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                    <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                </div>
            </div>
        </li>
        <li class="xn-title">Navigation</li>
        <li class="{{(\Request::route()->getName() == 'dashboard') ? 'active' : ''}}">
            <a href="{{url('home')}}"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
        </li>




        @if(Auth::user()->roles()->first()->name == 'superadmin' || Auth::user()->can('listbank'))
            <li class="{{(\Request::route()->getName() == 'listbank') ? 'active' : ''}}">
                <a href="{{url('home/bank')}}"><span class="fa fa-bank"></span> <span class="xn-text">Bank Management</span></a>
            </li>
        @endif

         @if(Auth::user()->roles()->first()->name == 'superadmin' || Auth::user()->can('listbroker'))
        <li class="{{(\Request::route()->getName() == 'listbroker') ? 'active' : ''}}">
            <a href="{{url('broker')}}"><span class="fa fa-exchange"></span> <span class="xn-text">Broker Management</span></a>
        </li>
        @endif

         @if(Auth::user()->roles()->first()->name == 'superadmin' || Auth::user()->can('listrta'))
        <li class="{{(\Request::route()->getName() == 'listrta') ? 'active' : ''}}">
            <a href="{{url('rta')}}"><span class="fa fa-database"></span> <span class="xn-text">RTA Management</span></a>
        </li>
        @endif

         @if(Auth::user()->roles()->first()->name == 'superadmin' || Auth::user()->can('listdp'))
        <li class="{{(\Request::route()->getName() == 'listdp') ? 'active' : ''}}">
            <a href="{{url('dp')}}"><span class="fa fa-anchor"></span> <span class="xn-text">DP Management</span></a>
        </li>
        @endif

         @if(Auth::user()->roles()->first()->name == 'superadmin' || Auth::user()->can('listcompany'))
        <li class="{{(\Request::route()->getName() == 'listcompany') ? 'active' : ''}}">
            <a href="{{url('company')}}"><span class="fa fa-building-o"></span> <span class="xn-text">Company Management</span></a>
        </li>
        @endif
        

        @if(Auth::user()->can('usergroup'))
        <li class="{{(\Request::route()->getName() == 'usergroup' || \Request::route()->getName() == 'addusergroup') ? 'active' : ''}}">
           <a href="{{url('home/usergroup')}}"><span class="fa fa-users"></span>Manage User Groups</a>
        @endif

        @if(Auth::user()->roles()->first()->name == 'superadmin' || Auth::user()->can('usergroup'))
            <li class="{{(\Request::route()->getName() == 'usergroup' || \Request::route()->getName() == 'addusergroup') ? 'active' : ''}}">
               <a href="{{url('home/usergroup')}}"><span class="fa fa-users"></span>Manage User Groups</a>
            </li>
        @endif

     
        @if(Auth::user()->roles()->first()->name == 'superadmin' || Auth::user()->can('users'))
            <li class="{{(\Request::route()->getName() == 'users' || \Request::route()->getName() == 'adduser')   ? 'active' : ''}}">
                <a href="{{url('home/users')}}"><span class="fa fa-user"></span>Manage Users</a>
            </li>
        @endif

        @if(Auth::user()->roles()->first()->name == 'superadmin' || Auth::user()->can('usernamesetting'))
            <li class="{{(\Request::route()->getName() == 'usernamesetting')   ? 'active' : ''}}">
                <a href="{{url('home/usernamesetting')}}"><span class="fa fa-cogs"></span>Username Setting</a>
            </li>
        @endif



        @if(Auth::user()->roles()->first()->name == 'superadmin' || Auth::user()->can('assignpermission'))
            <li class="xn-openable {{(\Request::route()->getName() == 'assignpermission') ? 'active' : ''}}">
                <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">Permissions</span></a>
                <ul>
                    <li><a href="{{url('home/permissions')}}"><span class="fa fa-align-center"></span>Assign Permission</a></li>
                </ul>
            </li>
        @endif

        <li class="xn-title">Components</li>
          @if(Auth::user()->roles()->first()->name == 'superadmin' || Auth::user()->can('customerlist'))
            <li class="{{(\Request::route()->getName() == 'customerlist' || \Request::route()->getName() == 'addcustomer')   ? 'active' : ''}}">
                <a href="{{url('home/customer/list')}}"><span class="fa fa-user"></span>Customer Management</a>
            </li>
        @endif
       
    </ul>
    <!-- END X-NAVIGATION -->

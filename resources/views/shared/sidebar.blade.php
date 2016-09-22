
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
        <li class="active">
            <a href="{{url('home')}}"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">User Management</span></a>
            <ul>
                <li><a href="pages-gallery.html"><span class="fa fa-image"></span>Manage User Groups</a></li>
                <li><a href="pages-invoice.html"><span class="fa fa-dollar"></span>Manage Users</a></li>
                <li class="xn-openable">
                    <a href="index.html#"><span class="fa fa-clock-o"></span>Permissions</a>
                    <ul>
                        <li><a href="pages-timeline.html"><span class="fa fa-align-center"></span>Assign Permission</a></li>
                        <!-- <li><a href="pages-timeline-simple.html"><span class="fa fa-align-justify"></span> Full Width</a></li> -->
                    </ul>
                </li>
            </ul>
        </li>

        <li class="xn-title">Components</li>
<!--
        <li class="xn-openable">
            <a href="index.html#"><span class="fa fa-cogs"></span> <span class="xn-text">UI Kits</span></a>
            <ul>
                <li><a href="ui-widgets.html"><span class="fa fa-heart"></span> Widgets</a></li>
                <li><a href="ui-elements.html"><span class="fa fa-cogs"></span> Elements</a></li>
                <li><a href="ui-buttons.html"><span class="fa fa-square-o"></span> Buttons</a></li>
                <li><a href="ui-panels.html"><span class="fa fa-pencil-square-o"></span> Panels</a></li>
                <li><a href="ui-icons.html"><span class="fa fa-magic"></span> Icons</a><div class="informer informer-warning">+679</div></li>
                <li><a href="ui-typography.html"><span class="fa fa-pencil"></span> Typography</a></li>
                <li><a href="ui-portlet.html"><span class="fa fa-th"></span> Portlet</a></li>
                <li><a href="ui-sliders.html"><span class="fa fa-arrows-h"></span> Sliders</a></li>
                <li><a href="ui-alerts-popups.html"><span class="fa fa-warning"></span> Alerts & Popups</a></li>
                <li><a href="ui-lists.html"><span class="fa fa-list-ul"></span> Lists</a></li>
                <li><a href="ui-tour.html"><span class="fa fa-random"></span> Tour</a></li>
                <li><a href="ui-nestable.html"><span class="fa fa-sitemap"></span> Nestable List</a></li>
                <li><a href="ui-autocomplete.html"><span class="fa fa-search-plus"></span> Autocomplete</a></li>
                <li><a href="ui-slide-menu.html"><span class="fa fa-angle-right"></span> Slide Menu</a><div class="informer informer-danger">New!</div></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="index.html#"><span class="fa fa-pencil"></span> <span class="xn-text">Forms</span></a>
            <ul>
                <li class="xn-openable">
                    <a href="form-layouts-two-column.html"><span class="fa fa-tasks"></span> Form Layouts</a>
                    <ul>
                        <li><a href="form-layouts-one-column.html"><span class="fa fa-align-justify"></span> One Column</a></li>
                        <li><a href="form-layouts-two-column.html"><span class="fa fa-th-large"></span> Two Column</a></li>
                        <li><a href="form-layouts-tabbed.html"><span class="fa fa-table"></span> Tabbed</a></li>
                        <li><a href="form-layouts-separated.html"><span class="fa fa-th-list"></span> Separated Rows</a></li>
                    </ul>
                </li>
                <li><a href="form-elements.html"><span class="fa fa-file-text-o"></span> Elements</a></li>
                <li><a href="form-validation.html"><span class="fa fa-list-alt"></span> Validation</a></li>
                <li><a href="form-wizards.html"><span class="fa fa-arrow-right"></span> Wizards</a></li>
                <li><a href="form-editors.html"><span class="fa fa-text-width"></span> WYSIWYG Editors</a></li>
                <li><a href="form-file-handling.html"><span class="fa fa-floppy-o"></span> File Handling</a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="http://aqvatarius.com/themes/atlant/html/tables.html"><span class="fa fa-table"></span> <span class="xn-text">Tables</span></a>
            <ul>
                <li><a href="table-basic.html"><span class="fa fa-align-justify"></span> Basic</a></li>
                <li><a href="table-datatables.html"><span class="fa fa-sort-alpha-desc"></span> Data Tables</a></li>
                <li><a href="table-export.html"><span class="fa fa-download"></span> Export Tables</a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="index.html#"><span class="fa fa-bar-chart-o"></span> <span class="xn-text">Charts</span></a>
            <ul>
                <li><a href="charts-morris.html">Morris</a></li>
                <li><a href="charts-nvd3.html">NVD3</a></li>
                <li><a href="charts-rickshaw.html">Rickshaw</a></li>
                <li><a href="charts-other.html">Other</a></li>
            </ul>
        </li>
        <li>
            <a href="maps.html"><span class="fa fa-map-marker"></span> <span class="xn-text">Maps</span></a>
        </li>
        <li class="xn-openable">
            <a href="index.html#"><span class="fa fa-sitemap"></span> <span class="xn-text">Navigation Levels</span></a>
            <ul>
                <li class="xn-openable">
                    <a href="index.html#">Second Level</a>
                    <ul>
                        <li class="xn-openable">
                            <a href="index.html#">Third Level</a>
                            <ul>
                                <li class="xn-openable">
                                    <a href="index.html#">Fourth Level</a>
                                    <ul>
                                        <li><a href="index.html#">Fifth Level</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
-->
    </ul>
    <!-- END X-NAVIGATION -->
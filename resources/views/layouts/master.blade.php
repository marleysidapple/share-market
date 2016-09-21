<!DOCTYPE html>
<html lang="en">
    <head>
      @include('shared.meta')
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">

          <!-- START PAGE SIDEBAR -->
        <div class="page-sidebar">
          @include('shared.sidebar')
        </div>
        <!-- END PAGE SIDEBAR -->

            <!-- PAGE CONTENT -->
            <div class="page-content">

                @include('shared.header-breadcrumb')

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                  @yield('main-content')
                </div>
                <!-- END PAGE CONTENT WRAPPER -->
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->


        @include('shared.script')
        @yield('javascript')

    </body>
</html>

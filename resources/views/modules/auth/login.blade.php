<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>
      @include('shared.meta')
    </head>
    <body>

        <div class="login-container login-v2">

            <div class="login-box animated fadeInDown">
                <div class="login-body">
                    <div class="login-title"><strong>Welcome</strong>, Please login.</div>
                    <form action="" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-user"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Email"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-lock"></span>
                                </div>
                                <input type="password" class="form-control" placeholder="Password"/>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <div class="col-md-6">
                            <a href="">Forgot your password?</a>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="">Create an account</a>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <div class="col-md-12">
                            <button class="btn btn-primary btn-lg btn-block">Login</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2016 Share Market
                    </div>
                    <div class="pull-right">
                        <a href="">About</a> |
                        <a href="">Privacy</a> |
                        <a href="">Contact Us</a>
                    </div>
                </div>
            </div>

        </div>



    </body>
</html>

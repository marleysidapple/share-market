<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>
      @include('shared.meta')
    </head>
    <body>

        <div class="login-container login-v2">

            <div class="login-box animated fadeInDown">
              @if(Session::has('error'))
              <div class="alert alert-danger alert-dismissible" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Error!</strong> {{Session::get('error')}}
              </div>
              @endif
                <div class="login-body">
                    <div class="login-title"><strong>Welcome</strong>, Please login.</div>
                    <form action="{{url('/login')}}" class="form-horizontal" method="post">
                      {!! csrf_field() !!}
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="input-group-addon">
                                    <span class="fa fa-user"></span>
                                </div>
                                <input type="text" name="email" class="form-control" placeholder="Email/Username"/>
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block">{{ $errors->first('email') }} </span>
                             @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="input-group-addon">
                                    <span class="fa fa-lock"></span>
                                </div>
                                <input type="password" name="password" class="form-control" placeholder="Password"/>
                            </div>
                            @if ($errors->has('password'))
                                 <span class="help-block">{{ $errors->first('password') }}</span>
                             @endif
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
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
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

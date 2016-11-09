@extends('layouts.customer')

@section('sub-content')
   <div class="panel panel-default">
   		 <div class="panel-body">
   		 	 <form action="{{url('home/customer/login/update/'.$customer->user_id)}}" method="post">
                            {!!csrf_field()!!}
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Change Password</h3>
                                    <form role="form">
                                        <!-- <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                                            <label>Username</label>
                                            <input type="text" username="username" class="form-control" value="{{$customer->userdetail->username}}" readonly/>
                                            @if ($errors->has('username'))
                                                <span class="help-block">{{ $errors->first('username') }} </span>
                                             @endif
                                        </div> -->
                                          <input type="hidden" username="username" class="form-control" value="{{$customer->userdetail->username}}" readonly/>

                                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control" />
                                            @if ($errors->has('password'))
                                                <span class="help-block">{{ $errors->first('password') }} </span>
                                             @endif
                                        </div>


                                          <div class="form-group {{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                                            <label>Confirm Password</label>
                                            <input type="password" name="confirm_password" class="form-control" />
                                            @if ($errors->has('confirm_password'))
                                                <span class="help-block">{{ $errors->first('confirm_password') }} </span>
                                             @endif
                                        </div>


                                        <div class="button pull-left">
                                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </form>
   		 </div>
   </div>
@endsection

@section('javascript')
<script type="text/javascript">
	$(function(){
     $( "#dob" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: '1930:2016',
      dateFormat: 'yy-mm-dd'
    });
  });
</script>
@endsection
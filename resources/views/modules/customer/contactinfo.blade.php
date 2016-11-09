@extends('layouts.customer')

@section('sub-content')
   <div class="panel panel-default">
   		 <div class="panel-body">
   		 	 <form action="{{url('home/customer/contactinfo/update/'.$customer->id)}}" method="post" enctype="multipart/form-data">
                            {!!csrf_field()!!}
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Edit Contact Info</h3>
                                    <form role="form">
                                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" value="{{$customer->userDetail->email}}"/>
                                            @if ($errors->has('email'))
                                                <span class="help-block">{{ $errors->first('email') }} </span>
                                             @endif
                                        </div>


                                         <div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
                                            <label>Mobile No.</label>
                                            <input type="text" name="mobile" class="form-control" value="{{$customer->contact->mobile}}"/>
                                            @if ($errors->has('mobile'))
                                                <span class="help-block">{{ $errors->first('mobile') }} </span>
                                             @endif
                                        </div>

                                         <div class="form-group {{ $errors->has('homeno') ? ' has-error' : '' }}">
                                            <label>Home No.</label>
                                            <input type="text" name="homeno" class="form-control" value="{{$customer->contact->home_contact}}"/>
                                            @if ($errors->has('homeno'))
                                                <span class="help-block">{{ $errors->first('homeno') }} </span>
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
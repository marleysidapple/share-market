@extends('layouts.customer')

@section('sub-content')
   <div class="panel panel-default">
   		 <div class="panel-body">
   		 	 <form action="{{url('home/customer/personalinfo/update/'.$customer->id)}}" method="post" enctype="multipart/form-data">
                            {!!csrf_field()!!}
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Edit Client Detail</h3>
                                    <form role="form">
                                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label>Full Name</label>
                                            <input type="text" name="name" class="form-control" value="{{$customer->userDetail->name}}"/>
                                            @if ($errors->has('name'))
                                                <span class="help-block">{{ $errors->first('name') }} </span>
                                             @endif
                                        </div>

                                      

                                         <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                                            <label>Gender</label>
                                          	<select class="form-control select" name="gender">
                                          		<option value="male" {{$customer->gender == 'male' ? 'selected' : ''}}>Male</option>
                                          		<option value="female" {{$customer->gender == 'female' ? 'selected' : ''}}>Female</option>
                                          		<option value="other" {{$customer->gender == 'other' ? 'selected' : ''}}>Other</option>
                                          	</select>
                                            @if ($errors->has('gender'))
                                                <span class="help-block">{{ $errors->first('gender') }} </span>
                                             @endif
                                        </div>

                                         <div class="form-group {{ $errors->has('fathername') ? ' has-error' : '' }}">
                                            <label>Father's name</label>
                                            <input type="text" name="fathername" class="form-control" value="{{$customer->fathername}}"/>
                                            @if ($errors->has('fathername'))
                                                <span class="help-block">{{ $errors->first('fathername') }} </span>
                                             @endif
                                        </div>

                                         <div class="form-group {{ $errors->has('gfathername') ? ' has-error' : '' }}">
                                            <label>GrandFather's name</label>
                                            <input type="text" name="gfathername" class="form-control" value="{{$customer->gfathername}}"/>
                                            @if ($errors->has('gfathername'))
                                                <span class="help-block">{{ $errors->first('gfathername') }} </span>
                                             @endif
                                        </div>

                                         <div class="form-group {{ $errors->has('husband_wife_name') ? ' has-error' : '' }}">
                                            <label>Husband/Wife Name</label>
                                            <input type="text" name="husband_wife_name" class="form-control" value="{{$customer->husband_wife_name}}"/>
                                            @if ($errors->has('husband_wife_name'))
                                                <span class="help-block">{{ $errors->first('husband_wife_name') }} </span>
                                             @endif
                                        </div>


                                          <div class="form-group {{ $errors->has('dateofbirth') ? ' has-error' : '' }}">
                                            <label>Date of birth</label>
                                            <input type="text" name="dateofbirth" class="form-control" id="dob" value="{{$customer->dateofbirth}}"/>
                                            @if ($errors->has('dateofbirth'))
                                                <span class="help-block">{{ $errors->first('dateofbirth') }} </span>
                                             @endif
                                        </div>

                                         <div class="form-group {{ $errors->has('profilephoto') ? ' has-error' : '' }}">
                                            <label>Change Profile Photo</label>
                                            <input type="file" name="profilephoto" class="form-control" value="{{$customer->profilephoto}}"/>
                                            @if ($errors->has('profilephoto'))
                                                <span class="help-block">{{ $errors->first('profilephoto') }} </span>
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
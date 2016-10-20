@extends('layouts.customer')

@section('sub-content')
   <div class="panel panel-default">
   		 <div class="panel-body">
   		 	 <form action="{{url('home/customer/profession/update/'.$customer->id)}}" method="post">
                            {!!csrf_field()!!}
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Edit Professional Detail</h3>
                                    <form role="form">
                                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label>Organisation Name</label>
                                            <input type="text" name="name" class="form-control" value="{{$customer->profession->name}}"/>
                                            @if ($errors->has('name'))
                                                <span class="help-block">{{ $errors->first('name') }} </span>
                                             @endif
                                        </div>

                                        <div class="form-group {{ $errors->has('designation') ? ' has-error' : '' }}">
                                            <label>Designation</label>
                                            <input type="text" name="designation" class="form-control" value="{{$customer->profession->designation}}"/>
                                            @if ($errors->has('designation'))
                                                <span class="help-block">{{ $errors->first('designation') }} </span>
                                             @endif
                                        </div>

                                         <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                            <label>Organisation Address</label>
                                            <input type="text" name="address" class="form-control" value="{{$customer->profession->address}}"/>
                                            @if ($errors->has('address'))
                                                <span class="help-block">{{ $errors->first('address') }} </span>
                                             @endif
                                        </div>

                                          <div class="form-group {{ $errors->has('contact') ? ' has-error' : '' }}">
                                            <label>Contact No.</label>
                                            <input type="text" name="contact" class="form-control"  value="{{$customer->profession->contact}}"/>
                                            @if ($errors->has('contact'))
                                                <span class="help-block">{{ $errors->first('contact') }} </span>
                                             @endif
                                        </div>

                                          <div class="form-group {{ $errors->has('pan') ? ' has-error' : '' }}">
                                            <label>PAN No.</label>
                                            <input type="text" name="pan" class="form-control" value="{{$customer->profession->pan}}"/>
                                            @if ($errors->has('pan'))
                                                <span class="help-block">{{ $errors->first('pan') }} </span>
                                             @endif
                                        </div>

                                          <div class="form-group {{ $errors->has('income') ? ' has-error' : '' }}">
                                            <label>Income (p.a.)</label>
                                            <input type="text" name="income" class="form-control" value="{{$customer->profession->income}}"/>
                                            @if ($errors->has('income'))
                                                <span class="help-block">{{ $errors->first('income') }} </span>
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
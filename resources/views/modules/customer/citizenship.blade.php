@extends('layouts.customer')

@section('sub-content')
   <div class="panel panel-default">
   		 <div class="panel-body">
   		 	 <form action="{{url('home/customer/citizenship/update/'.$customer->id)}}" method="post" enctype="multipart/form-data">
                            {!!csrf_field()!!}
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Edit Citizenship Detail</h3>
                                    <form role="form">
                                        <div class="form-group {{ $errors->has('issuedistrict') ? ' has-error' : '' }}">
                                            <label>Citizenship Issued district</label>
                                            <select class="form-control issuedistrict" name="issuedistrict">
                                                @foreach($district as $key => $val)
                                                  <option value="{{$val->id}}" {{($customer->citizen->issuedistrict == $val->id) ? 'selected' : ''}}>{{$val->name}}</option>
                                                @endforeach
                                            </select>
                                              @if ($errors->has('issuedistrict'))
                                                <span class="help-block">{{ $errors->first('issuedistrict') }} </span>
                                             @endif
                                        </div>


                                         <div class="form-group {{ $errors->has('citizenshipno') ? ' has-error' : '' }}">
                                            <label>Citizenship No.</label>
                                            <input type="text" name="citizenshipno" class="form-control" value="{{$customer->citizen->citizenshipno}}"/>
                                            @if ($errors->has('citizenshipno'))
                                                <span class="help-block">{{ $errors->first('citizenshipno') }} </span>
                                             @endif
                                        </div>

                                          <div class="form-group {{ $errors->has('issuedate') ? ' has-error' : '' }}">
                                            <label>Issued Date</label>
                                            <input type="text" name="issuedate" class="form-control" id="dob" value="{{$customer->citizen->issuedate}}"/>
                                            @if ($errors->has('issuedate'))
                                                <span class="help-block">{{ $errors->first('issuedate') }} </span>
                                             @endif
                                        </div>


                                        <div class="form-group {{ $errors->has('fathername') ? ' has-error' : '' }}">
                                            <label>Father's Name</label>
                                            <input type="text" name="fathername" class="form-control" id="dob" value="{{$customer->citizen->fathername}}"/>
                                            @if ($errors->has('fathername'))
                                                <span class="help-block">{{ $errors->first('fathername') }} </span>
                                             @endif
                                        </div>


                                          <div class="form-group {{ $errors->has('gfathername') ? ' has-error' : '' }}">
                                            <label>Grandfather's Name</label>
                                            <input type="text" name="gfathername" class="form-control" id="dob" value="{{$customer->citizen->gfathername}}"/>
                                            @if ($errors->has('gfathername'))
                                                <span class="help-block">{{ $errors->first('gfathername') }} </span>
                                             @endif
                                        </div>


                                         <div class="form-group {{ $errors->has('husband_wife_name') ? ' has-error' : '' }}">
                                            <label>Husband/Wife Name</label>
                                            <input type="text" name="husband_wife_name" class="form-control" id="dob" value="{{$customer->citizen->husband_wife_name}}"/>
                                            @if ($errors->has('husband_wife_name'))
                                                <span class="help-block">{{ $errors->first('husband_wife_name') }} </span>
                                             @endif
                                        </div>  

                                          <div class="form-group {{ $errors->has('scancopy') ? ' has-error' : '' }}">
                                            <label>Citizenship Scanned Copy</label>
                                            <input type="file" name="scancopy" class="form-control"/>
                                            @if ($errors->has('scancopy'))
                                                <span class="help-block">{{ $errors->first('scancopy') }} </span>
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
      yearRange: '1930:2021',
      dateFormat: 'yy-mm-dd'
    });
  });
</script>
@endsection
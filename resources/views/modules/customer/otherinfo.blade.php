@extends('layouts.customer')

@section('sub-content')
   <div class="panel panel-default">
   		 <div class="panel-body">
   		 	 <form action="{{url('home/customer/otherinfo/update/'.$customer->id)}}" method="post">
                            {!!csrf_field()!!}
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Edit Other Information</h3>
                                    <form role="form">
                                        <div class="form-group {{ $errors->has('reference_person') ? ' has-error' : '' }}">
                                            <label>Reference Person</label>
                                            <input type="text" name="reference_person" class="form-control" value="{{$customer->ref->reference_person}}"/>
                                            @if ($errors->has('reference_person'))
                                                <span class="help-block">{{ $errors->first('reference_person') }} </span>
                                             @endif
                                        </div>

                                        <div class="form-group {{ $errors->has('mainfocus') ? ' has-error' : '' }}">
                                            <label>Main Focus</label>
                                            <input type="text" name="mainfocus" class="form-control" value="{{$customer->ref->mainfocus}}"/>
                                            @if ($errors->has('mainfocus'))
                                                <span class="help-block">{{ $errors->first('mainfocus') }} </span>
                                             @endif
                                        </div>

                                         <div class="form-group {{ $errors->has('client_type') ? ' has-error' : '' }}">
                                            <label>Client Type</label>

                                            <select class="form-control" name="client_type">
                                                @foreach($client as $key => $val)
                                                    <option value="{{$val->id}}" {{($val->id == $customer->ref->client_type) ? 'selected' : '' }}>{{$val->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('client_type'))
                                                <span class="help-block">{{ $errors->first('client_type') }} </span>
                                             @endif
                                        </div>

                                          <div class="form-group {{ $errors->has('pan') ? ' has-error' : '' }}">
                                            <label>PAN No.</label>
                                            <input type="text" name="pan" class="form-control"  value="{{$customer->ref->pan}}"/>
                                            @if ($errors->has('pan'))
                                                <span class="help-block">{{ $errors->first('pan') }} </span>
                                             @endif
                                        </div>

                                         <div class="form-group {{ $errors->has('income') ? ' has-error' : '' }}">
                                            <label>Income (p.a)</label>
                                            <input type="text" name="income" class="form-control"  value="{{$customer->ref->income}}"/>
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
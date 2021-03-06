@extends('layouts.customer')

@section('sub-content')
   <div class="panel panel-default">
   		 <div class="panel-body">
   		 	 <form action="{{url('home/customer/paddressinfo/update/'.$customer->id)}}" method="post" enctype="multipart/form-data">
                            {!!csrf_field()!!}
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Edit Permanent Address Detail</h3>
                                    <form role="form">
                                        <div class="form-group {{ $errors->has('zone') ? ' has-error' : '' }}">
                                            <label>Zone</label>

                                            <select class="form-control zone" name="zone">
                                                @foreach($zone as $key => $val)
                                                  <option value="{{$val->id}}" {{($customer->address->zone_id == $val->id) ? 'selected' : ''}}>{{$val->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                         <div class="form-group {{ $errors->has('district') ? ' has-error' : '' }}">
                                            <label>District</label>
                                            <select class="form-control district" name="district">
                                            </select>
                                        </div>


                                         <div class="form-group {{ $errors->has('vdc_municipality') ? ' has-error' : '' }}">
                                            <label>Municipality/VDC</label>
                                            <input type="text" name="vdc_municipality" class="form-control" value="{{$customer->address->vdc_municipality}}"/>
                                            @if ($errors->has('vdc_municipality'))
                                                <span class="help-block">{{ $errors->first('vdc_municipality') }} </span>
                                             @endif
                                        </div>

                                          <div class="form-group {{ $errors->has('ward') ? ' has-error' : '' }}">
                                            <label>Ward</label>
                                            <input type="text" name="ward" class="form-control" id="dob" value="{{$customer->address->ward}}"/>
                                            @if ($errors->has('ward'))
                                                <span class="help-block">{{ $errors->first('ward') }} </span>
                                             @endif
                                        </div>


                                        <div class="form-group {{ $errors->has('tole') ? ' has-error' : '' }}">
                                            <label>Tole</label>
                                            <input type="text" name="tole" class="form-control" id="dob" value="{{$customer->address->tole}}"/>
                                            @if ($errors->has('tole'))
                                                <span class="help-block">{{ $errors->first('tole') }} </span>
                                             @endif
                                        </div>


                                          <div class="form-group {{ $errors->has('houseno') ? ' has-error' : '' }}">
                                            <label>House No.</label>
                                            <input type="text" name="houseno" class="form-control" id="dob" value="{{$customer->address->houseno}}"/>
                                            @if ($errors->has('houseno'))
                                                <span class="help-block">{{ $errors->first('houseno') }} </span>
                                             @endif
                                        </div>


                                          <div class="form-group {{ $errors->has('tel') ? ' has-error' : '' }}">
                                            <label>Telephone</label>
                                            <input type="text" name="tel" class="form-control" id="dob" value="{{$customer->address->tel}}"/>
                                            @if ($errors->has('tel'))
                                                <span class="help-block">{{ $errors->first('tel') }} </span>
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
    $('select.zone').trigger('change');
  });

  $('select.zone').off('change').on('change', function(){
    var zone = $('select.zone option:selected').val();
    var district_id = "{{$customer->address->district_id}}";
    $.ajax({
      type:'post',
      url: '{{url("home/customer/district")}}',
      data: {zone: zone, _token: $('input[name=_token]').val()},
      success: function(data){
        $('select.district').html('');
        $.each(data, function(key, value){
          var tapp = `<option value='`+value.id+`'>`+value.name+`</option>`;
          $(".district option[value="+district_id+"]").prop('selected', true);
          $('select.district').append(tapp);  
        });
        
      }
    });
  });
</script>
@endsection
@extends('layouts.customer')

@section('sub-content')
   <div class="panel panel-default">
   		 <div class="panel-body">
   		 	 <form action="{{url('home/customer/taddressinfo/update/'.$customer->id)}}" method="post" enctype="multipart/form-data">
                            {!!csrf_field()!!}
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Edit Temporary Address Detail</h3>
                                    <form role="form">
                                        <div class="form-group {{ $errors->has('zone') ? ' has-error' : '' }}">
                                            <label>Zone</label>
                                            <select class="form-control zone" name="zone">
                                                @foreach($zone as $key => $val)
                                                  <option value="{{$val->id}}" {{($customer->address->tzone_id == $val->id) ? 'selected' : ''}}>{{$val->name}}</option>
                                                @endforeach
                                            </select>
                                              @if ($errors->has('zone'))
                                                <span class="help-block">{{ $errors->first('zone') }} </span>
                                             @endif
                                        </div>

                                         <div class="form-group {{ $errors->has('district') ? ' has-error' : '' }}">
                                            <label>District</label>
                                            <select class="form-control district" name="district">
                                            </select>
                                        </div>


                                         <div class="form-group {{ $errors->has('vdc_municipality') ? ' has-error' : '' }}">
                                            <label>Municipality/VDC</label>
                                            <input type="text" name="vdc_municipality" class="form-control" value="{{$customer->address->tvdc_municipality}}"/>
                                            @if ($errors->has('vdc_municipality'))
                                                <span class="help-block">{{ $errors->first('vdc_municipality') }} </span>
                                             @endif
                                        </div>

                                          <div class="form-group {{ $errors->has('ward') ? ' has-error' : '' }}">
                                            <label>Ward</label>
                                            <input type="text" name="ward" class="form-control" id="dob" value="{{$customer->address->tward}}"/>
                                            @if ($errors->has('ward'))
                                                <span class="help-block">{{ $errors->first('ward') }} </span>
                                             @endif
                                        </div>


                                          <div class="form-group {{ $errors->has('tstreet') ? ' has-error' : '' }}">
                                            <label>Street</label>
                                            <input type="text" name="tstreet" class="form-control" id="dob" value="{{$customer->address->tstreet}}"/>
                                            @if ($errors->has('tstreet'))
                                                <span class="help-block">{{ $errors->first('tstreet') }} </span>
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
    var district_id = "{{$customer->address->tdistrict_id}}";
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
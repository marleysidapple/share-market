@extends('layouts.customer')

@section('sub-content')
   <div class="panel panel-default">
   		 <div class="panel-body">
   		 	 <form action="{{url('home/customer/dmatdetail/add/'.$customer->id)}}" method="post" enctype="multipart/form-data">
                            {!!csrf_field()!!}
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Add New DMAT Detail</h3>
                                    <form role="form">
                                        <div class="form-group {{ $errors->has('registrar') ? ' has-error' : '' }}">
                                            <label>DMAT Registrar</label>
                                            <select class="form-control registrar" name="registrar">
                                                <option value="">Choose One</option>
                                                <option value="rta">Rta</option>
                                                <option value="dp">Dp</option>
                                                <option value="broker">Broker</option>
                                            </select>
                                              @if ($errors->has('registrar'))
                                                <span class="help-block">{{ $errors->first('registrar') }} </span>
                                             @endif
                                        </div>

                                        <div class="form-group {{ $errors->has('registrarname') ? ' has-error' : '' }}">
                                            <label>Name</label> 
                                            <select class="form-control registrarname" name="registrarname">
                                              
                                            </select>
                                        </div>



                                          <div class="form-group {{ $errors->has('accountnumber') ? ' has-error' : '' }}">
                                            <label>Account Number</label>
                                            <input type="text" name="accountnumber" class="form-control" />
                                            @if ($errors->has('accountnumber'))
                                                <span class="help-block">{{ $errors->first('accountnumber') }} </span>
                                             @endif
                                        </div>


                                        <div class="button pull-left">
                                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
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


 $(document).on('change', '.registrar', function(){
    var registrar = $('select.registrar option:selected').val();
   

    $.ajax({
      type:'post',
      url: '{{url("home/customer/registrar")}}',
      data: {registrar: registrar, _token: $('input[name=_token]').val()},
      success: function(data){
       $('select.registrarname').html('');
        $.each(data, function(key, value){
          var tname = "<option value='"+value.id+"'>"+value.name+"</option>";
          $('.registrarname').append(tname);
        });
        
      }
    });
    
  });
</script>
@endsection
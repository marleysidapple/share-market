@extends('layouts.customer')

@section('sub-content')
   <div class="panel panel-default">
   		 <div class="panel-body">
   		 	 <form action="{{url('home/customer/addmember/'.$customer->user_id)}}" method="post">
                            {!!csrf_field()!!}
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Add Member</h3>
                                    <form role="form">
                                        <div class="form-group {{ $errors->has('bank') ? ' has-error' : '' }}">
                                            <!-- <label>Select Member</label> -->
                                            <select class="form-control bank" name="member" required>
                                                  <option value="">Choose Member</option>
                                                @foreach($users as $key => $val)
                                                  <option value="{{$val->id}}">{{$val->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="button pull-left">
                                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
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


	$(document).on('change', '.bank', function(){
    var bank = $('.bank option:selected').val();
  
    $.ajax({
      type:'post',
      url: '{{url("home/customer/branch")}}',
      data: {bank: bank, _token: $('input[name=_token]').val()},
      success: function(data){
        $('.branch').html('');
        $.each(data, function(key, value){
          var tbank = "<option value='"+value.id+"'>"+value.address+"</option>";
           $('.branch').append(tbank);
        });
        
      }
    });
    
  });
</script>
@endsection
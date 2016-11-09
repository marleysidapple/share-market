@extends('layouts.customer')

@section('sub-content')
   <div class="panel panel-default">
   		 <div class="panel-body">
   		 	 <form action="{{url('home/customer/bankdetail/update/'.$customer_bank->id)}}" method="post" enctype="multipart/form-data">
                            {!!csrf_field()!!}
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Edit Bank Detail</h3>
                                    <form role="form">
                                        <div class="form-group {{ $errors->has('bank') ? ' has-error' : '' }}">
                                            <label>Bank</label>
                                            <select class="form-control bank" name="bank">
                                                @foreach($bank as $key => $val)
                                                  <option value="{{$val->id}}" {{($customer_bank->bank_id == $val->id) ? 'selected': '' }}>{{$val->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group {{ $errors->has('branch') ? ' has-error' : '' }}">
                                            <label>Branch Address</label> 
                                            <select class="form-control branch" name="branch">
                                              
                                            </select>
                                        </div>


                                         <div class="form-group {{ $errors->has('accountname') ? ' has-error' : '' }}">
                                            <label>Account Name</label>
                                            <input type="text" name="accountname" class="form-control" value="{{$customer_bank->accountname}}"/>
                                            @if ($errors->has('accountname'))
                                                <span class="help-block">{{ $errors->first('accountname') }} </span>
                                             @endif
                                        </div>

                                          <div class="form-group {{ $errors->has('accountnumber') ? ' has-error' : '' }}">
                                            <label>Account Number</label>
                                            <input type="text" name="accountnumber" class="form-control" value="{{$customer_bank->accountno}}"/>
                                            @if ($errors->has('accountnumber'))
                                                <span class="help-block">{{ $errors->first('accountnumber') }} </span>
                                             @endif
                                        </div>


                                           <div class="form-group {{ $errors->has('isprimary') ? ' has-error' : '' }}">
                                            <label>Is this bank primary ?</label>
                                            <select class="form-control" name="isprimary">
                                              <option value="0" {{$customer_bank->isprimary == 0 ? 'selected': ''}}>No</option>
                                              <option value="1" {{$customer_bank->isprimary == 1 ? 'selected': ''}}>Yes</option>
                                            </select>
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
    $('select.bank').trigger('change');
  });


	$(document).on('change', '.bank', function(){
    var bank = $('.bank option:selected').val();
    var bid = "{{$customer_bank->branch_id}}";
    $.ajax({
      type:'post',
      url: '{{url("home/customer/branch")}}',
      data: {bank: bank, _token: $('input[name=_token]').val()},
      success: function(data){
        $('.branch').html('');
        $.each(data, function(key, value){
          var tbank = "<option value='"+value.id+"'>"+value.address+"</option>";
           $('.branch').append(tbank);
           $(".branch option[value="+bid+"]").prop('selected', true);
        });
        
      }
    });
    
  });
</script>
@endsection
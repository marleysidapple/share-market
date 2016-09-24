@extends('layouts.master')

@section('main-content')
 <div class="panel panel-default">
                             <div class="panel-heading">
                                 <h3 class="panel-title">Assign Permission</h3>
                             </div>
                             <div class="panel-body">
                                 <div class="table-responsive">
                                 <span class="text-warning loading"><img src="{{asset('img/loading.gif')}}" style="max-width:20px;">&nbsp;Loading....</span>
                                     <table id="customers2" class="table">
                                         <thead>
                                             <tr>
                                                 <th>#</th>                                                  
                                                 @foreach($roles as $key => $val)
                                                 <th>{{$val->display_name}}</th>
                                                 @endforeach
                                             </tr>
                                         </thead>
                                         <tbody>
                                         @foreach($permission as $key => $val)
                                        	 <tr>
                                        	 	<td>{{$val->name}}</td>
                                        	 	@foreach($roles as $key => $value)
                                        	 		<td class="boxes"><input type="checkbox" name="perm" class="perm" roleattr="{{$value->id}}" permattr="{{$val->id}}" {{($val->perms->contains($value->id))? 'checked' : ''}}></td>
                                        	 	@endforeach
                                        	 </tr>
                                         @endforeach
                                         
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                         </div>
@endsection

@section('javascript')
<script type="text/javascript">
$( document ).ready(function() {
    $('.perm').off('click').on('click', function(){
    	var role = $(this).attr('roleattr');
    	var permission = $(this).attr('permattr');
    	var _token = "{{csrf_token()}}";

    	$.ajax({
    		type: 'post',
    		url: "{{url('home/user/attachpermission')}}",
    		data: {role: role, permission: permission, _token: _token},
    		beforeSend: function(){
    			$('.table-responsive span').removeClass('loading');
    		},
    		success: function(){
    			//console.log('success');
    			$('.table-responsive span').addClass('loading');
    		}
    	});
    });
});
</script>
@endsection
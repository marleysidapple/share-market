@extends('layouts.master')

@section('main-content')


                  
                      
                          <!-- START VERTICAL FORM SAMPLE -->
                          <form action="{{url('home/username/store/'.(!empty($user->id) ? $user->id : '')  )}}" method="post">
                            {!!csrf_field()!!}
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Username Setting (PREFIX+YEAR+COUNTER)</h3>
                                    <form role="form">
                                        <div class="form-group col-sm-2 {{ $errors->has('prefix') ? ' has-error' : '' }}">
                                            <label>PREFIX</label>
                                            <input type="text" name="prefix" id="prefix" class="form-control" value="{{$user->prefix or ''}}" required />
                                            @if ($errors->has('prefix'))
                                                <span class="help-block">{{ $errors->first('prefix') }} </span>
                                             @endif
                                        </div>

                                        <div class="form-group col-sm-2 {{ $errors->has('year') ? ' has-error' : '' }}">
                                            <label>YEAR</label>
                                            <input type="text" name="year" id="year" class="form-control" value="{{date('Y')}}" readonly/>
                                            @if ($errors->has('year'))
                                                <span class="help-block">{{ $errors->first('year') }} </span>
                                             @endif
                                        </div>

                                         <div class="form-group col-sm-2 {{ $errors->has('counter') ? ' has-error' : '' }}">
                                            <label>COUNTER (0001, 0002 and so on..)</label>
                                            <input type="text" class="form-control" id="counter" value="0001" readonly/>
                                        </div>

                                        <div class=" form-group col-sm-2 preview">
                                            <label>PREVIEW</label>
                                            <input type="text" class="form-control" id="preview" value="" readonly/>
                                        </div>

                                        <div class="form-group col-sm-4">&nbsp;</div>
                                        <div class="clearfix"></div>
                                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                        
                                    </form>
                                </div>
                            </div>
                        </form>
                       
                      
                   
@endsection


@section('javascript')
<script type="text/javascript">
    $('#prefix').on('keyup', function(){
       var pref = $('#prefix').val();
       var username = pref + $('#year').val() + $('#counter').val();
       $('#preview').val(username);
    });
</script>
@endsection

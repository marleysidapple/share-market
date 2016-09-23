@extends('layouts.master')

@section('main-content')


                  
                      
                          <!-- START VERTICAL FORM SAMPLE -->
                          <form action="{{url('home/usergroup/update/'.$role->id)}}" method="post">
                            {!!csrf_field()!!}
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Update User Group</h3>
                                    <form role="form">
                                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" value="{{$role->name}}"/>
                                            @if ($errors->has('name'))
                                                <span class="help-block">{{ $errors->first('name') }} </span>
                                             @endif
                                        </div>

                                        <div class="form-group {{ $errors->has('display_name') ? ' has-error' : '' }}">
                                            <label>Display Name</label>
                                            <input type="text" name="display_name" class="form-control" value="{{$role->display_name}}"/>
                                            @if ($errors->has('display_name'))
                                                <span class="help-block">{{ $errors->first('display_name') }} </span>
                                             @endif
                                        </div>

                                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control">{{$role->description}}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="help-block">{{ $errors->first('description') }} </span>
                                             @endif
                                        </div>


                                        <div class="button pull-left">
                                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </form>
                       
                      
                   
@endsection

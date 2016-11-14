@extends('layouts.master')

@section('main-content')


                  
                      
                          <!-- START VERTICAL FORM SAMPLE -->
                          <form action="{{url('home/clienttype/update/'.$clients->id)}}" method="post">
                            {!!csrf_field()!!}
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Edit Client Type</h3>
                                    <form role="form">
                                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" value="{{$clients->name}}"/>
                                            @if ($errors->has('name'))
                                                <span class="help-block">{{ $errors->first('name') }} </span>
                                             @endif
                                        </div>

                                        

                                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control">{{$clients->description}}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="help-block">{{ $errors->first('description') }} </span>
                                             @endif
                                        </div>


                                        <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                                            <label>Display Name</label>
                                            <select class="form-control" name="status">
                                              <option value="1" {{$clients->status == 1 ? 'selected': ''}}>Active</option>
                                              <option value="0" {{$clients->status == 0 ? 'selected': ''}}>Suspended</option>
                                            </select>
                                              @if ($errors->has('status'))
                                                <span class="help-block">{{ $errors->first('status') }} </span>
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

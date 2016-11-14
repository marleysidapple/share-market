@extends('layouts.master')

@section('main-content')


                  
                      
                          <!-- START VERTICAL FORM SAMPLE -->
                          <form action="{{url('home/clienttype/store')}}" method="post">
                            {!!csrf_field()!!}
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Add Client Type</h3>
                                    <form role="form">
                                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" value="{{old('name')}}"/>
                                            @if ($errors->has('name'))
                                                <span class="help-block">{{ $errors->first('name') }} </span>
                                             @endif
                                        </div>

                                        

                                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control">{{old('description')}}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="help-block">{{ $errors->first('description') }} </span>
                                             @endif
                                        </div>


                                        <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                                            <label>Display Name</label>
                                            <select class="form-control" name="status">
                                              <option value="1">Active</option>
                                              <option value="0">Suspended</option>
                                            </select>
                                              @if ($errors->has('status'))
                                                <span class="help-block">{{ $errors->first('status') }} </span>
                                             @endif
                                        </div>


                                        <div class="button pull-left">
                                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </form>
                       
                      
                   
@endsection

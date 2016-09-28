@extends('layouts.master')

@section('main-content')
                         
                          <!-- START VERTICAL FORM SAMPLE -->
                          <form action="{{url('home/user/update/'.$user->id)}}" method="post">
                            {!!csrf_field()!!}
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Update User Detail</h3>

                                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" value="{{$user->name}}"/>
                                            @if ($errors->has('name'))
                                                <span class="help-block">{{ $errors->first('name') }} </span>
                                             @endif
                                        </div>

                                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control" value="{{$user->email}}"/>
                                            @if ($errors->has('email'))
                                                <span class="help-block">{{ $errors->first('email') }} </span>
                                             @endif
                                        </div>

                                          <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control" value=""/>
                                            @if ($errors->has('password'))
                                                <span class="help-block">{{ $errors->first('password') }} </span>
                                             @endif
                                          </div>

                                          <div class="form-group">
                                            <label>Role</label>
                                            <select class="form-control select" name="role">
                                              <option value="">Assign Role</option>
                                                @foreach($roles as $key => $val)
                                                    <option value="{{$val->id}}" {{($user->roles()->first()->id == $val->id) ? 'selected' : ''}}>{{$val->name}}</option>
                                                @endforeach
                                            </select>
                                              @if ($errors->has('role'))
                                                <span class="help-block">{{ $errors->first('role') }} </span>
                                             @endif
                                          </div>


                                        <div class="button pull-left">
                                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                        </div>
                                </div>
                            </div>
                        </form>
                       
                      
                   
@endsection

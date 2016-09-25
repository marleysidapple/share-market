@extends('layouts.master')


@section('main-content')
 <div class="error-container">
                                <div class="error-code">403</div>
                                <div class="error-text">Access Forbidden</div>
                                <div class="error-subtext">Unfortunately, you donot have privilige to access this page.</div>
                                <div class="error-actions">                                
                                    <div class="row">
                                        <div class="col-md-6">
                                          <a href="{{url('home')}}" class="btn btn-info btn-block btn-lg">Back to dashboard</a>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-primary btn-block btn-lg" onClick="history.back();">Previous page</button>
                                        </div>
                                    </div>                                
                                </div>
                                <div class="error-subtext">Or you can use search to find anything you need.</div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" placeholder="Search..." class="form-control"/>
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary"><span class="fa fa-search"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
@endsection
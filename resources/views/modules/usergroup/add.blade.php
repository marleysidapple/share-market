@extends('layouts.master')

@section('main-content')
<div class="page-content-wrap">

                  <div class="row">
                      <div class="col-md-12">

                          <!-- START VERTICAL FORM SAMPLE -->
                          <form>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Add User Group</h3>
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Display Name</label>
                                            <input type="text" name="display_name" class="form-control"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control"></textarea>
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
                    </div>
@endsection

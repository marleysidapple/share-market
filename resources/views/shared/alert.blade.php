    @if(Session::has('error'))
              <div class="alert alert-danger alert-dismissible" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Error!</strong> {{Session::get('error')}}
              </div>
    @endif


     @if(Session::has('success'))
              <div class="alert alert-success alert-dismissible" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Success!</strong> {{Session::get('success')}}
              </div>
    @endif


     @if(Session::has('warning'))
              <div class="alert alert-warning alert-dismissible" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Warning!</strong> {{Session::get('warning')}}
              </div>
    @endif
@if($errors->first('msgSuccess'))
<div class="alert alert-success fade in">
    <button data-dismiss="alert" class="close close-sm" type="button">
        <i class="fa fa-times"></i>
    </button>
    {{$errors->first('msgSuccess')}} 
</div>
@elseif($errors->first('msgError'))
<div class="alert alert-block alert-danger fade in">
    <button data-dismiss="alert" class="close close-sm" type="button">
        <i class="fa fa-times"></i>
    </button>
    {{$errors->first('msgError')}} 
</div>
@elseif($errors->any())
<div class="alert alert-block alert-danger fade in">
    <button data-dismiss="alert" class="close close-sm" type="button">
        <i class="fa fa-times"></i>
    </button>
    @foreach($errors->all() as $error)
      {{$error}}
    @endforeach
</div>
@endif
@if($errors->any())
<div class="alert alert-danger alert-dismissible" data-auto-dismiss="5000">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-ban"></i> EL Formulario contiene Errores!</h4>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif


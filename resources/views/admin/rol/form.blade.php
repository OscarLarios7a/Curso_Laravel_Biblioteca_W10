<div class="form-group">
    <label for="nombre" class="col-lg-3 control-label requerido">Nombre</label>
          <div class="col-lg-8">
          <input type="text"  id="nombre" name="nombre" class="form-control" value="{{old('nombre',$data->nombre ?? '')}}" required/>
          </div>
</div>

<div class="mb-3 row form-group">
    <label for="nombre" class="col-sm-2 col-form-label">Nombre Completo *</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre Completo" required value="{{old('nombre', $empleado->nombre ?? '')}}">
    </div>
</div>
<div class="mb-3 row form-group">
    <label for="email" class="col-sm-2 col-form-label">Correo Electrónico *</label>
    <div class="col-sm-6">
        <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico" required value="{{old('email', $empleado->email ?? '')}}">
    </div>
</div>
<div class="mb-3 row form-group">
    <label for="sexo" class="col-sm-2 col-form-label">Sexo *</label>
    <div class="col-sm-1">
        <div class="form-check">
            <label class="col-form-label" for="masculino">
                <input class="form-check-input" type="radio" name="sexo" id="masculino" value="M" {{($empleado->sexo == 'M' ? 'checked' : '')}}>
                Masculino
            </label>
          </div>
          <div class="form-check">
            <label class="col-form-label" for="femenino">
                <input class="form-check-input" type="radio" name="sexo" id="femenino" value="F" {{($empleado->sexo == 'F' ? 'checked' : '')}}>
                Femenino
            </label>
          </div>
    </div>
</div>
<div class="mb-3 row form-group">
    <label for="area" class="col-sm-2 col-form-label">Área *</label>
    <div class="col-sm-6">
        <select name="area" id="area" class="form-select" required>
            <option value="">--Seleccione una opción--</option>
            @foreach ($areas as $area)
                <option value="{{$area->id}}" {{old("area", $empleado->area->id ?? "") == $area->id ? "selected" : ""}}>{{$area->nombre}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="mb-3 row form-group">
    <label for="descripcion" class="col-sm-2 col-form-label">Descripción *</label>
    <div class="col-sm-6">
        <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10" required>{{old('descripcion', $empleado->descripcion ?? '')}}</textarea>
    </div>
</div>
<div class="mb-3 row form-group">
    <div class="col-sm-2"></div>
    <div class="col-sm-3" style="padding-left: 0em;">
        <div class="form-check" style="padding-left: 0em">
            <label class="col-form-label" for="boletin">
                <input class="form-check-input" type="checkbox" name="boletin" id="boletin" {{($empleado->boletin == '1' ? 'checked' : '')}}>
                Deseo recibir boletín informativo
            </label>
        </div>
    </div>
</div>
<div class="mb-3 row form-group">
    <label for="roles" class="col-sm-2 col-form-label">Roles *</label>
    <div class="col-sm-2">
        <div class="list-group">
            @foreach ($roles as $rol)
                <label class="list-group-item">
                    <input class="form-check-input me-1" type="checkbox" name="roles" id="roles" value="{{$rol->id}}" >
                    {{$rol->nombre}}
                </label>
            @endforeach
          </div>          
    </div>
</div>
@extends('layout')
@section('title')
    Crear empleado
@endsection
@section('content')
    <div class="content">
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <h2>Crear Empleado</h2>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{route('listar.empleados')}}" class="btn btn-primary"><i class="fas fa-user-arrow-back"></i> Volver</a>
        </div>
    </div>

    <form action="{{route('guardar.empleado')}}" method="POST" id="formEmpleado" name="formEmpleado">
        @csrf
        @include('empleados.form')
        <div class="mb-3 row form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-1">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>
    
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#formEmpleado").validate({
                rules: {
                  nombre: "required",
                  email: {
                    required: true,
                    email: true
                  },
                  sexo: "required",
                  area: "required",
                  descripcion: "required"
                },
                messages: {
                  nombre: "Campo requerido",
                  email: {
                      required: "campo requerido",
                      email: "digite un correo electrónico válido"
                  },
                  sexo: "campo requerido",
                  area: "campo requerido",
                  descripcion: "campo requerido"
                },
                submitHandler: function(form) {
                  form.submit();
                }
              });
        });
    </script>
@endsection
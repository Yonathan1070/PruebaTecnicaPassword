@extends('layout')
@section('title')
    Lista de empleados
@endsection
@section('content')
    <div class="content">
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <h2>Lista de Empleados</h2>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{route('crear.empleado')}}" class="btn btn-primary"><i class="fas fa-user-plus"></i> Crear</a>
        </div>
        <div class="table-responsive">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>              
            @endif
            @if (session('mensaje'))
                <div class="alert alert-success" role="alert">
                    {{session('mensaje')}}
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"><i class="fas fa-user"></i> Nombre</th>
                        <th scope="col"><i class="fas fa-at"></i> Email</th>
                        <th scope="col"><i class="fas fa-venus-mars"></i> Sexo</th>
                        <th scope="col"><i class="fas fa-briefcase"></i> Area</th>
                        <th scope="col"><i class="fas fa-envelope"></i> Boletín</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empleados as $empleado)
                        <tr>
                            <td>
                                {{$empleado->nombre}}
                            </td>
                            <td>
                                {{$empleado->email}}
                            </td>
                            <td>
                                {{($empleado->sexo == 'M') ? 'Masculino' : (($empleado->sexo == 'F') ? 'Femenino' : '')}}
                            </td>
                            <td>
                                {{$empleado->area->nombre}}
                            </td>
                            <td>
                                {{($empleado->boletin == 1) ? 'Si' : (($empleado->boletin == 0) ? 'No' : '')}}
                            </td>
                            <td>
                                <a href="{{route('editar.empleado', ['id' => $empleado->id])}}"><i class="fas fa-edit"></i> </a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('eliminar.empleado', ['id' => $empleado->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"><i class="fas fa-trash-alt"></i></button>
                                  </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
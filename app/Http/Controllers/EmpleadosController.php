<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpleadoRequest;
use App\Models\Areas;
use App\Models\Empleados;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        $empleados = Empleados::with('area')->get();
        return view('empleados.listar', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $areas = Areas::get();
        $roles = Roles::get();
        $empleado = null;
        return view('empleados.crear', compact('areas', 'roles', 'empleado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $datos = $request->all();
        $validacion = new EmpleadoRequest();
        $validator = Validator::make($datos, $validacion->rules(), $validacion->messages());
        if($validator->passes()){
            $empleado = Empleados::create([
                'nombre' => $request->nombre,
                'email' => $request->email,
                'sexo' => $request->sexo,
                'descripcion' => $request->descripcion,
                'area_id' => $request->area,
                'boletin' => ($request->boletin == true) ? 1 : 0
            ]);
            $empleado->roles()->attach($request->roles);

            return redirect()->route('listar.empleados')->with('mensaje', 'Empleado creado');
        }
        return redirect()->back()->withErrors($validator->errors()->first())->withInput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $empleado = Empleados::find($id);
        $empleado->area;
        $empleado->roles;

        $areas = Areas::get();
        $roles = Roles::get();
        return view('empleados.editar', compact('areas', 'roles', 'empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, $id)
    {
        $datos = $request->all();
        $validacion = new EmpleadoRequest();
        $validator = Validator::make($datos, $validacion->rules(), $validacion->messages());
        if($validator->passes()){
            $empleado = Empleados::find($id);
            $empleado->update([
                'nombre' => $request->nombre,
                'email' => $request->email,
                'sexo' => $request->sexo,
                'descripcion' => $request->descripcion,
                'area_id' => $request->area,
                'boletin' => ($request->boletin == true) ? 1 : 0
            ]);
            
            foreach($empleado->roles as $rol){
                $empleado->roles()->detach($rol);
            }

            $empleado->roles()->attach($request->roles);

            return redirect()->route('listar.empleados')->with('mensaje', 'Empleado editado');
        }
        return redirect()->back()->withErrors($validator->errors()->first())->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        $empleado = Empleados::find($id);
            
        foreach($empleado->roles as $rol){
            $empleado->roles()->detach($rol);
        }

        $empleado->delete();

        return redirect()->route('listar.empleados')->with('mensaje', 'Empleado eliminado');
    }
}

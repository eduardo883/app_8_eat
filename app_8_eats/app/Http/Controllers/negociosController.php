<?php

namespace App\Http\Controllers;

use App\Models\Negocios;
use Illuminate\Http\Request;

class negociosController extends Controller
{
    public function vista(){
        return view('pages.negocios');
    }

    public function listar(){
        $negocios = Negocios::all();
        return $negocios;
    }

    public function guardar(Request $request){

        $rules =[
            'nombre' => 'required|min:4',
            'descripcion' => 'required',
            'avenida' => 'required',
            'no_ext' => 'required',
            'cp' => 'required|max:5',
            'telefono' => 'required|max:10'
        ];

        $detalle_mensaje= [
            'nombre.required' => 'El campo nombre es requerido',
            'descripcion.required' => 'El campo descripción es requerido',
            'avenida.required' => 'El campo avenida es requerido',
            'no_ext.required' => 'El campo Número Exterior es requerido',
            'cp.required' => 'El campo código postal es requerido',
            'telefono.required' => 'El campo teléfono es requerido',
            'telefono.max' => 'El campo teléfono requiere un máximo de 10 carácteres'
        ];

        $this->validate($request, $rules, $detalle_mensaje);

        $nuevoNegocio = new Negocios();

        $nuevoNegocio->nombre = $request->nombre;
        $nuevoNegocio->descripcion = $request->descripcion;
        $nuevoNegocio->avenida = $request->avenida;
        $nuevoNegocio->no_ext = $request->no_ext;
        $nuevoNegocio->no_int = $request->no_int;
        $nuevoNegocio->cp = $request->cp;
        $nuevoNegocio->telefono = $request->telefono;

        $nuevoNegocio->save();
    }
}
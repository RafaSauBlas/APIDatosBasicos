<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Alumno;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class prueba extends Controller
{
    public function SHOW(Request $id)
    {
        $alumno = Alumno::find($id);
        if(!is_null($alumno))
           return $alumno;
        else
           return response('No se econtro ningun registro con este ID', 404);
    }

    public function POST(Request $request)
    {
        $alumno = new Alumno($request->all());
        $alumno->save();
        return 'Alumno registrado exitosamente';
    }

    public function BORRAR (Request $id){
        $eliminar = Alumno::findOrFail($id);
        if(!is_null($eliminar)){
           $eliminar->each->delete();
           return response('El alumno fué eliminado correctamente', 200);
        }
        else{
          return response ('No se encontró ningun alumno para eliminar', 402);
        }
    }

    public function EDITAR (Request $request){
        $alumno = Alumno::find($request->id);
        if(!is_null($alumno)){
           $alumno->nombre = $request->nombre;
           $alumno->appaterno = $request->appaterno;
           $alumno->apmaterno = $request->apmaterno;
           $alumno->correo = $request->correo;
           $alumno->save();
           return response ('El alumno se ha modificado correctamente', 200);
        }
        else{
           return response('No se encontró ningun alumno con ese id', 402);
        }
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\persona;

class PersonasController extends Controller
{
    public function indexpersonas($id = null){
        if($id)
        return response()->json(["persona"=>persona::find($id)],200);
       return response()->json(["personas"=>persona::all()],200);
   }

    public function guardarpersonas(Request $request){
       $persona = new persona();
       $persona->usuario_id = $request->usuario_id;
       $persona->Nombre = $request->Nombre;
       $persona->Apellido_paterno = $request->Apellido_paterno;
       $persona->Apellido_materno = $request->Apellido_materno;
       $persona->save();

       if($persona->save())
        return response()->json(["persona"=>$persona],201);
       return response()->json(null,400);
    }

    public function borrarpersona($id){
        $borrarpersona= new persona();
        $borrarpersona= persona::find($id);
        $borrarpersona-> delete();
        return response()->json(["persona"=>persona::all()],202);
    }

    public function actualizarpersona(Request $request, $id){
       $nueva= persona::find($id);
       $nueva->Nombre = $request->Nombre;
       $nueva->Apellido_paterno = $request->Apellido_paterno;
       $nueva->Apellido_materno = $request->Apellido_materno;

       if($nueva->save())
       return response()->json(["persona"=>$nueva],200);
    }
}

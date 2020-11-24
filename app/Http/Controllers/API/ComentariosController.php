<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\comentario;

class ComentariosController extends Controller
{
    public function indexC($id = null){
        if($id)
        return response()->json(["comentario"=>comentario::find($id)],200);
       return response()->json(["comentarios"=>comentario::all()],200);
   }

    public function guardarcomentario(Request $request){
       $comentario = new comentario();
       $comentario->usuario_id = $request->usuario_id;
       $comentario->persona_id = $request->persona_id;
       $comentario->contenido = $request->contenido;
       $comentario->save();

       if($comentario->save())
        return response()->json(["comentario"=>$comentario],201);
       return response()->json('ERROR',400);
    }

    public function borrarcomentario($id){
        $borrarcomentario= new comentario();
        $borrarcomentario= comentario::find($id);
        $borrarcomentario-> delete();
        return response()->json(["comentario"=>comentario::all()],202);
    }

    public function actualizarcomentario(Request $request, $id){
       $nuevo= comentario::find($id);
       $nuevo->contenido = $request->contenido;

       if($nuevo->save())
       return response()->json(["comentario"=>$nuevo],200);
    }

}

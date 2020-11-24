<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\producto;

class ProductosController extends Controller
{
    public function indexP($id = null){
        if($id)
        return response()->json(["producto"=>producto::find($id)],200);
       return response()->json(["producto"=>producto::all()],200);
   }

    public function guardarproducto(Request $request){
       $producto = new producto();
       $producto->usuario_id = $request->usuario_id;
       $producto->persona_id = $request->persona_id;
       $producto->comentario_id = $request->comentario_id;
       $producto->Nombre_Producto = $request->Nombre_Producto;
       $producto->Descripcion = $request->Descripcion;
       $producto->save();

       if($producto->save())
        return response()->json(["producto"=>$producto],201);
       return response()->json('ERROR',400);
    }

    public function borrarproducto($id){
        $borrarproducto= new producto();
        $borrarproducto= producto::find($id);
        $borrarproducto-> delete();
        return response()->json(["producto"=>producto::all()],202);
    }

    public function actualizarproducto(Request $request, $id){
       $new= producto::find($id);
       $new->Nombre_Producto = $request->Nombre_Producto;
       $new->Descripcion = $request->Descripcion;

       if($new->save())
       return response()->json(["producto"=>$new],200);
    }
}

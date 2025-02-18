<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Carrito;
use App\Models\User;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {

       $response = Carrito::where('id_user', '=', $request['id_user'])->get();


        return response()->json($response, 200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    { $carrito =  Carrito::where('id_user', '=', $request['id_user'])->where('id_producto', '=', $request['id_producto'])->first();

        if($carrito){

         $carrito->cantidad_producto = $carrito->cantidad_producto +  $request['cantidad_producto'];

         $carrito->save();

        }else{
            $carrito = new Carrito();
            $carrito-> id_user = $request['id_user'];
            $carrito ->id_producto = $request['id_producto'];
            $carrito -> nombre_producto = $request['nombre_producto'];
            $carrito->cantidad_producto = $request['cantidad_producto'];
             $carrito->precio_producto = $request['precio_producto'];
             $carrito->save();
        }


        return response()->json('created');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function show(Carrito $carrito)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_user)
    {
        $carrito = Carrito::where('id_user', '=', $id_user)->where('id_producto', '=', $request['id_producto'])->first();
        $carrito->cantidad_producto = $request['cantidad_producto'];
        $carrito->save();

        return response()->json('update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id_user)
    {
        if(isset($request['id_producto'])){

            $carrito = Carrito::where('id_user', '=', $id_user)->where('id_producto', '=', $request['id_producto'])->first();
            $carrito->delete();
        }else{

            $carrito = Carrito::where('id_user', '=', $id_user)->get();
            foreach($carrito as $lineaCarrito){
                $lineaCarrito->delete();
            }

        }

        return response()->json('delete');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CarritoController extends Controller
{


    public function getCarrito(){

        $response = Http::withToken('nrDd0neP7q')->get('http://carrito/api/carrito', ['id_user' => auth()->user()->id]);

         $carritoVistas = json_decode($response->body(), true);
         return view('carrito.index', compact('carritoVistas'));

    }

    public function putCarrito(Request $request){
        $response = Http::withToken('nrDd0neP7q')->put('http://carrito/api/carrito/'. auth()->user()->id, ['id_producto'=> $request['id_producto'], 'cantidad_producto'=>$request['cantidad_producto']]);

        return redirect()->route('carrito');
    }


    public function postCarrito(Request $request , Producto $producto){



        $response = Http::withToken('nrDd0neP7q')->withOptions(['allow_redirects'=>false])->post('http://carrito/api/carrito', ['id_user' => auth()->user()->id, 'id_producto'=> $producto->id,'nombre_producto'=>$producto->nombre, 'precio_producto' => $producto->precio, 'cantidad_producto' => 1]);

        return redirect()->route('carrito');
    }


    public function deleteCarrito(Request $request){

        if(isset($request['id_producto'])){
            //borra una linea del carrito
            $response = Http::withToken('nrDd0neP7q')->delete('http://carrito/api/carrito/'. auth()->user()->id,['id_producto'=>$request['id_producto']]);

        }else{
            //borra el carrito entero
            $response = Http::withToken('nrDd0neP7q')->delete('http://carrito/api/carrito/'. auth()->user()->id);

        }

        return redirect()->route('carrito');
    }
}


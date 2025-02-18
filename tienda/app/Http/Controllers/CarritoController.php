<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\LineaPedido;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CarritoController extends Controller
{


    public function getCarrito(){

        $response = Http::withToken('nrDd0neP7q')->get('http://carrito/api/carrito', ['id_user' => auth()->user()->id]);

        $carritoVistas = json_decode($response->body(), true);

        $totalPrecio = 0;
        foreach ($carritoVistas as $lineaCarrito) {

            $totalPrecio +=  $lineaCarrito['cantidad_producto'] * $lineaCarrito['precio_producto'];

        }

         return view('carrito.index', compact('carritoVistas', 'totalPrecio'));

    }

    public function putCarrito(Request $request){
        $response = Http::withToken('nrDd0neP7q')->put('http://carrito/api/carrito/'. auth()->user()->id, ['id_producto'=> $request['id_producto'], 'cantidad_producto'=>$request['cantidad_producto']]);

        return redirect()->route('carrito');
    }


    public function postCarrito(Request $request , Producto $producto){



        $response = Http::withToken('nrDd0neP7q')->withOptions(['allow_redirects'=>false])->post('http://carrito/api/carrito', ['id_user' => auth()->user()->id, 'id_producto'=> $producto->id,'nombre_producto'=>$producto->nombre, 'precio_producto' => $producto->precio, 'cantidad_producto' => $request['valorInicial']]);

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

    public function confirmarPedido(){

        $response = Http::withToken('nrDd0neP7q')->get('http://carrito/api/carrito', ['id_user' => auth()->user()->id]);

        $carrito = json_decode($response->body(), true);


        if($carrito){

            $pedido = new Pedido();
            $pedido-> name = auth()->user()->name;
            $pedido->id_user= auth()->user()->id;
            $pedido->save();

            foreach($carrito as $lineasCarrito){
                $lineaPedido = new LineaPedido();
                $lineaPedido->pedido_id = $pedido->id;
                $lineaPedido->id_producto = $lineasCarrito['id_producto'];
                $lineaPedido->nombre_producto = $lineasCarrito['nombre_producto'];
                $lineaPedido ->precio_unidad = $lineasCarrito['precio_producto'];
                $lineaPedido ->cantidad_producto = $lineasCarrito['cantidad_producto'];
                $lineaPedido->precio_total = $lineasCarrito['precio_producto']* $lineasCarrito['cantidad_producto'];
                $lineaPedido->save();
            }


             Http::withToken('nrDd0neP7q')->delete('http://carrito/api/carrito/'. auth()->user()->id);

             $pedido->load('lineaPedido');

             return view('pedido.index', compact('pedido'));


        }else{
            return redirect()->route('productos.index');
        }







    }
}


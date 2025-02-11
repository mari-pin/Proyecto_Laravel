<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CarritoController extends Controller
{


    public function getCarrito(){

        $response = Http::withToken('nrDd0neP7q')->get('http://carrito/api/carrito', ['id_user' => auth()->user()->id]);

         $carritoVistas = $response->body();
         return view('carrito.index', compact('carritoVistas'));

    }

    public function putCarrito(){
        $response = Http::withToken('nrDd0neP7q')->put('http://carrito/api/carrito/'. auth()->user()->id, ['id_producto'=> 5, 'cantidad_producto'=>2]);
        return $response->body();
    }


    public function postCarrito(){
        $response = Http::withToken('nrDd0neP7q')->withOptions(['allow_redirects'=>false])->post('http://carrito/api/carrito', ['id_user' => auth()->user()->id, 'id_producto'=> 5,'nombre_producto'=>'pantalon', 'precio_producto' => 20, 'cantidad_producto' => 4]);
        return $response->body();
    }


    public function deleteCarrito(){
        $response = Http::withToken('nrDd0neP7q')->delete('http://carrito/api/carrito/'. auth()->user()->id,['id_producto'=>5]);
        return $response->body();
    }
}


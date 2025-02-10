<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CarritoController extends Controller
{


    public function getCarrito(){

        $response = Http::withToken('nrDd0neP7q')->get('http://carrito/api/carrito', ['id_user' => auth()->user()->id]);

        return $response->body();

    }
}

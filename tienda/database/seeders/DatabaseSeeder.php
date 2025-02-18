<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $producto = new Producto();
        $producto->nombre = 'camiseta';
        $producto->precio = 25;
        $producto->imagen = 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcQRQ7K-zLg7j_u5c-cFUZOtykuAWEW0iLpuyBCQFy6a7qJsKZheFWrgwxyp_Al7IJrCdIuuHiwCGkoxjWfKxu8FXa8PQGPXWAcgKRnRf23vOqFJ7Gj3fK9JRzYeZ4FBlGG2M_RajMf0&usqp=CAc';
        $producto->save();

        $producto = new Producto();
        $producto->nombre = 'chaqueta';
        $producto->precio = 50;
        $producto->imagen = 'https://aurelien-online.com/cdn/shop/files/Aurelien_Cashmere_Puffer_Jacket_AUR1_wool_men_bomber_caramel2.jpg';
        $producto->save();

        $producto = new Producto();
        $producto->nombre = 'pantalon';
        $producto->precio = 20;
        $producto->imagen = 'https://mivestidorazul.es/15639-large_default/pantalon-mujer-vistructia-beige.jpg';
        $producto->save();
    }
}

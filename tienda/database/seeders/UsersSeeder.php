<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = new User();
      $user->name = "Administrador";
      $user->email = "ana@gmail.com";
      $user->password = bcrypt('1');
      $user->rol = "admin";
      $user->save();

      User::factory()->count(5)->create();
    }
}

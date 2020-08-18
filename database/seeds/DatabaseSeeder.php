<?php

use App\User;
use App\Receta;
use App\Categoria;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class, 5)->create()
            ->each(function ($user){
                $user->perfil()->create();
            });
        
        $me = factory(User::class)->make();
        $me->email = 'jesus.ra98@hotmail.com';
        $me->password = Hash::make('jamon123');
        $me->save();

        $categorias = factory(Categoria::class, 5)->create();
        $recetas = factory(Receta::class, 10)->make()
            ->each(function($receta) use($users, $categorias){
                $receta->user_id = $users->random()->id;
                $receta->categoria_id = $categorias->random()->id;
                $receta->save();
            });

        $me->recetas()->saveMany($recetas->random(5));
        // $this->call(CategoriaSeeder::class);
        // $this->call(RecetaSeeder::class);
        // $this->call(UserSeeder::class);
    }
}

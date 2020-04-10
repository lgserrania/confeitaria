<?php

use Illuminate\Database\Seeder;

class AdicionaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tamanhos')->insert([
            'nome' => Str::random(10),
            'preco' => 20.0,
        ]);
        DB::table('categorias')->insert([
            'nome' => Str::random(10),
        ]);
        DB::table('formatos')->insert([
            'nome' => Str::random(10),
            'preco' => 20.0,
        ]);
        DB::table('coberturas')->insert([
            'nome' => Str::random(10),
            'preco' => 20.0,
        ]);
        DB::table('massas')->insert([
            'nome' => Str::random(10),
            'preco' => 20.0,
        ]);
        DB::table('topos')->insert([
            'nome' => Str::random(10),
            'preco' => 20.0,
        ]);
        for($i = 0; $i < 5; $i++){
            DB::table('recheios')->insert([
                'nome' => Str::random(10),
                'preco' => 20.0,
            ]);
        }
        DB::table('tamanhos')->insert([
            'nome' => Str::random(10),
            'preco' => 20.0,
        ]);
    }
}

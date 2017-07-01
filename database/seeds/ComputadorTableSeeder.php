<?php

use Illuminate\Database\Seeder;
use App\Computador;
use App\Cliente;

class ComputadorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = new Computador();
        $c->nome_estacao = 'EstacaoXX';
        Cliente::first()->computadores()->save($c);
    }
}

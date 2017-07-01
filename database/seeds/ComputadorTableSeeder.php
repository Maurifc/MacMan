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
        if(Computador::first() === null){
          $c = new Computador();
          $c->nome_estacao = 'EstacaoExemplo';
          $c->login = 'Usuario SO';
          $c->grupo_trabalho = 'GrupoEmpresaExemplo';
          $c->so = 'Debian 9 Stretch';
          $c->ip = '192.168.0.1';
          $c->nome_usuario = 'José';
          Cliente::first()->computadores()->save($c);
        }

        echo "Tabela 'computadores' semeada\n";
    }
}

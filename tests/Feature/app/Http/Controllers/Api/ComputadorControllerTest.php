<?php

namespace Tests\Feature\app\Http\Controllers\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Computador;
use App\Cliente;
class ComputadorControllerTest extends TestCase
{
  use WithoutMiddleware;
  use DatabaseMigrations;

  protected $computadores;
  protected $computador;

  /*
  | GETS
  */
  public function test_should_return_all_fields()
  {
    $computadores = $this->insertComputadores();
    $response = $this->json('get',
        'api/computadores/'.$computadores->first()->comp_id);

    $response->assertJsonStructure([
      'comp_id',
      'cliente_id',
      'nome_estacao',
      'login',
      'grupo_trabalho',
      'dominio',
      'so_id',
      'so_arquitetura',
      'ip',
      'nome_usuario',
      'observacao',
    ]);
  }

  public function test_should_return_all_computers()
  {
    $computadores = $this->insertComputadores();
    $response = $this->json('get', 'api/computadores');

    foreach ($computadores as $computador) {
        $response->assertJsonFragment([
          'comp_id' => $computador->comp_id,
        ]);
    }
  }

  public function test_should_return_empty_if_has_no_computer()
  {
    $response = $this->json('get', 'api/computadores');
    $response->assertJson([
     'empty' => true,
     ]);
  }

  public function test_should_return_a_computer_from_id()
  {
    $computador = $this->insertComputador();
    $response = $this->json('get', 'api/computadores/'.$computador->comp_id);
    $response->assertJson([
      'comp_id' => $computador->comp_id
    ]);
  }

  public function test_invalid_id_should_return_error()
  {
    $computador = $this->insertComputador();

    $response = $this->json('get', 'api/computadores/100'); //comp_id 100 doesn't exists
    $response->assertStatus(403);
    $response->assertJson(['error' => true]);
  }

  /*
  | CREATE/UPDATE TESTS
  */
  public function test_should_create_computer_and_return_json()
  {
    $cliente = factory(\App\Cliente::class)->create();
    $so = factory(\App\SistemaOperacional::class)->create();

    $response = $this->json('post', 'api/computadores',[
     'cliente_id'=> $cliente->cliente_id,
     'nome_estacao' => 'EstacaoXX',
     'login' => 'Loginusuario',
     'grupo_trabalho' => 'Grupo de trabalho',
     'dominio' => '',
     'so_id' => $so->so_id,
     'so_arquitetura' => 2,
     'ip' => '192.168.0.100',
     'observacao'=> 'Aut dolores et deserunt nostrum amet consequuntur expedita',
     ]);

     $response->assertJson([
       'cliente_id'=> $cliente->cliente_id,
       'nome_estacao' => 'EstacaoXX',
       'login' => 'Loginusuario',
       'grupo_trabalho' => 'Grupo de trabalho',
       'dominio' => '',
       'so_id' => $so->so_id,
       'so_arquitetura' => 2,
       'ip' => '192.168.0.100',
       'observacao'=> 'Aut dolores et deserunt nostrum amet consequuntur expedita',
      ]);
  }
  //
  // public function test_should_return_error_if_cliente_id_null()
  // {
  //   $response = $this->json('post', 'api/computadores',[
  //    'cliente_id'=> '',
  //    'nome_software'=> 'Kaspersky',
  //    'chave'=> '0000-0000-0000-0000',
  //    'login'=> 'login-',
  //    'senha'=> 'senha-',
  //    'data_expiracao'=> '2016-09-15',
  //    'observacao'=> 'Aut dolores et deserunt nostrum amet consequuntur expedita',
  //    ]);
  //
  //    $response->assertStatus(422);
  // }
  //
  // public function test_should_return_error_if_software_name_null()
  // {
  //   $cliente = factory(\App\Cliente::class)->create();
  //
  //   $response = $this->json('post', 'api/computadores',[
  //    'cliente_id'=> '1',
  //    'nome_software'=> '',
  //    'chave'=> '0000-0000-0000-0000',
  //    'login'=> 'login-',
  //    'senha'=> 'senha-',
  //    'data_expiracao'=> '2016-09-15',
  //    'observacao'=> 'Aut dolores et deserunt nostrum amet consequuntur expedita',
  //    ]);
  //
  //    $response->assertStatus(422);
  // }
  //
  // public function test_should_return_error_if_cliente_id_invalid()
  // {
  //   $response = $this->json('post', 'api/computadores', [
  //    'cliente_id'=> 300, //cliente_id 300 doesn't exists
  //    'nome_software'=> 'Kaspersky',
  //    'chave'=> '0000-0000-0000-0000',
  //    'login'=> 'login-',
  //    'senha'=> 'senha-',
  //    'data_expiracao'=> '2016-09-15',
  //    'observacao'=> 'Aut dolores et deserunt nostrum amet consequuntur expedita',
  //    ]);
  //
  //
  //    $response->assertJson([
  //     'error' => 'true',
  //     ]);
  //     $response->assertStatus(403);
  // }
  //
  // public function test_should_update_client()
  // {
  //   $computador = factory(Licenca::class)->create();
  //
  //   $response = $this->json('put', 'api/computadores/'.$computador->comp_id, [
  //    'nome_software'=> 'novo_nome_software',
  //    'cliente_id'=> $computador->cliente->cliente_id,
  //   ]);
  //
  //   $response->assertJson([
  //    'nome_software'=> 'novo_nome_software',
  //   ]);
  // }
  //
  // public function test_should_return_error_if_computer_do_not_exists()
  // {
  //   //comp_id 300 do not exists
  //   $response = $this->json('put', 'api/computadores/300', [
  //    'nome_software'=> 'novo_nome_software',
  //    'cliente_id'=> 1,
  //   ]);
  //
  //   $response->assertJson([
  //    'error' => true,
  //    ]);
  //   $response->assertStatus(403);
  // }
  //
  // public function test_should_return_error_if_software_name_is_empty()
  // {
  //   $computador = factory(Licenca::class)->create();
  //
  //   $response = $this->json('put', 'api/computadores/'.$computador->comp_id, [
  //    'nome_software'=> '',
  //    'cliente_id'=> $computador->cliente->cliente_id,
  //   ]);
  //
  //   $response->assertStatus(422);
  // }


  public function insertComputadores($quantidade = 3)
  {
    return factory(Computador::class, $quantidade)->create();
  }
  public function insertComputador()
  {
    return $this->insertComputadores(1)->first();
  }
}

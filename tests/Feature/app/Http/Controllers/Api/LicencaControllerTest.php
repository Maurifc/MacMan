<?php

namespace Tests\Feature\app\Http\Controllers\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Licenca;

class LicencaControllerTest extends TestCase
{
  use WithoutMiddleware;
  use DatabaseMigrations;

  /*
  | GETS
  */
  public function test_should_return_all_fields()
  {
    $licenca = factory(Licenca::class)->create();
    $response = $this->json('get', 'api/licencas/1');

    $response->assertJsonStructure([
      'licenca_id',
      'cliente_id',
      'nome_software',
      'chave',
      'login',
      'senha',
      'data_expiracao',
      'qnt_ativacoes',
      'observacao'
    ]);
  }

  public function test_should_return_all_licencas()
  {
    $licencas = factory(Licenca::class, 3)->create();

    $response = $this->json('get', 'api/licencas');

    foreach ($licencas as $licenca) {
        $response->assertJsonFragment([
          'licenca_id' => $licenca->licenca_id,
        ]);
    }
  }

  public function test_should_return_empty_if_has_no_licenca()
  {
    $response = $this->json('get', 'api/licencas');
    $response->assertJson([
     'empty' => true,
     ]);
  }


  public function test_should_return_a_license_from_id()
  {
    $licenca = factory(Licenca::class)->create();

    $response = $this->json('get', 'api/licencas/'.$licenca->licenca_id);
    $response->assertJson([
      'licenca_id' => $licenca->licenca_id
    ]);
  }

  public function test_invalid_id_should_return_error()
  {
    $licenca = $this->licencas = factory(Licenca::class)->create();

    $response = $this->json('get', 'api/licencas/100');
    $response->assertStatus(403);
    $response->assertJson(['error' => true]);
  }

}

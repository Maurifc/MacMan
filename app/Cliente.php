<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
  protected $primaryKey = 'cliente_id';

  public function computadores(){
    return $this->hasMany('App\Computador', 'cliente_id');
  }

  public function telefones(){
    return $this->hasMany('App\Telefone', 'cliente_id');
  }
}

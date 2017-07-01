<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Computador extends Model
{
  protected $primaryKey = 'comp_id';
  protected $table = 'computadores';

  public function cliente(){
    return $this->belongsTo('App\Cliente', 'cliente_id');
  }
}

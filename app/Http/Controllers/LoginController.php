<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
  //Tenta realizar a autenticação do usuário
  public function login(Request $request){
    //Retorna true caso o login foi bem sucedido
    if(Auth::attempt([
        'login' => $request->login,
        'password' => $request->password]))
    {
      return ['logado' => true];
    } else {
      return response(['logado' => false], 403);
    }
  }

  //Faz logout do usuário
  public function logout(){
    Auth::logout();
    return ['deslogado' => true];
  }

  //Retorna um JSON informando o estado do usuário (Logado/Deslogado)
  public function status()
  {
    return ['logado' => Auth::check()];
  }
}

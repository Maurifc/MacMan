<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">{{config('app.name')}}</a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav" v-show="$can('admin')">
          <li class="nav-item active">
            <router-link to="/computadores" class="nav-link" href="#">Computadores</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/licencas" class="nav-link" href="#">Licenças</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/clientes" class="nav-link" href="#">Clientes</router-link>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto" v-show="$can('admin')">
          <li class="nav-item">
            <router-link to="/logout" class="nav-link" href="#">Sair</router-link>
          </li>
        </ul>

      </div>
    </nav>
    @yield('content')
  </div>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

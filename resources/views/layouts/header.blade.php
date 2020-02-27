<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
    <header>
      <div id="app">
          <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
              <div class="container">
                  <a class="navbar-brand" href="{{ url('/') }}">
                      Home
                  </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                      <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <!-- Left Side Of Navbar -->
                      <div class="dropdown">
                        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Categorías
                          </button>
                        <li class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="{{ route('category', ['1']) }}">Acción</a>
                          <a class="dropdown-item" href="{{ route('category', ['2']) }}">Estrategia</a>
                          <a class="dropdown-item" href="{{ route('categories') }}">Más...</a>
                        </li>
                      </div>
                        <form id="search" action="search" method="GET" role="search">
                          {{ csrf_field() }}
                          <div class="col-12">
                              <div id="searchBar">
                                  <div class="input-group">
                                      <input id="search" name="search" type="text" class="form-control" placeholder="Buscá apps..." />
                                  </div>
                              </div>
                          </div>
                        </form>
                      <!-- Right Side Of Navbar -->
                      <ul class="navbar-nav ml-auto">
                          <!-- Authentication Links -->
                          @guest
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('login') }}">Ingresar</a>
                              </li>
                              @if (Route::has('register'))
                                  <li class="nav-item">
                                      <a class="nav-link" href="{{ route('register') }}">Registrate</a>
                                  </li>
                              @endif
                          @else
                              @if (Auth::user()->isDev == 1)
                                <li id="subirUnaApp" class="nav-item">
                                    <a class="nav-link" href="{{ route('create') }}">Subir una app</a>
                                </li>
                              @endif
                              <li id="compras" class="nav-item">
                                  <a class="nav-link" href="{{ route('userProfile') }}">Compras</a>
                              </li>
                              <li class="nav-item dropdown">
                                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                      {{ Auth::user()->name }} <span class="caret"></span>
                                  </a>

                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                          {{ __('Logout') }}
                                      </a>

                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          @csrf
                                      </form>
                                  </div>
                              </li>
                          @endguest
                      </ul>
                  </div>
              </div>
          </nav>

          <main class="py-4">
              @yield('content')
          </main>
      </div>
    </header>
</html>

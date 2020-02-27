@extends('layouts.app')
<body>
@include('layouts.header')

@section('content')
  <div class="container">
    <section class = "row justify-content-center">
      <article id="tituloCategoria" class="card">
        <h3>Nuestras Apps</h3>
        </article>
      <article id="nombreCategorias" class="card">
        @forelse ($categories as $category)
          <h4 class="card-header" id="nombreCategorias">{{ $category["name"] }}</h4>
          @forelse ($applications as $application)
            @if ($application["category_id"] == $category["category_id"])
              <li id="applicationsInCat">
                <div class="card-body">
                  <h4>{{ $application["name"] }}</h4>
                  <p><i>{{ $application["description"] }}</i></p>
                  <img id="app_img" src="{{ $application["image_url"]}}" alt="imagen de la increíble app">
              <p>${{ $application["price"]}}</p>
                <form class="form-group" action="{{ route('order') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <input type="hidden" name= "price" value="{{$application["price"]}}">
              <input type="hidden" name= "application_id" value="{{$application["application_id"]}}">
              <button class="btn btn-primary" type="submit" name="user_id" value="{{ Auth::user()->id ?? ''}}">Comprar</button>
            </div>
              </form>
            </div>
          </li>
            @endif
          @empty
            <h6>No hay aplicaciones en esta categoría</h6>
            @endforelse
          @empty
        @endforelse
      </article>
    </section>
  </div>
  @include('layouts.footer')
  </body>

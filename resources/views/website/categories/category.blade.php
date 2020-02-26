@extends('layouts.app')
<body>
@include('layouts.header')

@section('content')

  <div class="container">
    <section class = "row justify-content-center">
      <article id="tituloCategoria" class="card">
        <h1>Navegá por categoría para encontrar lo que buscás</h1>
        </article>
        <article id="nombreCategoria" class="card">
          <h4 id="nombreCategoria">{{ $categories["name"] }}</h4>
          <li>
            @forelse ($applications as $application)
              @if ($application["category_id"] == $categories["category_id"])
                <li id="applications">
                  <div class="card-body">
                    <h4>{{ $application["name"] }}</h4>
                    <p><i>{{ $application["description"] }}</i></p>
                    <img id="app_img" src="{{ $application["image_url"]}}" alt="imagen de la increíble app">
                <p>${{ $application["price"]}}</p>
                  <form class="form-group" action="{{ route('order') }}" method="post" enctype="multipart/form-data">
              @csrf
                  <div class="form-group">
                    <input type="hidden" name= "application_id" value="{{$application["id"]}}">
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary" type="submit" name="button">Comprar</button>
                  </div>
                </form>
              </div>
            </li>
              @endif
            @empty

            @endforelse
          </li>
        </article>
      </section>
  </div>
  @include('layouts.footer')
</body>

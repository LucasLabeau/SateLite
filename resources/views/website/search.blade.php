@extends('layouts.app')
<body>
@include('layouts.header')
@section('content')
<div class="container">
  <section class="row justify-content-center" id="search" >
    <article class="card" id="searchTop">
    <h3 id="searchTop">Los resultados de tu búsqueda:</h3>
    <div class="card-body">
      <ul>
        @forelse ($application as $app)
          <li id="searchBody">
            <div class="card-body">
            <h4>{{ $app->name }}</h4>
            <p><i>"{{ $app->description }}"</i></p>
            <img id="app_img" src="{{ $app->image_url}}" alt="imagen de la increíble app">
            <p>${{ $app->price}}</p>
            <form class="form-group" action="{{ route('order') }}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
              <input type="hidden" name= "application_id" value="{{$app->application_id}}">
          </div>
            <div class="form-group">
              <button class="btn btn-primary" type="submit" name="button">Comprar</button>
            </div>
          </form>
          <a id="ver" href="{{ route('appShow', $app->application_id) }}">Ver</a>
        </div>
      </li>
        @empty

        @endforelse
      </ul>

    </div>
    </article>
  </section>
</div>

@include('layouts.footer')
</body>
</html>

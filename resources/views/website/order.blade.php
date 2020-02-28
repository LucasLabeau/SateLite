@extends('layouts.app')
<body>
@include('layouts.header')
@section('content')
  <div class="container" id="orderPageMain">
    <section id="orderSection" class = "row justify-content-center">
      <article id="orderSection" class="card">
        <div  class="card-body">
          <h2>¡Tu orden ha sido enviada con éxito!</h2>
        </div>
        <a href="{{route('home')}}">Volver a la pagina pricipal</a>

      </article>
    </section>
  </div>
  @include('layouts.footer')
  </body>

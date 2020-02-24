@extends('layouts.app')
<body>
@include('layouts.header')

@section('content')

  <div class="container">
  <h1>Navegá por categoría para encontrar lo que buscás</h1>
  <section class = "row justify-content-center">
    <article class="card">

  <ul>
      <h4>{{ $categories["name"] }}</h4>
  </ul>
  </article>
  </section>

  </div>
</body>

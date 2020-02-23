@extends('layouts.app')

@include('layouts.header')

@section('content')
<body>
  <div class="container">
  <h1>Navegá por categoría para encontrar lo que buscás</h1>
  <section class = "row justify-content-center">
    <article class="card">

  <ul>
    @forelse ($categories as $category)
      <h4>{{ $category["name"] }}</h4>
      @empty

      @endforelse

  </ul>
  </article>
  </section>

  </div>
</body>

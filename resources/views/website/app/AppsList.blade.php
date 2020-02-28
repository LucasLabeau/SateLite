@extends('layouts.app')
<body>
@include('layouts.header')

@section('content')
  <div class="container" id="appsMain">
    <h2>Lo pediste, lo querías, ¡ahora lo tenés!</h2> <br>
    <h4>Las mejores apps al mejor precio, todo eso en SateLite</h4>
    <section id="appsMain" class = "row justify-content-center">
      <article id="appsMain"  class="card">

    <ul>
      @forelse ($applications as $application)
        <li id="applications1">
          <div class="card-body">
          <h4>{{ $application["name"] }}</h4>
          <p><i>"{{ $application["description"] }}"</i></p>
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
        <a href="{{ route('appShow', $application["application_id"]) }}">Ver</a>
      </div>
    </li>
      @empty

      @endforelse
      {{$applications->links()}}
    </ul>

    </article>
    </section>
  </div>
  @include('layouts.footer')
  </body>

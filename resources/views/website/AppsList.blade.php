@extends('layouts.app')

@section('content')
  <div class="container" id="appsMain">
    <h1>Lo pediste, lo querías, ¡ahora lo tenés!</h1> <br>
    <h4>Las mejores apps al mejor precio, todo eso en SateLite</h4>
    <section class = "row justify-content-center">
      <article class="card">

    <ul>
      @forelse ($applications as $application)
        <li>
          <div class="card-body">
          <h4>{{ $application["name"] }}</h4>
          <p><i>{{ $application["description"] }}</i></p>
          <p>${{ $application["price"]}}</p>
          <img id="app_img" src="{{ $application["image_url"]}}" alt="imagen de la increíble app">
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
      @empty

      @endforelse
      {{$applications->links()}}
    </ul>

    </article>
    </section>
  </div>

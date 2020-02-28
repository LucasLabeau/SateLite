@extends('layouts.app')
<body>
@include('layouts.header')
@section('content')
  @if(count($errors) > 0)
    <div id="msg" class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <div class="container">
        <section id="editSeccion" class="row justify-content-center">
          <article id="profileCard" class="card">
            <div class="card-header">
              <h2>Mis Apps</h2>
            </div>
            @forelse ($applications as $application)
              @if ($application->user_id == Auth::user()->id)
                <div class="card-header">
                <li id="appShow">
                <div class="">
                  <h4>{{ $application->name }}</h4>
                  <p><i>"{{ $application->description }}"</i></p>
                  <img id="app_img" src="{{ $application->image_url}}" alt="imagen de la increíble app">
                  <p>${{ $application->price}}</p>
                </div>

              </li>
              <a id="ver" href="{{ route('appShow', $application->application_id) }}">Ver</a>
              <a id="edit" href="{{ route('edit', $application->application_id) }}">Editar</a>
              <a id="destroy" href="{{ route('deleteApp', $application->application_id) }}">Eliminar</a>
            </div>
          @endif

        @empty
          <div id="upsProfile" class="">
            <h4>No se han encontrado apps que hayas subido</h4>
            </div>
        @endforelse
      </article>
    </section>
  </div>
      @include('layouts.footer')
    </body>

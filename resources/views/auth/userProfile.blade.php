@extends('layouts.app')
<body>
@include('layouts.header')
@section('content')
  <div class="container">
      <section id="malaSeccion" class="row justify-content-center">
        <article id="profileCard" class="card">
          @forelse ($orders as $application)
            @if ($application->id == Auth::user()->id)
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
              </div>
              <div id="commentAdd" class="card-body">
                <form method="POST" action="{{ route('createComment') }}">
                    @csrf
                    <div class="form-group row">
                        <label id="comment" for="content" class="col-md-4 col-form-label text-md-right">{{ __('Dejanos tu comentario') }}</label>

                        <div class="col-md-6">
                            <input id"textarea" type="textarea" class="lg-textarea form-control" name="content" value="{{ old('content') }}" required>
                            </div>
                    </div>
                    <div id="ratingAdd" class="form-group row">
                      <label id="rating" class="col-md-4 col-form-label text-md-right" for="rating">{{ __('Rating') }}</label>
                        <div class="col-md-4 offset-md-2">
                                <input id="rating" class="form-control" type="number" min="1" max="5" name="rating" value="{{ old('rating') }}" required>
                              </div>
                    </div>
                    <input type="hidden" name="order_id" value="{{ $application->order_id }}">
                    <div id=commentCardBot  class="form-group row mb-0">
                          <div class="col-md-8 offset-md-4">
                              <button type="submit" class="btn btn-info">
                                  {{ __('Subir') }}
                              </button>
                              <input class="btn btn-secondary" type="reset" value="Reset">
                          </div>
                      </div>
                  </form>
              </div>
            @else

            @endif

          @empty
            <div class="card">
              <div id="upsProfile" class="card-body">
                <h4>Vacío por acá</h4>
                </div>
            </div>

          @endforelse

        </article>
      </section>
    </div>
@include('layouts.footer')
</body>

@extends('layouts.app')

@section('content')
    <section id="malaSeccion" class="row justify-content-center">
      <article class="card">
        <li id="appShow">
          <div class="">
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
      </div>
    </li>
      <h3>Reseñas</h3>
        @foreach ($data as $dat)
          @foreach($dat->orders as $orders)
            @if ($orders->application_id == $application["application_id"])
              @forelse($orders->comments as $comment)

            <li id="comments" class="card">
            <p id="commentName" class="card-header">{{ $dat->name }}</p>
            <div class="card-body">
              <p id="commentContent">{{ $comment->content }}</p>
              <p id="commentRating"><i>Este usuario le ha dado un <b>{{ $comment->rating }}</b> de 5</i></p>
            </div>
            </li><br>


        @empty

      @endforelse
      @endif
    @endforeach
    @endforeach
      </article>
    </section>
  @endsection

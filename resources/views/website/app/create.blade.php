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
            <section class="row justify-content-center">
              <div class="col-md-8">
                <article id= "createCard" class="card">
                  <div class="card-header">{{ __('Subir una App') }}</div>

                  <div class="card-body">
                    <form method="POST" action="{{ route('createPost') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de la App') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="nombre" autofocus>

                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Decripción de la app') }}</label>

                              <div class="col-md-6">
                                <input type="textarea" class="md-textarea form-control" name="description" value="{{ old('description') }}" required>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label id="image" class="col-md-4 col-form-label text-md-right" for="image_url">{{ __('Elegí una imagen o poné el código URL') }}</label>
                                <div id="image" class="col-md-6 offset-md-4">
                                    <input class="form-control" type="url" name="image_url" value="{{ old('image_url') }}" > <br>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label id="catInCreate" for="category">Elija la categoría correspondiente: </label>
                                  <select name="category_id" id="catInCreate" class="mdb-select md-form" value="{{ old('category') }}">
                                    <option value="" disabled selected>Categoría...</option>
                                    @forelse ($categorias as $categoria)
                                      <option value="{{ $categoria['category_id'] }}">{{ $categoria['name'] }}</option>
                                    @empty

                                    @endforelse

                                  </select>
                                </div>
                                <div class="form-group row">
                                  <label id="price" class="col-md-4 col-form-label text-md-right" for="price">{{ __('Precio') }}</label>
                                  <div class="col-md-6 offset-md-4">
                                    <input id="price" class="form-control" type="number" name="price" value="{{ old('price') }}" required>
                                  </div>
                                </div>
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                              </div>
                              <div id=createCardBot  class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                    {{ __('Subir') }}
                                  </button>
                                  <input class="btn btn-secondary" type="reset" value="Reset">
                                </div>
                              </div>
                            </form>
                          </div>
                        </article>
                      </div>
                    </section>
                  </div>
                  @include('layouts.footer')
                </body>

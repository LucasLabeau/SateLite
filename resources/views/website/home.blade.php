@extends('layouts.app')
<body>
@section('content')
<div class="container">
    <section class="row justify-content-center">
        <article class="col-sm-12 col-md-8" id="encabezadoHome">
            <div class="card">
                <div class="card-header">¡Bienvenido!</div>

                <section class="card-body" id ="loginBoolean">
                    @if (session('status'))
                        <article class="alert alert-success" role="alert">
                            {{ session('status') }}
                            <h4>¡Entraste con éxito! Me felicito.</h4>

                        @else
                          <h4>¿Nuevo al sitio? <br>
                            Podés registrarte <a href="{{ route('register') }}">acá</a>
                          </h4>

                    @endif
                    </article>
                </section>
            </div>
        </article>
        <section class="row justify-content-center">
        <article class="col-sm-12 col-md-8" id="contenidoBajoHome" >
          <div class="card">
              <div class="card-body">
                  <h3>Hace años que quisimos llevar adelante este proyecto y
                    estamos muy felices por su visita. Mirá libremente pero
                    SI ROMPES LO PAGAS.</h3>
              </div>
          </div>
        </article>
        </section>
        <section class="row justify-content-center">
        <article class="col-sm-12 col-md-8" id="contenidoAltoHome" >
          <div class="card">
              <div class="card-body">
                  <h5>Hacé click en la foto para ver nuestros productos</h5>
                  <a href="{{ route('products') }}"><img id="homeImg"src="img/products-link-img.jpg" alt="Imagen que lleva a los
                   productos"></a>

              </div>
          </div>
        </article>
        </section>
    </section>
</div>
@endsection
</body>

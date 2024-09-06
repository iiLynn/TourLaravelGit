@extends('welcome')

@section('content')
<style>


header {
  background-image: url('img/hero-bg.jpg');
  background-size: cover;
  background-position: center;
}

.card img {
  height: 200px;
  object-fit: cover;
}


footer {
  margin-top: 50px;
}
.carousel-item img {
  height: 500px; /* Ajusta la altura a tu preferencia */
  object-fit: cover; /* Esto asegura que las imágenes se recorten adecuadamente para llenar el área disponible */
}

img {
    width: 100px;  /* Ancho fijo */
    height: 100px; /* Alto fijo */
    object-fit: cover; /* Ajusta la imagen para que llene completamente el área */
}

</style>
    <!-- Paquetes Section -->
    <main>
    <div class="container">
        <h1>Paquetes Disponibles</h1>
        <div class="row">
            @foreach($tours as $tour)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ asset('storage/' . $tour->imagen) }}" class="card-img-top" alt="{{ $tour->titulo }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $tour->titulo }}</h5>
                            <p class="card-text">Precio: ${{ $tour->precio }}</p>
                            <a href="{{ route('detalles.show', $tour->id) }}" class="btn btn-primary">Ver Detalles</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</main>
    @endsection

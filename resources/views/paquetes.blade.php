@extends('welcome')

@section('content')
<style>



.header {
    background-image: url('imagenes/n2.jpg');
    background-size: cover;
    background-position: center;
    height: 50vh; /* Ocupa la mitad superior de la ventana */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color: white; /* Color del texto en la imagen */
    text-align: center;
    margin-bottom: 20px;
}

.header h1 {
    font-size: 2.5rem;
    margin: 0;
}

.header p {
    font-size: 1.5rem;
    margin: 10px 0 0;
}



.card {
    border: 1px solid #0078D4; /* Color del borde azul */
    border-radius: 10px;
    margin-bottom: 40px; /* Espacio entre las tarjetas */
}

.card img {
    width: 100%; /* Asegura que la imagen ocupe el 100% del contenedor */
    height: 200px; /* Ajusta la altura de la imagen */
    object-fit: cover; /* Ajusta la imagen para que llene el área sin distorsionarse */
}

.card-body {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.card-title {
    font-size: 1.5rem;
    margin-bottom: 10px;
}

.card-text {
    font-size: 1rem;
    color: #333;
}

.card-price {
    font-size: 1.2rem;
    font-weight: bold;
    color: #333;
    text-align: right;
}
.mit{
    text-align: center;
    margin-bottom: 50px;
    margin-top: 50px;
}
</style>

<!-- Paquetes Section -->
<body>
<div class="header">
            <p>EXPERIENCIAS</p>
            <h1>Conoce más sobre El Salvador</h1>
        </div>
        <div class="container">
            <h2 class="mit">Las mejores actividades en El Salvador!</h2>
            <h5 class="mit"> Experiencias independientes que puedes hacer por tu cuenta en tu propio vehículo.
             Reserva con anticipación en línea de forma fácil, rápida y sin preocupaciones. ¡Solo llega y disfruta!!</h5>
        </div>
    <div class="container">
        @foreach($tours as $tour)
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{ asset('storage/' . $tour->imagen) }}" class="card-img" alt="{{ $tour->titulo }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $tour->titulo }}</h5>
                        <p class="card-text">Descripción: {{ $tour->descripcion }}</p>
                        <span class="card-price">Precio: ${{ $tour->precio }}</span>
                        <a href="{{ route('detalles.show', $tour->id) }}" class="btn btn-primary">Ver Detalles</a>
                       
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</body>
@endsection

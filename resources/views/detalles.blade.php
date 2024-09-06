@extends('welcome')

@section('content')

<style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #343a40;
        color: #fff;
        padding: 20px 0;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .header-content {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    header h1 {
        font-size: 28px;
    }

    nav ul {
        list-style: none;
        display: flex;
        gap: 20px;
    }

    nav ul li a {
        text-decoration: none;
        color: #fff;
        font-weight: 500;
    }

    nav ul li a:hover {
        text-decoration: underline;
    }

    .breadcrumb {
        padding: 15px 20px;
        background-color: #007bff;
        color: #fff;
        font-size: 16px;
        border-radius: 8px;
        margin: 20px 0;
    }

    .breadcrumb a {
        color: #fff;
        text-decoration: none;
    }

    .breadcrumb a:hover {
        text-decoration: underline;
    }

    .tour-details {
        max-width: 1200px;
        margin: 20px auto; /* Esto le da margen en la parte superior (40px) y auto para centrar horizontalmente */
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        padding: 30px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .tour-info {
        flex: 2;
        min-width: 500px;
    }

    .tour-info h2 {
        font-size: 32px;
        color: #343a40;
        margin-bottom: 20px;
        border-bottom: 2px solid #007bff;
        padding-bottom: 10px;
    }

    .tour-info img {
        width: 100%;
        height: auto;
        border-radius: 10px;
        border: 1px solid #ddd;
        margin-top: 20px;
    }

    .tour-description {
        font-size: 18px;
        color: #6c757d;
        margin-top: 20px;
    }

    .booking-info {
        flex: 1;
        min-width: 300px;
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .booking-info h3 {
        font-size: 24px;
        color: #343a40;
        margin-bottom: 15px;
    }

    .price {
        margin: 20px 0;
    }

    .discount {
        color: #dc3545;
        font-size: 18px;
        font-weight: bold;
    }

    .old-price {
        text-decoration: line-through;
        font-size: 16px;
        color: #999;
        margin-right: 10px;
    }

    .current-price {
        font-size: 28px;
        color: #007bff;
    }

    .availability-btn, .btn-primary {
        background-color: #007bff;
        color: #fff;
        padding: 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        font-size: 18px;
        text-align: center;
        display: block;
        text-decoration: none;
        margin-top: 20px;
        transition: background-color 0.3s ease;
    }

    .availability-btn:hover, .btn-primary:hover {
        background-color: #0056b3;
    }

    .help-link {
        text-decoration: none;
        color: #007bff;
        font-size: 16px;
        display: block;
        text-align: center;
        margin-top: 10px;
    }

    footer {
        background-color: #343a40;
        color: #fff;
        text-align: center;
        padding: 15px 0;
        margin-top: 40px;
    }

    img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }
</style>
<main>
    <div class="tour-details">
        <div class="tour-info">
            <h2>{{ $tour->titulo }}</h2>
            <img src="{{ asset('storage/' . $tour->imagen) }}" alt="{{ $tour->titulo }}">
            <p class="tour-description">{{ $tour->descripcion }}</p>
        </div>

        <div class="booking-info">
            <h3>Detalles del Tour</h3>
            <p><strong>Fecha de Inicio:</strong> {{ $tour->dia_inicio }}</p>
<p><strong>Fecha de Fin:</strong> {{ $tour->dia_fin }}</p>

            <p><strong>Duración:</strong> {{ $tour->duracion }} días</p>
            <p><strong>Departamento:</strong> {{ $tour->departamento }}</p>
            <p><strong>Lugar:</strong> {{ $tour->lugar }}</p>
            <div class="price">
                <span class="discount">Precio:</span>
                <span class="old-price">${{ $tour->precio }}</span>
                <span class="current-price">${{ $tour->precio }}</span>
            </div>
            
            @auth
                <form action="{{ route('cart.add', $tour->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-primary">Agregar al carrito</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn-primary">¡Inicia sesión para agregar!</a>
            @endauth

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
</main>
@endsection

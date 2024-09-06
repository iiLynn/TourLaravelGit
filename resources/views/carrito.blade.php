@extends('welcome')

@section('content')
<div class="container">
    <h1>Tu Carrito de Compras</h1>
    @if(session('cart') && count(session('cart')) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Tour</th>
                    <th>Precio</th>
                    <th>Cantidad de personas</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach(session('cart') as $id => $details)
                    @php 
                        // Asegurarse de que 'precio' y 'quantity' existen
                        $precio = $details['precio'] ?? 0;
                        $quantity = $details['quantity'] ?? 1;
                        $subtotal = $precio * $quantity;
                    @endphp
                    <tr>
                        <td>{{ $details['titulo'] ?? 'Desconocido' }}</td>
                        <td>${{ $precio }}</td>
                        <td>{{ $quantity }}</td>
                        <td>${{ $subtotal }}</td>
                        <td>
                            <a href="{{ route('cart.remove', $id) }}" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                    @php $total += $subtotal; @endphp
                @endforeach
            </tbody>
        </table>
        <div class="text-right">
            <h4>Total: ${{ $total }}</h4>
            <a href="{{ route('checkout') }}" class="btn btn-primary">Proceder al Pago</a>
        </div>
    @else
        <p>No tienes ningún tour en tu carrito.</p>
        <a href="{{ route('paquetes') }}" class="btn btn-primary">Explorar Tours</a>
    @endif
</div>
@endsection

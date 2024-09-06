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
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach(session('cart') as $id => $details)
                    @php $total += $details['precio'] * $details['quantity']; @endphp
                    <tr>
                        <td>{{ $details['titulo'] }}</td>
                        <td>${{ $details['precio'] }}</td>
                        <td>{{ $details['quantity'] }}</td>
                        <td>${{ $details['precio'] * $details['quantity'] }}</td>
                        <td>
                            <a href="{{ route('cart.remove', $id) }}" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
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

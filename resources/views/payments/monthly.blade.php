@extends('welcome')

@section('content')
<div class="container">
    <h2>Pagar en Cuotas Mensuales</h2>

    <p>Total a pagar: ${{ $monthlyPayment }} por mes durante 12 meses.</p>

    {{-- Aquí podrías integrar la pasarela de pago que prefieras --}}
    
    <form action="{{ route('payment.process.monthly') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Confirmar Pago Mensual</button>
    </form>
</div>
@endsection

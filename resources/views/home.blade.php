@extends('welcome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Perfil de Usuario') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ Auth::user()->name }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electrónico') }}</label>

                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ Auth::user()->email }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="created_at" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de Registro') }}</label>

                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ Auth::user()->created_at->format('d/m/Y') }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="updated_at" class="col-md-4 col-form-label text-md-end">{{ __('Última Actualización') }}</label>

                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ Auth::user()->updated_at->format('d/m/Y') }}</p>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{ route('logout') }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

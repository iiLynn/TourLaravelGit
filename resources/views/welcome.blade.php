<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agencia de Viajes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Estilos de la Navbar */
        .navbar {
            background-color: #007bff; /* Fondo azul */
            padding: 15px 0;
            
    height: 70px; /* Fijar la altura de la barra de navegación */
}
main {
    font-family: 'Arial', sans-serif; /* Puedes cambiarla por la que desees */
}

        .navbar .navbar-brand {
            color: #fff;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .navbar .navbar-brand:hover {
            color: #f8f9fa;
        }

        .navbar .nav-link {
            color: #fff;
            padding: 0 15px;
        }

        .navbar .nav-link:hover {
            color: #f8f9fa;
            text-decoration: underline;
        }

        /* Estilos del contador de carrito */
        .badge {
            background-color: #dc3545;
            font-size: 0.9rem;
            padding: 5px 10px;
            border-radius: 50%;
        }

        /* Espaciado en la navbar */
        .navbar-nav .nav-item {
            margin-left: 15px;
        }

        /* Estilo del footer */
        footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 20px;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('inicio') }}">Tour Operadora</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('inicio') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('paquetes') }}">Paquetes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('agregartour') }}">agregartour</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('nosotros') }}">Nosotros</a>
                    </li>
                    <li class="nav-item position-relative">
                        <a class="nav-link" href="{{ route('carrito') }}">
                            Carrito
                            @php
                                $cartCount = app('App\Http\Controllers\CartController')->getCartCount();
                            @endphp
                            @if($cartCount > 0)
                                <span class="badge rounded-pill bg-danger">
                                    {{ $cartCount }}
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            @endif
                        </a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4">
    <div class="container">
        <p>&copy; 2024 Tour Operadora. Todos los derechos reservados.</p>
        <p>Encuéntranos en nuestras redes sociales:</p>
        <ul class="list-inline">
            <li class="list-inline-item">
                <a href="https://www.facebook.com/profile.php?id=100058593665611&mibextid=LQQJ4d" target="_blank" class="text-white" aria-label="Facebook">
                    <i class="fab fa-facebook-f fa-2x"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="#" target="_blank" class="text-white" aria-label="Twitter">
                    <i class="fab fa-twitter fa-2x"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="#" target="_blank" class="text-white" aria-label="YouTube">
                    <i class="fab fa-youtube fa-2x"></i>
                </a>
            </li>
        </ul>
    </div>
</footer>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>

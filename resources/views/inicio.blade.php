@extends('welcome')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
/* Configuración del contenedor del carrusel */
.hero {
    position: relative;
    height: 100vh;
}

/* Contenedor de texto a la izquierda */
.text-container {
    position: absolute;
    top: 50%;
    left: 5%;
    transform: translateY(-50%);
    color: white;
    font-size: 24px;
    width: 40%;
    z-index: 1000;
    background-color: rgba(0, 0, 0, 0.5);
    /* Fondo semitransparente */
    padding: 20px;
    border-radius: 10px;
}

/* Estilos para el botón Learn More */
.btn-search {
    display: inline-block;
    padding: 10px 20px;
    background-color: #ff9900;
    color: white;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.btn-search:hover {
    background-color: #cc7a00;
}

/* Estilos del formulario flotante */
.form-container {
    position: absolute;
    top: 10%;
    right: 5%;
    background-color: rgba(255, 255, 255, 0.9);
    padding: 20px;
    border-radius: 10px;
    z-index: 1000;
    width: 30%;
}

/* Control de capas del carrusel */
.carousel-inner {
    z-index: 1;
}

.carousel img {
    object-fit: cover;
    height: 100vh;
}

.tour-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: space-around;
}

.tour-card {
    border: 1px solid #ddd;
    padding: 15px;
    border-radius: 8px;
    width: 300px;
    /* Tamaño fijo de la tarjeta */
    text-align: center;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.tour-card img {
    max-width: 100%;
    height: auto;
    object-fit: cover;
    border-radius: 8px;
}

.tour-card h2 {
    font-size: 1.5em;
    margin-top: 15px;
}

.tour-card p {
    font-size: 1.2em;
    color: #555;
}

.tour-card a {
    margin-top: 10px;
    display: inline-block;
    padding: 10px 15px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.tour-card a:hover {
    background-color: #0056b3;
}
</style>
</head>

<body>

    <div class="hero">
        <!-- Texto a la izquierda -->
        <div class="text-container">
            <h1>El Viaje de tus Sueños</h1>
            <p>Nuestra agencia de viajes está lista para ofrecerte unas vacaciones emocionantes diseñadas
                para ajustarse a tus necesidades y deseos. Un viaje a tu resort favorito,
                seguro tendrás la mejor experiencia.</p>
            <a href="nosotros" class="btn btn-search">Saber Más</a>
        </div>

        <!-- Carrusel -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="\imagenes\panama.jpg" class="d-block w-100" alt="Primera Imagen">
                </div>
                <div class="carousel-item">
                    <img src="\imagenes\n1.jpg" class="d-block w-100" alt="Segunda Imagen">
                </div>
                <div class="carousel-item">
                    <img src="\imagenes\n2.jpg" class="d-block w-100" alt="Tercera Imagen">
                </div>
            </div>
        </div>

        <!-- Formulario flotante -->
        <div class="form-container" id="floatingForm">
            <h3 class="text-center mb-4">Encuentra tu Tour</h3>
            <form id="tourSearchForm" method="POST" action="{{ route('search-tours') }}">
    @csrf
    <div class="mb-3">
        <label for="from" class="form-label">Departamentos</label>
        <select class="form-select" id="from" name="departamento">
        
            <option value="San Miguel">San Miguel</option>
            <option value="Usulutan">Usulután</option>
        </select>
    </div>
    
    <div class="mb-3">
        <label for="depart" class="form-label">Fecha de Salida</label>
        <input type="date" class="form-control" id="depart" name="fecha_salida">
    </div>
    
    <div class="mb-3">
        <label for="duration" class="form-label">Duración</label>
        <select class="form-select" id="duration" name="duracion">
        
            <option value="1">1 Día</option>
            <option value="2">2 Días</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="adults" class="form-label">Adultos</label>
        <input type="number" class="form-control" id="adults" name="adultos" value="1" max="4">
    </div>

    <button type="submit" class="btn btn-warning w-100">Buscar Tour</button>
</form>
        </div>
    </div>
    <!-- Contenedor principal para las experiencias -->
    <div class="container">
        <div class="header">
            <h1>EXPERIENCIAS</h1>
            <p>Conoce más sobre El Salvador</p>
        </div>

        <div class="section-title">
            <h2>ZONA ORIENTAL</h2>
            <p>ZONA ORIENTAL - PLAYAS</p>
        </div>

        
      



    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  



</body>

@endsection
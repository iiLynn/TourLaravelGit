@extends('welcome')

@section('content')

<style>* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    line-height: 1.6;
    background-color: #f5f5f5;
    color: #333;
}

header {
    position: relative;
}

.header-image {
    position: relative;
    text-align: center;
    color: white;
}

.hero-image {
    width: 100%;
    height: auto;
    max-height: 500px;
    object-fit: cover;
}

.header-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(0, 0, 0, 0.6);
    padding: 20px;
    border-radius: 10px;
}

.header-text h1 {
    font-size: 2.5rem;
}

header p {
    font-size: 1.1rem;
}

.about-us {
    background-color: #e8e8e8;
    padding: 40px 20px;
    text-align: center;
}

.about-us h2 {
    font-size: 2rem;
    margin-bottom: 20px;
}

.services {
    padding: 40px 20px;
    text-align: center;
}

.services h2 {
    font-size: 2rem;
    margin-bottom: 20px;
}

.services-container {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}

.service {
    flex-basis: 22%;
    margin: 10px 0;
    background-color: white;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

.full-service {
    margin-top: 40px;
    text-align: left;
    max-width: 800px;
    margin: 0 auto;
}

.full-service ul {
    list-style-type: none;
}

.full-service ul li {
    margin-bottom: 10px;
}

footer {
    background-color: #333;
    color: white;
    padding: 40px 20px;
    text-align: center;
}

footer h2 {
    margin-bottom: 20px;
}

.social-icons a {
    margin: 0 10px;
    display: inline-block;
}

.social-icons img {
    width: 40px;
    height: 40px;
}

    </style>

<body>
    <header>
        <div class="header-image">
            <img src="\imagenes\nosotros1.jpg" alt="Iglesia" class="hero-image">
            <div class="header-text">
                <h1>Sobre nosotros</h1>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>
        </div>
    </header>

    <section class="about-us">
        <h2>Quienes Somos</h2>
        <p>En Tour Operadora, nos especializamos en crear experiencias de viaje inolvidables, conectando a nuestros clientes con destinos increíbles. Con más de 10 años de experiencia, ofrecemos tours diseñados con pasión y atención al detalle, garantizando una experiencia única. Nuestro objetivo es que cada cliente disfrute de un viaje personalizado y adaptado a sus necesidades, creando recuerdos que duren toda la vida. Apostamos por la innovación, la sostenibilidad y el compromiso con la calidad en todos nuestros servicios.</p>
    </section>

    <section class="services">
        <h2>Qué hacemos</h2>
        <div class="services-container">
            <div class="service">
                <h3>Diseño de muebles</h3>
                <p>Sample text. Click to select the text box.</p>
            </div>
            <div class="service">
                <h3>Diseño de interiores</h3>
                <p>Sample text. Click to select the text box.</p>
            </div>
            <div class="service">
                <h3>Puesta en escena de la casa</h3>
                <p>Sample text. Click to select the text box.</p>
            </div>
            <div class="service">
                <h3>Ejemplo de título</h3>
                <p>Sample text. Click to select the text box.</p>
            </div>
        </div>
        
        <div class="full-service">
            <h3>Ofertas de servicios completos:</h3>
            <ul>
                <li>Arquitectura de interiores y planificación del espacio</li>
                <li>Diseño y decoración de interiores</li>
                <li>Especificaciones de acabado y accesorios</li>
                <li>Elevaciones y planos de construcción</li>
                <li>Modelos 3D y visualizaciones fotorealistas</li>
                <li>Muebles a medida</li>
                <li>Selección y adquisición de muebles</li>
            </ul>
        </div>
    </section>

    
</body>



@endsection

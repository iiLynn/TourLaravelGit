@extends('welcome')

@section('content')

<style>
* {
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
            <img src="/imagenes/nosotros1.jpg" alt="Iglesia" class="hero-image">
            <div class="header-text">
                <h1>Sobre nosotros</h1>
                <p>Conectando destinos increíbles con experiencias inolvidables</p>
            </div>
        </div>
    </header>

    <section class="about-us">
        <h2>Quiénes Somos</h2>
        <p>En Tour Operadora, nos especializamos en crear experiencias de viaje inolvidables, conectando a nuestros
            clientes con destinos increíbles. Con más de 10 años de experiencia, ofrecemos tours diseñados con pasión y
            atención al detalle, garantizando una experiencia única. Nuestro objetivo es que cada cliente disfrute de un
            viaje personalizado y adaptado a sus necesidades, creando recuerdos que duren toda la vida. Apostamos por la
            innovación, la sostenibilidad y el compromiso con la calidad en todos nuestros servicios.</p>
    </section>

    <section class="services">
        <h2>Qué hacemos</h2>
        <div class="services-container">
            <div class="service">
                <h3>Misión</h3>
                <p>Proporcionar experiencias de viaje memorables que superen las expectativas de nuestros clientes,
                    enfocándonos en la calidad, sostenibilidad y la personalización de cada tour.</p>
            </div>
            <div class="service">
                <h3>Visión</h3>
                <p>Ser reconocidos como líderes en el turismo sostenible y la creación de experiencias únicas,
                    expandiendo nuestros destinos a nivel global.</p>
            </div>
            <div class="service">
                <h3>Valores</h3>
                <p>Pasión por el servicio, compromiso con la sostenibilidad, innovación en cada recorrido y enfoque en
                    la satisfacción del cliente.</p>
            </div>
            <div class="service">
                <h3>Servicios</h3>
                <p>Ofrecemos tours personalizados, planificación de viajes grupales y paquetes turísticos especializados
                    para diferentes destinos.</p>
            </div>
        </div>
    </section>

   
</body>

@endsection
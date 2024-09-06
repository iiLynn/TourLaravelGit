@extends('welcome')

@section('content')
<style>
    .form-container {
        max-width: 600px;
        margin: 40px auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #f9f9f9;
    }

    .form-container h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-container .form-group {
        margin-bottom: 15px;
    }

    .form-container .form-control {
        border-radius: 5px;
    }

    .form-container .btn {
        width: 100%;
    }
</style>

<body>
    <div class="form-container">
        <h1>Agregar Nuevo Tour</h1>
        <form action="{{ route('tours.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 form-group">
                <label for="titulo" class="form-label">Título del Tour</label>
                <input type="text" name="titulo" class="form-control" placeholder="Título del tour" required>
            </div>
            <div class="mb-3 form-group">
                <label for="descripcion" class="form-label">Descripción del Tour</label>
                <textarea name="descripcion" class="form-control" placeholder="Descripción del tour" required></textarea>
            </div>
            <div class="mb-3 form-group">
                <label for="dia_inicio" class="form-label">Fecha de Inicio</label>
                <input type="date" name="dia_inicio" class="form-control" placeholder="Fecha de inicio" required>
            </div>
            <div class="mb-3 form-group">
                <label for="dia_fin" class="form-label">Fecha de Fin</label>
                <input type="date" name="dia_fin" class="form-control" placeholder="Fecha de fin" required>
            </div>
            <div class="mb-3 form-group">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" name="precio" class="form-control" placeholder="Precio" required>
            </div>
            <div class="mb-3 form-group">
                <label for="adultos" class="form-label">Adultos</label>
                <input type="number" name="adultos" class="form-control" placeholder="Numeros de personas" required>
            </div>
            <div class="mb-3 form-group">
                <label for="duracion" class="form-label">Duración (días)</label>
                <input type="number" name="duracion" class="form-control" placeholder="Duración en días" min="1" required>
            </div>
            <div class="mb-3 form-group">
                <label for="departamento" class="form-label">Departamento</label>
                <select name="departamento" id="departamento" class="form-select" required>
                    <option value="">Selecciona un departamento</option>
                    <!-- Opciones se llenan desde la base de datos -->
                    <option value="Usulutan">Usulutan</option>
                    <option value="San Miguel">San Miguel</option>
                    <!-- Agrega aquí más departamentos -->
                </select>
            </div>
            <div class="mb-3 form-group">
                <label for="lugar" class="form-label">Lugar</label>
                <input type="text" name="lugar" class="form-control" placeholder="Lugar de destino" required>
            </div>
            <div class="mb-3 form-group">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" name="imagen" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Subir Tour</button>
        </form>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</body>
@endsection

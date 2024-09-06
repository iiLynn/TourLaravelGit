<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function store(Request $request)
    {
        // Validar la solicitud
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'dia_inicio' => 'required|date',
            'dia_fin' => 'required|date',
            'lugar' => 'required|string',
            'duracion' => 'required|numeric',
            'departamento' => 'required|string',
            'precio' => 'required|numeric',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Manejar la carga de la imagen
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen')->store('uploads', 'public');
            $validatedData['imagen'] = $imagen;
        }

        // Crear un nuevo tour en la base de datos
        Tour::create($validatedData);

        return redirect()->back()->with('success', 'Tour creado con éxito!');
    }
 
    public function show($id)
    {  
        // Obtén el tour por su ID
        $tour = Tour::findOrFail($id);
       
        // Retorna la vista con los datos del tour
        return view('detalles', compact('tour'));
    }
    public function index()
    {
        $tours = Tour::all(); // Obtén todos los tours

        return view('inicio', compact('tours'));
      
    }
    public function index1()
    {
        $tours = Tour::all(); // Obtén todos los tours
      
        return view('paquetes', compact('tours')); // Pasa la variable a la vista 'paquetes'
    }
}

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
            'adultos' => 'required|numeric',
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
    public function index1(Request $request)
    {
        // Obtener los tours desde la sesión si hay resultados de búsqueda
        $tours = session('tours', Tour::all());
    
        // Limpiar la sesión después de obtener los resultados
        session()->forget('tours');
    
        return view('paquetes', compact('tours'));
    }
    
    
  // TourController.php
  public function search(Request $request)
  {
      $query = Tour::query();
  
      // Aplicar filtros
      if ($request->filled('departamento') && $request->departamento != 'all') {
          $query->where('departamento', $request->departamento);
      }
  
      if ($request->filled('fecha_salida')) {
          $query->whereDate('fecha_salida', $request->fecha_salida);
      }
  
      if ($request->filled('duracion') && $request->duracion != 'all') {
          $query->where('duracion', $request->duracion);
      }
  
      $tours = $query->get();
  
      // Almacenar los resultados en la sesión
      session(['tours' => $tours]);
  
      // Redirigir a la vista de paquetes
      return redirect()->route('paquetes');
  }
  
    
}

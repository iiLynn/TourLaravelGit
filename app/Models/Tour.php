<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'dia_inicio',
        'dia_fin',
        'precio',
        'duracion',   // Nuevo campo para duración
        'imagen',
        'adultos', 
        'departamento',
        'lugar'
    ];

    public static $rules = [
        'titulo' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'dia_inicio' => 'required|date',
        'dia_fin' => 'required|date',
        'precio' => 'required|numeric',
        'adultos' => 'required|numeric',
        'duracion' => 'required|numeric|min:1', // Validación para duración
        'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ];
}

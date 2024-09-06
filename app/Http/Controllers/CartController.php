<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $tour = Tour::find($id);
    
        if (!$tour) {
            return redirect()->route('paquetes')->with('error', 'Tour no encontrado.');
        }
    
        $quantity = $request->input('quantity', 1); // Obtener cantidad desde el formulario
    
        $cart = session()->get('cart', []);
    
        if (isset($cart[$id])) {
            // Si el tour ya está en el carrito, solo actualiza la cantidad
            $cart[$id]['quantity'] += $quantity;
        } else {
            // Si el tour no está en el carrito, agrégalo
            $cart[$id] = [
                'titulo' => $tour->titulo,
                'precio' => $tour->precio,
                'quantity' => $quantity,
                'imagen' => $tour->imagen,
            ];
        }
    
        session()->put('cart', $cart);
    
        return redirect()->route('carrito')->with('success', 'Tour agregado al carrito.');
    }
    


    public function removeFromCart($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Por favor, inicie sesión para eliminar del carrito.');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', '¡Tour eliminado del carrito!');
    }

    public function getCartCount()
    {
        $cart = session()->get('cart', []);
        $totalQuantity = 0;

        foreach ($cart as $item) {
            $totalQuantity += $item['quantity'];
        }

        return $totalQuantity;
    }
}

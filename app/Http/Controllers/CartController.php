<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Por favor, inicie sesión para agregar al carrito.');
        }

        $tour = Tour::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "titulo" => $tour->titulo,
                "quantity" => 1,
                "precio" => $tour->precio,
                "imagen" => $tour->imagen
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', '¡Tour agregado al carrito!');
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

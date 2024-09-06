<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function process(Request $request)
    {
        // Configuración de Stripe
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Crear un cargo
        try {
            $charge = Charge::create([
                'amount' => $request->input('amount') * 100, // Monto en centavos
                'currency' => 'usd',
                'description' => 'Compra en nuestro sitio',
                'source' => $request->input('stripeToken'),
            ]);

            // Procesar el éxito del pago (por ejemplo, guardar en la base de datos)
            return redirect()->route('checkout.success')->with('success', 'Pago realizado con éxito!');
        } catch (\Exception $e) {
            // Manejar errores
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
    }
    
}

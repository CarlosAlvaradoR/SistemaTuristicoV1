<?php

namespace App\Http\Controllers\PagosPublico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaquetesTuristicos;
use App\Models\Reservas;
use Illuminate\Support\Facades\DB;
use Auth;

class PaymentController extends Controller
{
    //
    public function pay(PaquetesTuristicos $slugPaquete, Request $request){
        $paquete = $slugPaquete; 
        $datos_reserva = $request;
        //$paquete = PaquetesTuristicos::find($idPaquete);
        //return $paquete;
        
        $apiContext = new \PayPal\Rest\ApiContext(
                new \PayPal\Auth\OAuthTokenCredential(
                    config('services.paypal.client_id'),     // ClientID
                    config('services.paypal.client_secret'),    // ClientSecret
                )
        );

        // After Step 2
        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new \PayPal\Api\Amount();
        $amount->setTotal($paquete->precio);
        $amount->setCurrency('USD');

        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount);

        $redirectUrls = new \PayPal\Api\RedirectUrls();
        $redirectUrls->setReturnUrl(route('payment.aproved', $paquete->id)) //URL CUANDO SE PROCESA EN VERDAD
            ->setCancelUrl(route('destinos'));

        $payment = new \PayPal\Api\Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);
        $reservas = Reservas::create([
                'fecha_reserva' => $request->fecha_reservacion, 
                'observacion' => $request->observacion_paquete, 
                'monto' => $paquete->precio_dolares, 
                'cliente_id' => Auth::user()->id, 
                'paquete_id' => $paquete->id
        ]);

        // After Step 3
        try {
            $payment->create($apiContext);
            //echo $payment;
            return redirect()->away($payment->getApprovalLink()); //away para rutas externas
        }
        catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo $ex->getData();
        }
        //return $paquete;
        
    }

    public function aproved(Request $request, $id){
        //return $request->all();
        $apiContext = new \PayPal\Rest\ApiContext(
                new \PayPal\Auth\OAuthTokenCredential(
                    config('services.paypal.client_id'),     // ClientID
                    config('services.paypal.client_secret'),    // ClientSecret
                )
        );

        $paymentId= $_GET['paymentId'];
        $payment = \PayPal\Api\Payment::get($paymentId, $apiContext);

        $execution = new \PayPal\Api\PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);

        $result = $payment->execute($execution, $apiContext);

        
        //Una vez pagada guardamos en la base de datos el pago y lo redirigimos a sus compras
        /*$guardar = DB::table('reservas')->insert(['monto_reserva' => 89, 
            'user_reserva' => 3
            ]
        );*/
        
         
        
        return redirect()->route('cliente.paquetes');
    }
}

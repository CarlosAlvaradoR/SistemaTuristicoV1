<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Config; // Añadir
use PayPal\Api\Amount;//AÑADIDOS
use PayPal\Api\Payer;//AÑADIDOS
use PayPal\Api\Payment;//AÑADIDOS
use PayPal\Api\RedirectUrls;//AÑADIDOS
use PayPal\Api\Transaction;//AÑADIDOS
use PayPal\Auth\OAuthTokenCredential; //Añadir
use PayPal\Api\PaymentExecution;
use PayPal\Api\ExecutePayment;
use PayPal\Rest\ApiContext; //Añadir

class PaymentController extends Controller
{
    //

    private $apiContext;

    public function __construct()
    {
        $payPalConfig = Config::get('paypal');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $payPalConfig['client_id'],
                $payPalConfig['secret']
            )
        );

       // $this->apiContext->setConfig($payPalConfig['settings']);
    }

    public function payWithPayPal()
    {
        //return "Pagando";   
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal('3.99');
        $amount->setCurrency('USD');

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        //$transaction->setDescription('See your IQ results');

        $callbackUrl = url('/paypal/status');

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($callbackUrl) //Sobre esto nos dice si ha pagado o no ha pagado
            ->setCancelUrl($callbackUrl); //Aquí nos dice si ha cancelado

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try { //Para crear pago
            $payment->create($this->apiContext);
            return redirect()->away($payment->getApprovalLink());
        } catch (PayPalConnectionException $ex) {
            echo $ex->getData();
        }catch (Exception $ex) {
            die($ex);
        }
    }

    public function payPalStatus(Request $request)
    {
        //return dd($request->all());
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
            return redirect('/paypal/failed')->with(compact('status'));
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);
        //dd($result);
        if ($result->getState() === 'approved') {
            /*$facultad = Facultades::create([
                'nombre' => 'facuNew',
                'slug' => 'facuNew'
            ]);*/
            $status = 'Gracias! El pago a través de PayPal se ha ralizado correctamente.';
            return redirect('/results')->with(compact('status'));
        }

        $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
        return redirect('/results')->with(compact('status'));
    }
}

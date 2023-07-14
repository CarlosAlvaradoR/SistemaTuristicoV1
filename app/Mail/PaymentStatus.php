<?php

namespace App\Mail;

use App\Models\ConfiguracionesGenerales;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentStatus extends Mailable
{
    use Queueable, SerializesModels;

    public $paymentStatus;
    public $user, $observacion, $mensaje;
    public $nombreEmpresa;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($paymentStatus, $user, $observacion, $mensaje)
    {
        //
        $this->paymentStatus = $paymentStatus;
        $this->user = $user;
        $this->observacion = $observacion;
        $this->mensaje = $mensaje;

        $name = ConfiguracionesGenerales::find(1, ['nombre_de_la_empresa']);
        $this->nombreEmpresa = $name->nombre_de_la_empresa ?? 'TRAVELO';
    }

    public function build()
    {
        return $this->view('emails.payment-status-text',[
                'user' => $this->user,
                'observacion' => $this->observacion,
                'mensaje' => $this->mensaje,
                'nombreEmpresa' => $this->nombreEmpresa
            ]
        )
            ->subject('Notificación de estado de pago');
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    // public function envelope()
    // {
    //     return new Envelope(
    //         subject: 'Payment Status',
    //     );
    // }

    // /**
    //  * Get the message content definition.
    //  *
    //  * @return \Illuminate\Mail\Mailables\Content
    //  */
    // public function content()
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    // /**
    //  * Get the attachments for the message.
    //  *
    //  * @return array
    //  */
    // public function attachments()
    // {
    //     return [];
    // }
}

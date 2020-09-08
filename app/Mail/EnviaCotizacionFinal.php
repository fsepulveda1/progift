<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use TCG\Voyager\Facades\Voyager;

class EnviaCotizacionFinal extends Mailable
{
    use Queueable, SerializesModels;

    public $cotizacion;

    /**
     * Create a new message instance.
     *
     */
    public function __construct($cotizacion)
    {
        $this->cotizacion = $cotizacion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('COTIZACIÓN PRO-GIFT - 12 AÑOS DE ARTÍCULOS PUBLICITARIOS EN CHILE')
            ->from(config('mail.from')['address'],config('mail.from')['name'])
            ->cc(Voyager::setting('admin.email_cotizaciones', ''))
            ->view('mails.envia_cotizacion_final');
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviaCotizacionFinal extends Mailable
{
    use Queueable, SerializesModels;

    public $cotizacion;

    public $from;

    /**
     * Create a new message instance.
     *
     */
    public function __construct($cotizacion,$from)
    {
        $this->cotizacion = $cotizacion;
        $this->from = $from;
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
            ->from($this->from['address'],$this->from['name'])
            ->replyTo($this->from['address'],$this->from['name'])
            ->view('mails.envia_cotizacion_final');
    }
}

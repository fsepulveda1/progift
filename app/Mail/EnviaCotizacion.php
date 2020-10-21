<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use TCG\Voyager\Facades\Voyager;

class EnviaCotizacion extends Mailable
{
    use Queueable, SerializesModels;

    public $cotizacion;

    public $from;

    /**
     * Create a new message instance.
     *
     */
    public function __construct($cotizacion, $from)
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
        return $this->from($this->from['address'],$this->from['name'])
            ->replyTo($this->from['address'],$this->from['name'])
            ->subject('SOLICITUD DE COTIZACIÓN RECIBIDA - PRO-GIFT - 12 AÑOS DE ARTÍCULOS PUBLICITARIOS EN CHILE')
            ->view('mails.envia_cotizacion');
    }
}

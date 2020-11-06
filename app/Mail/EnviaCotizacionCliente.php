<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use TCG\Voyager\Facades\Voyager;


class EnviaCotizacionCliente extends Mailable
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
        $this->from = $from;
        $this->cotizacion = $cotizacion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from')['address'],config('mail.from')['name'])
            ->replyTo($this->from['address'],$this->from['name'])
            ->subject('NUEVA COTIZACIÓN '.date('Y'))
            ->cc(Voyager::setting('admin.email_cotizaciones', ''))
            ->view('mails.envia_cotizacion_cliente');
    }
}

@extends('mails.layout')

@section('content')
    <h4 style="font-family: 'Roboto', sans-serif;font-size: 16pt; color: #393939;">Estimado (a) {{$cotizacion['nombre']}}</h4>
    <p style="font-family: 'Roboto', sans-serif;font-size: 12pt">Gracias por cotizar con nosotros, hemos adjuntado su cotización.</p>
@endsection
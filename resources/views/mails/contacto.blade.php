@extends('mails.layout')

@section('content')
    <h4 style="font-family: 'Roboto', sans-serif;font-size: 16pt; color: #393939;">Estimado (a) {{$cotizacion['nombre']}};</h4>
    <p style="font-family: 'Roboto', sans-serif;font-size: 12pt">
        Junto con saludar, se adjunta Cotización solicitada.<br>
        Quedamos atentos a sus comentarios,<br>
        Muchas gracias,<br>
        Saludos,
    </p>
    <p style="font-family: 'Roboto', sans-serif;font-weight: bold; font-size: 12pt;">
        {{ $cotizacion['vendedor']->name }}<br>
        {{ $cotizacion['vendedor']->phone }}<br>
        {{ $cotizacion['vendedor']->email }}
    </p>
@endsection
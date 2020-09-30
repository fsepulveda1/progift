@extends('mails.layout')

@section('content')
    <h4 style="font-family: 'Roboto', sans-serif;font-size: 16pt;">Estimado(a) {{$cotizacion['nombre']}};</h4>
    <p style="font-family: 'Roboto', sans-serif;font-size: 12pt">
        Junto con saludar, se adjunta Cotización solicitada.<br>
        Quedamos atentos a sus comentarios,<br><br>
        Muchas gracias,<br>
        Saludos,
    </p>
    <p style="font-family: 'Roboto', sans-serif;font-weight: bold; font-size: 12pt;">
        {{ $cotizacion['vendedor']->name }}<br>
        {{ $cotizacion['vendedor']->phone }}<br>
        <a href="mailto: {{ $cotizacion['vendedor']->email }}" style="color: #0066cc">{{ $cotizacion['vendedor']->email }}</a>
    </p>
@endsection
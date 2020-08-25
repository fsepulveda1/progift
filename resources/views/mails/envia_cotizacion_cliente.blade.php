@extends('mails.layout')

@section('content')
    <p style="font-family: 'Roboto', sans-serif;font-size: 13pt; margin-bottom: 2rem">
        <strong>Empresa:</strong> {{$cotizacion['cliente']['nombre']}}<br/>
        <strong>Rut Empresa:</strong> {{$cotizacion['cliente']['rut']}}<br/>
        <strong>Contacto:</strong> {{$cotizacion['cliente']['contacto']}}<br/>
        <strong>E-Mail:</strong> {{$cotizacion['cliente']['email']}}<br/>
        <strong>Teléfono:</strong> {{$cotizacion['cliente']['telefono']}}<br/>
        <strong>Comentarios:</strong> {{$cotizacion['cliente']['comentarios']}}<br/>
    </p>

    <table width="100%" class="table" style="font-family: 'Roboto', sans-serif;margin-bottom: 1rem" border="1" cellpadding="0" cellspacing="0">
        <tr>
            <th width="20%" align="center">PRODUCTO</th>
            <th width="20%" align="center">IMAGEN</th>
            <th width="20%" align="center">COLOR</th>
            <th width="20%" align="center">CANTIDAD</th>
            <th width="20%" align="center">IMPRESION</th>
        </tr>
        @foreach ($cotizacion['detalle'] as $det)

            <tr>
                <td width="20%" align="left">
                    {{ $det['nombre'] }}<br/>
                    {{ $det['sku'] }}
                </td>
                <td width="20%" align="center">
                    <img src="{{ asset(stripcslashes($det['imagen'])) }}" height="70px" style="height: 70px;"/>
                </td>
                <td width="20%" align="center">
                    {{ $det['color'] }}
                </td>
                <td width="20%" align="center">
                    {{ $det['cantidad'] }}
                </td>
                <td width="20%" align="center">
                    {{ $det['imprenta'] }}
                </td>
            </tr>
        @endforeach
    </table>

    <p style="font-family: 'Roboto', sans-serif;font-size: 12pt;">Este e-mail es sólo un aviso, la solicitud ya se encuentra disponible en el Cotizador para ser completada y enviada al Cliente. </p>
@endsection
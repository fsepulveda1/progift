@extends('mails.layout')

@section('content')
    <h4 style="font-family: 'Roboto', sans-serif;font-size: 16pt;">Estimado(a) {{$cotizacion['nombre']}}</h4>
    <p style="font-family: 'Roboto', sans-serif;font-size: 12pt">Gracias por cotizar con nosotros, hemos recibido su solicitud con el siguiente detalle:</p>

    <table width="100%" class="table" style="font-family: 'Roboto', sans-serif;margin-bottom: 1rem" border="1" cellpadding="0" cellspacing="0">
        <tr>
            <th width="20%" align="center">PRODUCTO</th>
            <th width="20%" align="center">IMAGEN</th>
            <th width="20%" align="center">COLOR</th>
            <th width="20%" align="center">CANTIDAD</th>
            <th width="20%" align="center">IMPRESION</th>
        </tr>
        @if(!empty($cotizacion['detalle']))
            @foreach ($cotizacion['detalle'] as $det)
                <tr>
                    <td width="20%" align="left">
                        &nbsp;{{ $det['nombre'] }}<br/>
                        &nbsp;{{ $det['sku'] }}
                    </td>
                    <td width="20%" align="center">
                        <img src="{{ asset(stripcslashes($det['imagen'])) }}" height="100px" style="height: 100px;"/>
                    </td>
                    <td width="20%" align="center">
                        {{ $det['color'] }}
                    </td>
                    <td width="20%" align="center">
                        @if(is_array($det['cantidad']))
                            {{ $det['cantidad'][0] }}
                        @else
                            {{ $det['cantidad'] }}
                        @endif
                    </td>
                    <td width="20%" align="center">
                        {{ $det['imprenta'] }}
                    </td>
                </tr>
            @endforeach
        @endif
    </table>

    <p style="font-family: 'Roboto', sans-serif;font-size: 14pt;">Ante cualquier duda o consulta puede contactar al siguiente Ejecutivo(a) que recibió su solicitud. </p>
    <p style="font-family: 'Roboto', sans-serif;font-weight: bold; font-size: 12pt;">
        {{ $cotizacion['vendedor']->name }}<br>
        {{ $cotizacion['vendedor']->phone }}<br>
        <a href="mailto: {{ $cotizacion['vendedor']->email }}" style="color: #0066cc">{{ $cotizacion['vendedor']->email }}</a>
    </p>
@endsection
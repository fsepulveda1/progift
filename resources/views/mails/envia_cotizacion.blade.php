@extends('mails.layout')

@section('content')
    <h4 style="font-size: 16pt; color: #393939;">Estimado (a) {{$cotizacion['nombre']}}</h4>
    <p style="font-size: 12pt">Gracias por cotizar con nosotros, hemos recibido su solicitud con el siguiente detalle:</p>

    <table width="100%" class="table" style="margin-bottom: 1rem" border="1" cellpadding="0" cellspacing="0">
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
                    &nbsp;{{ $det['nombre'] }}<br/>
                    &nbsp;{{ $det['sku'] }}
                </td>
                <td width="20%" align="center">
                    <img src="{{ asset($det['imagen']) }}" style="height: 50px;"/>
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
    </table>

    <p style="font-size: 14pt;">Ante cualquier duda o consulta puede contactar al siguiente Ejecutivo(a) que recibió su solicitud. </p>
    <p style="font-weight: bold; font-size: 12pt;">
        {{ $cotizacion['vendedor']->name }}<br>
        {{ $cotizacion['vendedor']->phone }}<br>
        {{ $cotizacion['vendedor']->email }}
    </p>
@endsection
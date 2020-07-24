Estimado <i>{{$cotizacion['nombre']}}</i>,
<p>Hemos recibido satisfactoriamente su solicitud de cotización, en el transcurso del dia le enviaremos los valores a su e-mail.</p>
 

<table width="100%" style="width: 100%;border-spacing: 0px;">
    <tr>
        <td width="20%" style="border: 1px solid #ffd600;" align="center">PRODUCTO</td>
        <td width="20%" style="border: 1px solid #ffd600;" align="center">IMAGEN</td>
        <td width="20%" style="border: 1px solid #ffd600;" align="center">COLOR</td>
        <td width="20%" style="border: 1px solid #ffd600;" align="center">CANTIDAD</td>
        <td width="20%" style="border: 1px solid #ffd600;" align="center">IMPRESION</td>
    </tr>
    <?php
    $contador = 0;
    ?>
    @foreach ($cotizacion['detalle'] as $det)
        <?php
        $contador++;
        ?>
        <tr>
            <td width="20%" style="border: 1px solid #ffd600;" align="left">
                &nbsp;{{ $det['nombre'] }}<br/>
                &nbsp;{{ $det['sku'] }}
            </td>
            <td width="20%" style="border: 1px solid #ffd600;" align="center">
                <img src="{{ $det['imagen'] }}" style="height: 50px;"/>
            </td>
            <td width="20%" style="border: 1px solid #ffd600;" align="center">
                {{ $det['color'] }}
            </td>
            <td width="20%" style="border: 1px solid #ffd600;" align="center">
               
            </td>
            <td width="20%" style="border: 1px solid #ffd600;" align="center">
                {{ $det['imprenta'] }}
            </td>
        </tr>
    @endforeach
    <tr>
        <td width="100%" colspan="5" style="border: 1px solid #ffd600;" align="left">
            &nbsp;Total de articulos: {{$contador}} (* Valores no incluyen IVA)
        </td>
    </tr>
</table>
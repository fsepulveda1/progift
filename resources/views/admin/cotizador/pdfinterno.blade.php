<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/strict.dtd">
<html>
<head>
    <style>
        .table{
            border-color: yellow;
            width: 100%;
        }
        .table th,
        .table td {
            border: 1px yellow solid;
            padding: 10px;
        }
    </style>
</head>
<body>
<div style="padding: 0; text-align: left">
    <img src="{{ asset('assets/images/logo_pdf.png') }}" width="150px"/>
    <h1 style="text-align: center; padding: 1rem; margin-bottom: 2rem">COTIZACIÓN Nº XXXX</h1>
    <table width="100%" style="margin: 2rem 0">
        <tr>
            <th align="left" style="font-weight: bold">
                {{$data['empresa']}}<br>
                {{$data['nombre']}}<br>
                Presente
            </th>
            <th align="right">
                {{ date('d-m-Y') }}
            </th>
        </tr>
    </table>

    <table class="table" border="1" cellpadding="0" cellspacing="0">
        <tr>
            <th>DESCRIPCIÓN</th>
            <th>IMAGEN</th>
            <th>CANTIDAD</th>
            <th>VALOR UNITARIO</th>
            <th>TOTAL (SIN IVA)</th>
        </tr>
        @foreach ($data['detalle'] as $det)
            <tr>
                <td>{{$det['nombre']}}</td>
                <td><img src="{{ asset($det['imagen'])}}" width="100px"></td>
                <!-- TODO MEJORAR EL FORMATEO DE DATOS PARA EVITAR ESTO -->
                <td>{{$det['cantidad'][0]}}</td>
                <td>{{$det['precio'][0]}}</td>
                <td>{{$det['suma'][0]}}</td>
            </tr>
        @endforeach
    </table>
</div>

{{--<tr>--}}
{{--<td width="60%">--}}
{{--<table style="background-color: #ffffff;">--}}
{{--<tr style="border-bottom: 1px solid #000000;background-color: #f8f8f8;">--}}
{{--<td colspan="2">--}}
{{--<span style="margin-bottom: 7px;">Datos del cliente</span>--}}
{{--</td>--}}
{{--</tr>--}}
{{--<tr style="background-color: #ffffff;">--}}
{{--<td width="40%">--}}
{{--<span>--}}
{{--Nombre:--}}
{{--</span>--}}
{{--</td>--}}
{{--<td width="60%">--}}
{{--<span>--}}
{{--{{$data['nombre']}}--}}
{{--</span>--}}
{{--</td>--}}
{{--</tr>--}}
{{--<tr style="background-color: #ffffff;">--}}
{{--<td width="40%">--}}
{{--<span>--}}
{{--Email:--}}
{{--</span>--}}
{{--</td>--}}
{{--<td width="60%">--}}
{{--<span>--}}
{{--{{$data['email']}}--}}
{{--</span>--}}
{{--</td>--}}
{{--</tr>--}}
{{--<tr style="background-color: #ffffff;">--}}
{{--<td width="40%">--}}
{{--<span>--}}
{{--Empresa:--}}
{{--</span>--}}
{{--</td>--}}
{{--<td width="60%">--}}
{{--<span>--}}
{{--{{$data['empresa']}}--}}
{{--</span>--}}
{{--</td>--}}
{{--</tr>--}}
{{--<tr style="background-color: #ffffff;">--}}
{{--<td width="40%">--}}
{{--<span>--}}
{{--Forma de pago:--}}
{{--</span>--}}
{{--</td>--}}
{{--<td width="60%">--}}
{{--<span>--}}
{{--{{$data['forma_pago']}}--}}
{{--</span>--}}
{{--</td>--}}
{{--</tr>--}}
{{--<tr style="background-color: #ffffff;">--}}
{{--<td width="40%">--}}
{{--<span>--}}
{{--Validez:--}}
{{--</span>--}}
{{--</td>--}}
{{--<td width="60%">--}}
{{--<span>--}}
{{--{{$data['validez']}}--}}
{{--</span>--}}
{{--</td>--}}
{{--</tr>--}}
{{--<tr style="background-color: #ffffff;">--}}
{{--<td width="40%">--}}
{{--<span>--}}
{{--Entrega:--}}
{{--</span>--}}
{{--</td>--}}
{{--<td width="60%">--}}
{{--<span>--}}
{{--{{$data['entrega']}}--}}
{{--</span>--}}
{{--</td>--}}
{{--</tr>--}}
{{--<tr style="background-color: #ffffff;">--}}
{{--<td width="40%">--}}
{{--<span>--}}
{{--Tipo de cotización:--}}
{{--</span>--}}
{{--</td>--}}
{{--<td width="60%">--}}
{{--<span>--}}
{{--{{$data['tipo']}}--}}
{{--</span>--}}
{{--</td>--}}
{{--</tr>--}}
{{--</table>--}}
{{--</td>--}}
{{--<td width="40%" style="background-color: #ffffff;">--}}

{{--</td>--}}
{{--</tr>--}}
{{--<tr>--}}
{{--<td colspan="6">--}}

{{--</td>--}}
{{--</tr>--}}
{{--<tr style="border-bottom: 1px solid #000000;background-color: #f8f8f8;">--}}
{{--<td width="20%" align="center">--}}
{{--Producto--}}
{{--</td>--}}
{{--<td width="10%" align="center">--}}
{{--SKU--}}
{{--</td>--}}
{{--<td width="20%" align="center">--}}
{{--Foto--}}
{{--</td>--}}
{{--<td width="10%" align="center">--}}
{{--Color--}}
{{--</td>--}}
{{--<td width="10%" align="center">--}}
{{--Imp.--}}
{{--</td>--}}
{{--<td width="10%" align="center">--}}
{{--Cant.--}}
{{--</td>--}}
{{--<td width="10%" align="center">--}}
{{--Precio--}}
{{--</td>--}}
{{--<td width="10%" align="center">--}}
{{--IVA--}}
{{--</td>--}}
{{--</tr>--}}
{{--@foreach ($data['detalle'] as $det)--}}
{{--<tr style="background-color: #ffffff;">--}}
{{--<td width="20%" align="center">--}}
{{--{{ $det['nombre'] }}--}}
{{--</td>--}}
{{--<td width="10%" align="center">--}}
{{--{{ $det['sku'] }}--}}
{{--</td>--}}
{{--<td width="20%" align="center">--}}
{{--<img src="{{ $det['imagen'] }}"/>--}}
{{--</td>--}}
{{--<td width="10%" align="center">--}}
{{--{{ $det['color'] }}--}}
{{--</td>--}}
{{--<td width="10%" align="center">--}}
{{--{{ $det['imprenta'] }}--}}
{{--</td>--}}
{{--<td width="10%" align="center">--}}
{{--{{ $det['cantidad'][0] }}--}}
{{--</td>--}}
{{--<td width="10%" align="center">--}}
{{--${{ number_format($det['precio'][0], 0, ',', '.') }}--}}
{{--</td>--}}
{{--<td width="10%" align="center">--}}
{{--${{ number_format($det['suma'][0], 0, ',', '.') }}--}}
{{--</td>--}}
{{--</tr>--}}
{{--<?php--}}
{{--if (empty($det['cantidad'])){--}}
{{--?>--}}
{{--@foreach ($det['cantidad'] as $key => $d)--}}
{{--@if($key == 0)--}}

{{--@else--}}
{{--<tr>--}}
{{--<td colspan="3"></td>--}}
{{--<td width="10%" align="center">--}}
{{--{{ $det['cantidad'][$key] }}--}}
{{--</td>--}}
{{--<td width="20%" align="center">--}}
{{--${{ number_format($det['precio'][$key], 0, ',', '.') }}--}}
{{--</td>--}}
{{--<td width="10%" align="center">--}}
{{--${{ number_format($det['suma'][$key], 0, ',', '.') }}--}}
{{--</td>--}}
{{--</tr>--}}
{{--@endif--}}
{{--@endforeach--}}
{{--<?php--}}
{{--}--}}
{{--?>--}}
{{--@endforeach--}}
{{--<tr>--}}
{{--<td colspan="6">--}}

{{--</td>--}}
{{--</tr>--}}
{{--<tr>--}}
{{--<td colspan="6">--}}

{{--</td>--}}
{{--</tr>--}}
{{--<tr>--}}
{{--<td width="50%">--}}

{{--</td>--}}
{{--<td width="50%">--}}
{{--<table style="background-color: #ffffff;">--}}
{{--<tr style="background-color: #ffffff;">--}}
{{--<td width="40%">--}}
{{--<span>--}}
{{--Productos:--}}
{{--</span>--}}
{{--</td>--}}
{{--<td width="60%">--}}
{{--<span>--}}
{{--${{number_format($data['total'], 0, ',', '.')}}--}}
{{--</span>--}}
{{--</td>--}}
{{--</tr>--}}
{{--@if ($data['activa_descuento'])--}}
{{--<tr style="background-color: #ffffff;">--}}
{{--<td width="40%">--}}
{{--<span>--}}
{{--Descuento:--}}
{{--</span>--}}
{{--</td>--}}
{{--<td width="60%">--}}
{{--<span>--}}
{{--{{number_format($data['descuento'], 0, ',', '.')}}--}}
{{--</span>--}}
{{--</td>--}}
{{--</tr>--}}
{{--@endif--}}
{{--@if ($data['activa_total'])--}}
{{--<tr style="background-color: #ffffff;">--}}
{{--<td width="40%">--}}
{{--<span>--}}
{{--Neto:--}}
{{--</span>--}}
{{--</td>--}}
{{--<td width="60%">--}}
{{--<span>--}}
{{--${{number_format($data['neto'], 0, ',', '.')}}--}}
{{--</span>--}}
{{--</td>--}}
{{--</tr>--}}
{{--<tr style="background-color: #ffffff;">--}}
{{--<td width="40%">--}}
{{--<span>--}}
{{--IVA:--}}
{{--</span>--}}
{{--</td>--}}
{{--<td width="60%">--}}
{{--<span>--}}
{{--${{number_format($data['iva'], 0, ',', '.')}}--}}
{{--</span>--}}
{{--</td>--}}
{{--</tr>--}}
{{--<tr style="background-color: #ffffff;">--}}
{{--<td width="40%">--}}
{{--<span>--}}
{{--Total:--}}
{{--</span>--}}
{{--</td>--}}
{{--<td width="60%">--}}
{{--<span>--}}
{{--${{number_format($data['total'], 0, ',', '.')}}--}}
{{--</span>--}}
{{--</td>--}}
{{--</tr>--}}
{{--@endif--}}

{{--</table>--}}
{{--</td>--}}
{{--</tr>--}}


</body>
</html>

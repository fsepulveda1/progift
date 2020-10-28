<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/strict.dtd">
<html>
<head>
    <title>Pro-gift | Cotización PDF</title>
    <style>
        @font-face {
            font-family: 'Roboto';
            src: url({{ asset('assets/fonts/Roboto/Roboto-Regular.ttf') }}) format("truetype");
            font-weight: 400;
            font-style: normal;
        }
        @font-face {
            font-family: 'Roboto';
            src: url({{ asset('assets/fonts/Roboto/Roboto-Bold.ttf') }}) format("truetype");
            font-weight: bold;
            font-style: normal;
        }
        @page {
            margin: 0cm 0cm;
            font-family: 'Roboto', sans-serif;
        }
        tbody div {
            page-break-inside: avoid;
        }

        body {
            padding: 2.5cm .5cm 2.35cm;
        }

        .table{
            border-color: #F5C524;
        }
        .w-100 {
            width: 100%;
            max-width: 100%;
        }
        .mt-1 {  margin-top: 1rem;  }
        .mt-3 {  margin-top: 3rem;  }
        .table th,
        .table td {
            border: 1px #F5C524 solid;
            padding: 5px;
            font-size: 9pt;
        }

        header {
            text-align: left;
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2.5cm;
            padding: .5cm .5cm .25cm;
        }
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 1.75cm;
            padding: .25cm .5cm;
            background-color: #F5C524;
        }
    </style>
</head>
<body>
<header>
    <img src="{{ asset('assets/images/logo_pdf.png') }}" width="170px"/>
</header>
<footer>
    <table class="w-100" style="font-size: 10pt">
        <tr>
            <th width="30%" align="left" valign="top" style="line-height: .75rem">
                Vendedor(a)<br>
                {{ $user->name }}<br>
                {{ $user->phone }}<br>
                {{ $user->email }}<br>
            </th>
            <th width="40%" align="center" valign="top"  style="line-height: .75rem">
                Pro-Gift Ltda<br>
                Rut: 76.029.873-5<br>
                Av. Rosario Sur 135 Piso 4, Las Condes<br>
                Giro: Servicios Publicitarios<br>
            </th>
            <th width="30%" align="right" valign="top"  style="line-height: .75rem">
                Datos Bancarios:<br>
                Banco: BCI<br>
                Cuenta Cte: Nº 45791163<br>
                {{ "cobranza@pro-gift.cl" }}
            </th>
        </tr>
    </table>
</footer>
<main style="padding: 0; margin: 0">
    <h5 style="text-align: center; margin-bottom: 1rem; margin-top: 0; font-size: 10pt">COTIZACIÓN Nº @if(isset($data['number'])){{$data['number']}}@else XXXXX @endif</h5>
    <table class="w-100" style="margin: 1rem 0; font-size: 10pt">
        <tr>
            <th align="left" valign="top" style="font-weight: bold; line-height: .75rem">
                {{ $client->contacto }}<br>
                {{ $client->nombre }}<br>
                Presente
            </th>
            <th align="right" valign="top">
                {{ date('d/m/Y') }}
            </th>
        </tr>
    </table>

    <table class="table w-100" border="1" cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th width="40%">DESCRIPCIÓN</th>
            <th width="25%">IMAGEN</th>
            <th width="10%">CANTIDAD</th>
            <th width="10%">VALOR UNITARIO</th>
            <th width="15%">TOTAL<br> (SIN IVA)</th>
        </tr>
        </thead>
        @foreach (json_decode($data['detalle']) as $det)

            @php
                $qty_rows = is_array($det->cantidad) ? count($det->cantidad) : 0;
            @endphp
            <tbody class="page-break-avoid">
            <tr>
                <td valign="top" @if($qty_rows)rowspan="{{$qty_rows}}"@endif >
                    <div>
                        {{ $det->nombre }}@if(isset($det->sku)){{ " - Cód: ".$det->sku}}@endif<br>
                        {!! $det->descripcion !!}<br>
                        @if(!empty($det->color))Color: {{ $det->color }}<br>@endif
                        Impresión :{{ $det->imprenta }}<br>
                    </div>
                </td>
                <td align="center" valign="middle" rowspan="{{$qty_rows}}">
                    <div>
                        <img src="{{ asset(stripcslashes($det->imagen))}}" style="max-width: 120px; max-height: 150px">
                    </div>
                </td>
                <td align="center" >@if(isset($det->cantidad[0])){{$det->cantidad[0]}}@endif</td>
                <td align="center" >@if(isset($det->precio[0]))${{number_format($det->precio[0], 0, ',', '.')}}@endif</td>
                <td align="center" >@if(isset($det->suma[0]))${{number_format($det->suma[0], 0, ',', '.')}}@endif</td>
            </tr>
            @if($qty_rows)
                @for($x = 1; $x < $qty_rows; $x++)
                    <tr>
                        <td align="center">{{$det->cantidad[$x]}}</td>
                        <td align="center">${{number_format($det->precio[$x], 0, ',', '.')}}</td>
                        <td align="center">${{number_format($det->suma[$x], 0, ',', '.')}}</td>
                    </tr>
                @endfor
            @endif
            </tbody>
        @endforeach
    </table>
    <table class="w-100" border="0" cellpadding="0" cellspacing="0">
        <tr style="padding: 0; margin: 0" >
            <td align="left" valign="top" width="75%" style="padding-top:1rem;font-size: 10pt">
                <div><strong>+ Los valores detallados no incluyen IVA</strong></div>
                <div class="mt-1"><strong>Forma de pago:</strong> {{$data['forma_pago']}}</div>
                <div><strong>Plazo de entrega:</strong> {{$data['entrega']}}</div>
                <div><strong>Validéz de la cotización:</strong> {{$data['validez']}}</div>
                <div class="mt-1">
                    <strong>A la espera de una buena acogida,
                        <br>Le saluda atentamente
                    </strong>
                </div>
            </td>
            <td width="25%" align="right" valign="top" style="padding: 0; margin: 0">
                @if($data['activa_descuento'])
                    <table class="table w-100" style="margin-top: .5rem" border="1" cellpadding="0" cellspacing="0">
                        <tr>
                            <th width="40%">Descuento</th>
                            <td>{{ $data['descuento'] }}%</td>
                        </tr>
                    </table>
                @endif

                @if($data['activa_total'])
                    <table class="table w-100" border="1" cellpadding="0" cellspacing="0" style="margin-top: .5rem">
                        <tr>
                            <th width="40%" align="right">NETO</th>
                            <td>${{ number_format($data['neto'], 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th align="right">IVA</th>
                            <td>${{ number_format($data['iva'], 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th align="right">TOTAL</th>
                            <td>${{ number_format($data['total'], 0, ',', '.') }}</td>
                        </tr>
                    </table>
                @endif
            </td>
        </tr>
    </table>
</main>
</body>
</html>

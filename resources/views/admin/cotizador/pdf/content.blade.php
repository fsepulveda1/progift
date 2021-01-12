<html>
<head>
    <title>Pro-gift | Cotización PDF</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        @page {
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }

        html {
            margin: 0;
            padding: 0;
        }

        tbody div {
            page-break-inside: avoid !important;
        }
        tbody {
            page-break-inside: avoid !important;
        }

        html {
            font-size: 16px;
        }

        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
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
            border-bottom: 1px #F5C524 solid;
            border-left: 1px #F5C524 solid;
            padding: 10px 7px;
        }
        .inside-table {
            height: 100%;
            max-height: 100%;
            overflow: hidden;
            background-color: #f1f1f1;
        }
        .inside-table tr td {
            max-height: 100%;
        }
        .inside-table tr:last-child td {
            border-bottom: 0;
        }
        .table td {
            font-weight: normal;
            font-size: 16px;
        }
        td {
            line-height: 20px;
        }
        th {
            font-family: 'Roboto-bold', sans-serif;
            font-weight: 700;
            font-size: 16px;
        }
        .table th:last-child,
        .table td:last-child {
            border-right: 1px #F5C524 solid;
        }
        .table tr:first-child td,
        .table tr:first-child th {
            border-top: 1px #F5C524 solid;
        }

        table tbody {
            page-break-after: auto !important;
        }
    </style>
</head>
<body>
<div style="padding:0 .55cm">
    <h5 style="text-align: center; margin-bottom: 1rem; margin-top: 0; font-size: 18px; font-weight: bold;  font-family: 'Roboto-Bold', sans-serif;">COTIZACIÓN Nº @if(isset($data['number'])){{$data['number']}}@else XXXXX @endif</h5>
    <table class="w-100" style="margin: 1rem 0; font-size: 18px">
        <tr>
            <th align="left" valign="top" style="font-weight: bold; font-family: 'Roboto-Bold', sans-serif; line-height: 1.2rem">
                {{ $client->contacto }}<br>
                {{ $client->nombre }}<br>
                Presente
            </th>
            <th align="right" valign="top">
                {{ date('d/m/Y') }}
            </th>
        </tr>
    </table>
    <table class="table w-100" border="0" style="height: 100px; font-size: 14px" cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th width="40%" >DESCRIPCIÓN</th>
            <th width="25%">IMAGEN</th>
            <th width="10%">CANTIDAD</th>
            <th width="10%" style="line-height: 22px">VALOR UNITARIO</th>
            <th width="15%" style="line-height: 22px">TOTAL<br> (SIN IVA)</th>
        </tr>
        </thead>
        @foreach (json_decode($data['detalle']) as $det)
            @php
                $qty_rows = is_array($det->cantidad) ? count($det->cantidad) : 0;
            @endphp
            <tr>
                <td valign="top">
                    <div>
                        {{ $det->nombre }}@if(isset($det->sku)){{ " - Cód: ".$det->sku}}@endif<br>
                        {!! nl2br(e($det->descripcion)) !!}<br>
                        @if(!empty($det->color))Color: {{ $det->color }}<br>@endif
                        Impresión :{{ $det->imprenta }}<br>
                    </div>
                </td>
                <td align="center" valign="middle">
                    <div>
                        <img src="{{ asset(stripcslashes($det->imagen))}}" style="max-width: 140px; max-height: 170px">
                    </div>
                </td>
                <td align="center" style="padding: 0;overflow: hidden;">
                    @if($qty_rows)
                        <table class="w-100 inside-table" border="0" cellpadding="0" cellspacing="0">
                            @for($x = 0; $x <= $qty_rows; $x++)
                                @if(isset($det->cantidad[$x]))
                                    <tr>
                                        <td valign="middle" align="center" style="border-top:none; border-left: 0; border-right: 0">
                                            {{ $det->cantidad[$x] }}
                                        </td>
                                    </tr>
                                @endif
                            @endfor
                        </table>
                    @endif
                </td>
                <td align="center" style="padding: 0;overflow: hidden;">
                    @if($qty_rows)
                        <table class="w-100 inside-table" border="0" cellpadding="0" cellspacing="0">
                            @for($x = 0; $x <= $qty_rows; $x++)
                                @if(isset($det->precio[$x]))
                                    <tr>
                                        <td valign="middle" align="center" style="border-top:none; border-left: 0; border-right: 0">
                                            ${{number_format($det->precio[$x], 0, ',', '.')}}
                                        </td>
                                    </tr>
                                @endif
                            @endfor
                        </table>
                    @endif
                </td>
                <td align="center" style="padding: 0;overflow: hidden;">
                    @if($qty_rows)
                        <table class="w-100 inside-table" border="0" cellpadding="0" cellspacing="0">
                            @for($x = 0; $x <= $qty_rows; $x++)
                                @if(isset($det->suma[$x]))
                                    <tr>
                                        <td  valign="middle" align="center" style="border-top:none; border-left: 0; border-right: 0">
                                            ${{number_format($det->suma[$x], 0, ',', '.')}}
                                        </td>
                                    </tr>
                                @endif
                            @endfor
                        </table>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
    <table class="w-100" border="0" cellpadding="0" cellspacing="0">
        <tr style="padding: 0; margin: 0" >
            <td align="left" valign="top" width="75%" style="padding-top:1rem;font-size: 17px; line-height: 24px">
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
                    <table class="table w-100" border="0" cellpadding="0" cellspacing="0" style="margin-top: .5rem">
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
</div>

</body>
</html>

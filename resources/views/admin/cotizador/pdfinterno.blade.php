<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/strict.dtd">
<html>
<head>
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

        body {
            padding: 2.5cm .5cm 2.5cm;
        }

        .table{
            border-color: #F5C524;
        }
        .w-100 {
            width: 100%;
        }
        .mt-1 {  margin-top: 1rem;  }
        .mt-3 {  margin-top: 3rem;  }
        .table th,
        .table td {
            border: 1px #F5C524 solid;
            padding: 5px 10px;
            font-size: 9pt;
        }

        header {
            text-align: left;
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            padding: .5cm;
        }
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2.5cm;
            padding: .5cm;
            background-color: #F5C524;
        }
    </style>
</head>
<body>
<header>
    <img src="{{ asset('assets/images/logo_pdf.png') }}" width="150px"/>
</header>
<main>
    <h5 style="text-align: center; padding: 1rem; margin-bottom: 2rem; font-size: 10pt">COTIZACIÓN Nº XXXX</h5>
    <table class="w-100" style="margin: 2rem 0; font-size: 10pt">
        <tr>
            <th align="left" valign="top" style="font-weight: bold">
                {{$data['nombre']}}<br>
                {{$data['empresa']}}<br>
                Presente
            </th>
            <th align="right" valign="top">
                {{ date('d/m/Y') }}
            </th>
        </tr>
    </table>

    <table class="table w-100" border="1" cellpadding="0" cellspacing="0">
        <tr>
            <th width="40%">DESCRIPCIÓN</th>
            <th width="25%">IMAGEN</th>
            <th width="10%">CANTIDAD</th>
            <th width="10%">VALOR UNITARIO</th>
            <th width="15%">TOTAL<br> (SIN IVA)</th>
        </tr>
        @foreach ($data['detalle'] as $det)
            <tr>
                <td valign="top">
                    {{$det['nombre']}}<br>
                    {{$det['descripcion']}}
                </td>
                <td align="center" valign="top"><img src="{{ asset($det['imagen'])}}" width="100px"></td>
                <td align="center" valign="top">{{$det['cantidad'][0]}}</td>
                <td align="center" valign="top">${{number_format($det['precio'][0], 0, ',', '.')}}</td>
                <td align="center" valign="top">${{number_format($det['suma'][0], 0, ',', '.')}}</td>
            </tr>
        @endforeach
        @foreach ($data['detalle'] as $det)
            <tr>
                <td valign="top">
                    {{$det['nombre']}}<br>
                    {{$det['descripcion']}}
                </td>
                <td align="center" valign="top"><img src="{{ asset($det['imagen'])}}" width="100px"></td>
                <td align="center" valign="top">{{$det['cantidad'][0]}}</td>
                <td align="center" valign="top">${{number_format($det['precio'][0], 0, ',', '.')}}</td>
                <td align="center" valign="top">${{number_format($det['suma'][0], 0, ',', '.')}}</td>
            </tr>
        @endforeach
        @foreach ($data['detalle'] as $det)
            <tr>
                <td valign="top">
                    {{$det['nombre']}}<br>
                    {{$det['descripcion']}}
                </td>
                <td align="center" valign="top"><img src="{{ asset($det['imagen'])}}" width="100px"></td>
                <td align="center" valign="top">{{$det['cantidad'][0]}}</td>
                <td align="center" valign="top">${{number_format($det['precio'][0], 0, ',', '.')}}</td>
                <td align="center" valign="top">${{number_format($det['suma'][0], 0, ',', '.')}}</td>
            </tr>
        @endforeach
        @foreach ($data['detalle'] as $det)
            <tr>
                <td valign="top">
                    {{$det['nombre']}}<br>
                    {{$det['descripcion']}}
                </td>
                <td align="center" valign="top"><img src="{{ asset($det['imagen'])}}" width="100px"></td>
                <td align="center" valign="top">{{$det['cantidad'][0]}}</td>
                <td align="center" valign="top">${{number_format($det['precio'][0], 0, ',', '.')}}</td>
                <td align="center" valign="top">${{number_format($det['suma'][0], 0, ',', '.')}}</td>
            </tr>
        @endforeach
        @foreach ($data['detalle'] as $det)
            <tr>
                <td valign="top">
                    {{$det['nombre']}}<br>
                    {{$det['descripcion']}}
                </td>
                <td align="center" valign="top"><img src="{{ asset($det['imagen'])}}" width="100px"></td>
                <td align="center" valign="top">{{$det['cantidad'][0]}}</td>
                <td align="center" valign="top">${{number_format($det['precio'][0], 0, ',', '.')}}</td>
                <td align="center" valign="top">${{number_format($det['suma'][0], 0, ',', '.')}}</td>
            </tr>
        @endforeach
        @foreach ($data['detalle'] as $det)
            <tr>
                <td valign="top">
                    {{$det['nombre']}}<br>
                    {{$det['descripcion']}}
                </td>
                <td align="center" valign="top"><img src="{{ asset($det['imagen'])}}" width="100px"></td>
                <td align="center" valign="top">{{$det['cantidad'][0]}}</td>
                <td align="center" valign="top">${{number_format($det['precio'][0], 0, ',', '.')}}</td>
                <td align="center" valign="top">${{number_format($det['suma'][0], 0, ',', '.')}}</td>
            </tr>
        @endforeach
        @foreach ($data['detalle'] as $det)
            <tr>
                <td valign="top">
                    {{$det['nombre']}}<br>
                    {{$det['descripcion']}}
                </td>
                <td align="center" valign="top"><img src="{{ asset($det['imagen'])}}" width="100px"></td>
                <td align="center" valign="top">{{$det['cantidad'][0]}}</td>
                <td align="center" valign="top">${{number_format($det['precio'][0], 0, ',', '.')}}</td>
                <td align="center" valign="top">${{number_format($det['suma'][0], 0, ',', '.')}}</td>
            </tr>
        @endforeach
        @foreach ($data['detalle'] as $det)
            <tr>
                <td valign="top">
                    {{$det['nombre']}}<br>
                    {{$det['descripcion']}}
                </td>
                <td align="center" valign="top"><img src="{{ asset($det['imagen'])}}" width="100px"></td>
                <td align="center" valign="top">{{$det['cantidad'][0]}}</td>
                <td align="center" valign="top">${{number_format($det['precio'][0], 0, ',', '.')}}</td>
                <td align="center" valign="top">${{number_format($det['suma'][0], 0, ',', '.')}}</td>
            </tr>
        @endforeach
    </table>
    <table class="w-100 mt-1">
        <tr>
            <td align="left" valign="top" width="75%" style="font-size: 10pt">
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
            <td width="25%" valign="top">
                @if($data['activa_descuento'])
                    <table class="table w-100" border="1" cellpadding="0" cellspacing="0">
                        <tr>
                            <th width="43%">Descuento</th>
                            <td>{{ $data['descuento'] }}%</td>
                        </tr>
                    </table>
                @endif

                @if($data['activa_total'])
                    <table class="table mt-1 w-100" border="1" cellpadding="0" cellspacing="0">
                        <tr>
                            <th width="43%" align="right">NETO</th>
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
<footer>
    <table class="w-100" style="font-size: 10pt">
        <tr>
            <th width="30%" align="left" valign="top">
                Vendedor (a)<br>
                {{ $data['vendedor']->name }}<br>
                {{ $data['vendedor']->phone }}<br>
                {{ $data['vendedor']->email }}<br>
            </th>
            <th width="40%" align="center" valign="top">
                Pro-Gift Ltda<br>
                Rut: 76.029.873-5<br>
                Av. Rosario Sur 135 Piso 4, Las Condes<br>
                Giro: Servicios Publicitarios<br>
            </th>
            <th width="30%" align="right" valign="top">
                Datos Bancarios:<br>
                Banco: BCI<br>
                Cuenta Cte: Nº 45791163<br>
                {{ "cobranza@pro-gift.cl" }}
            </th>
        </tr>
    </table>
</footer>
</body>
</html>

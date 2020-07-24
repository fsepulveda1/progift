<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/strict.dtd">
<html>
    <head>
        <style>
            @media only screen and (max-width: 300px) {
                body {
                    width: 218px !important;
                    margin: auto !important;
                }
                .table {
                    width: 195px !important;
                    margin: auto !important;
                }
                .logo,
                .titleblock,
                .linkbelow,
                .box,
                .footer,
                .space_footer {
                    width: auto !important;
                    display: block !important;
                }
                span.title {
                    font-size: 20px !important;
                    line-height: 23px !important;
                }
                span.subtitle {
                    font-size: 14px !important;
                    line-height: 18px !important;
                    padding-top: 10px !important;
                    display: block !important;
                }
                td.box p {
                    font-size: 11px !important;
                    font-weight: bold !important;
                }
                .table-recap table,
                .table-recap thead,
                .table-recap tbody,
                .table-recap th,
                .table-recap td,
                .table-recap tr {
                    display: block !important;
                }
                .table-recap {
                    width: 200px !important;
                }
                .table-recap tr td,
                .conf_body td {
                    text-align: center !important;
                }
                .address {
                    display: block !important;
                    margin-bottom: 10px !important;
                }
                .space_address {
                    display: none !important;
                }
            }
            @media only screen and (min-width: 301px) and (max-width: 500px) {
                body {
                    width: 308px !important;
                    margin: auto !important;
                }
                .table {
                    width: 285px !important;
                    margin: auto !important;
                }
                .logo,
                .titleblock,
                .linkbelow,
                .box,
                .footer,
                .space_footer {
                    width: auto !important;
                    display: block !important;
                }
                .table-recap table,
                .table-recap thead,
                .table-recap tbody,
                .table-recap th,
                .table-recap td,
                .table-recap tr {
                    display: block !important;
                }
                .table-recap {
                    width: 295px !important;
                }
                .table-recap tr td,
                .conf_body td {
                    text-align: center !important;
                }
            }
            @media only screen and (min-width: 501px) and (max-width: 768px) {
                body {
                    width: 478px !important;
                    margin: auto !important;
                }
                .table {
                    width: 450px !important;
                    margin: auto !important;
                }
                .logo,
                .titleblock,
                .linkbelow,
                .box,
                .footer,
                .space_footer {
                    width: auto !important;
                    display: block !important;
                }
            }
            @media only screen and (max-device-width: 480px) {
                body {
                    width: 308px !important;
                    margin: auto !important;
                }
                .table {
                    width: 285px;
                    margin: auto !important;
                }
                .logo,
                .titleblock,
                .linkbelow,
                .box,
                .footer,
                .space_footer {
                    width: auto !important;
                    display: block !important;
                }

                .table-recap {
                    width: 295px !important;
                }
                .table-recap tr td,
                .conf_body td {
                    text-align: center !important;
                }
                .address {
                    display: block !important;
                    margin-bottom: 10px !important;
                }
                .space_address {
                    display: none !important;
                }
            }
        </style>
    </head>
    <body style="-webkit-text-size-adjust: none; background-color: #fff; width: 650px; font-family: Open-sans, sans-serif; color: #555454; font-size: 9px; line-height: 18px; margin: auto;">
        <table style="border: 1px solid #d6d4d4; background-color: #ffffff; padding: 7px 0;">
            <tr>
                <td colspan="6">
                    <img src="https://www.pro-gift.cl/wp-content/themes/progift/images/logo.png"/>
                </td>
            </tr>
            <tr>
                <td width="60%">
                    <table style="background-color: #ffffff;">
                        <tr style="border-bottom: 1px solid #000000;background-color: #f8f8f8;">
                            <td colspan="2">
                                <span style="margin-bottom: 7px;">Datos del cliente</span>
                            </td>
                        </tr>
                        <tr style="background-color: #ffffff;">
                            <td width="40%">
                                <span>
                                    Nombre:
                                </span>
                            </td>
                            <td width="60%">
                                <span>
                                    {{$data['nombre']}}
                                </span>
                            </td>
                        </tr>
                        <tr style="background-color: #ffffff;">
                            <td width="40%">
                                <span>
                                    Email:
                                </span>
                            </td>
                            <td width="60%">
                                <span>
                                    {{$data['email']}}
                                </span>
                            </td>
                        </tr>
                        <tr style="background-color: #ffffff;">
                            <td width="40%">
                                <span>
                                    Empresa:
                                </span>
                            </td>
                            <td width="60%">
                                <span>
                                    {{$data['empresa']}}
                                </span>
                            </td>
                        </tr>
                        <tr style="background-color: #ffffff;">
                            <td width="40%">
                                <span>
                                    Forma de pago:
                                </span>
                            </td>
                            <td width="60%">
                                <span>
                                    {{$data['forma_pago']}}
                                </span>
                            </td>
                        </tr>
                        <tr style="background-color: #ffffff;">
                            <td width="40%">
                                <span>
                                    Validez:
                                </span>
                            </td>
                            <td width="60%">
                                <span>
                                    {{$data['validez']}}
                                </span>
                            </td>
                        </tr>
                        <tr style="background-color: #ffffff;">
                            <td width="40%">
                                <span>
                                    Entrega:
                                </span>
                            </td>
                            <td width="60%">
                                <span>
                                    {{$data['entrega']}}
                                </span>
                            </td>
                        </tr>
                        <tr style="background-color: #ffffff;">
                            <td width="40%">
                                <span>
                                    Tipo de cotización:
                                </span>
                            </td>
                            <td width="60%">
                                <span>
                                    {{$data['tipo']}}
                                </span>
                            </td>
                        </tr>
                    </table>
                </td>
                <td width="40%" style="background-color: #ffffff;">

                </td>
            </tr>
            <tr>
                <td colspan="6">

                </td>
            </tr>
            <tr style="border-bottom: 1px solid #000000;background-color: #f8f8f8;">
                <td width="20%" align="center">
                    Producto
                </td>
                <td width="10%" align="center">
                    SKU
                </td>
                <td width="20%" align="center">
                    Foto
                </td>
                <td width="10%" align="center">
                    Color
                </td>
                <td width="10%" align="center">
                    Imp.
                </td>
                <td width="10%" align="center">
                    Cant.
                </td>
                <td width="10%" align="center">
                    Precio
                </td>
                <td width="10%" align="center">
                    IVA
                </td>
            </tr>
                @foreach ($data['detalle'] as $det)
                    <tr style="background-color: #ffffff;">
                        <td width="20%" align="center">
                            {{ $det['nombre'] }}
                        </td>
                        <td width="10%" align="center">
                            {{ $det['sku'] }}
                        </td>
                        <td width="20%" align="center">
                            <img src="{{ $det['imagen'] }}"/>
                        </td>
                        <td width="10%" align="center">
                            {{ $det['color'] }}
                        </td>
                        <td width="10%" align="center">
                            {{ $det['imprenta'] }}
                        </td>
                        <td width="10%" align="center">
                            {{ $det['cantidad'][0] }}
                        </td>
                        <td width="10%" align="center">
                            ${{ number_format($det['precio'][0], 0, ',', '.') }}
                        </td>
                        <td width="10%" align="center">
                            ${{ number_format($det['suma'][0], 0, ',', '.') }}
                        </td>
                    </tr>
                        <?php
                            if (empty($det['cantidad'])){
                                ?>
                                @foreach ($det['cantidad'] as $key => $d)
                                @if($key == 0)
        
                                @else
                                <tr>
                                    <td colspan="3"></td>
                                    <td width="10%" align="center">
                                        {{ $det['cantidad'][$key] }}
                                    </td>
                                    <td width="20%" align="center">
                                        ${{ number_format($det['precio'][$key], 0, ',', '.') }}
                                    </td>
                                    <td width="10%" align="center">
                                        ${{ number_format($det['suma'][$key], 0, ',', '.') }}
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                <?php
                            }
                        ?>
                @endforeach
            <tr>
                <td colspan="6">

                </td>
            </tr>
            <tr>
                <td colspan="6">

                </td>
            </tr>
            <tr>
                <td width="50%">

                </td>
                <td width="50%">
                    <table style="background-color: #ffffff;">
                        <tr style="background-color: #ffffff;">
                            <td width="40%">
                                <span>
                                    Productos:
                                </span>
                            </td>
                            <td width="60%">
                                <span>
                                    ${{number_format($data['total'], 0, ',', '.')}}
                                </span>
                            </td>
                        </tr>
                        @if ($data['activa_descuento'])
                            <tr style="background-color: #ffffff;">
                                <td width="40%">
                                    <span>
                                        Descuento:
                                    </span>
                                </td>
                                <td width="60%">
                                    <span>
                                        {{number_format($data['descuento'], 0, ',', '.')}}
                                    </span>
                                </td>
                            </tr>
                        @endif
                        @if ($data['activa_total'])
                            <tr style="background-color: #ffffff;">
                                <td width="40%">
                                    <span>
                                        Neto:
                                    </span>
                                </td>
                                <td width="60%">
                                    <span>
                                        ${{number_format($data['neto'], 0, ',', '.')}}
                                    </span>
                                </td>
                            </tr>
                            <tr style="background-color: #ffffff;">
                                <td width="40%">
                                    <span>
                                        IVA:
                                    </span>
                                </td>
                                <td width="60%">
                                    <span>
                                        ${{number_format($data['iva'], 0, ',', '.')}}
                                    </span>
                                </td>
                            </tr>
                            <tr style="background-color: #ffffff;">
                                <td width="40%">
                                    <span>
                                        Total:
                                    </span>
                                </td>
                                <td width="60%">
                                    <span>
                                        ${{number_format($data['total'], 0, ',', '.')}}
                                    </span>
                                </td>
                            </tr>
                        @endif
                        
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>

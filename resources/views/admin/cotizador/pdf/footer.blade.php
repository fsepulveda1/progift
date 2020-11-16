<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        html {
            font-size: 16px;
        }

        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }
        .w-100 {
            width: 100%;
            max-width: 100%;
        }

        footer {
            height: 2.1cm;
            padding: .25cm .5cm;
            background-color: #F5C524;
            font-family: 'Roboto', sans-serif;
            font-weight: bold;
        }

        th {
            font-weight: bold;
        }

    </style>
</head>
<body>
<footer>
    <table class="w-100" style="font-size: 17px; font-weight: bold">
        <tr>
            <th width="30%" align="left" valign="top" style="line-height: 1.2rem">
                Vendedor(a)<br>
                {{ $user->name }}<br>
                {{ $user->phone }}<br>
                {{ $user->email }}<br>
            </th>
            <th width="40%" align="center" valign="top"  style="line-height: 1.2rem">
                Pro-Gift Ltda<br>
                Rut: 76.029.873-5<br>
                Av. Rosario Sur 135 Piso 4, Las Condes<br>
                Giro: Servicios Publicitarios<br>
            </th>
            <th width="30%" align="right" valign="top"  style="line-height: 1.2rem">
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

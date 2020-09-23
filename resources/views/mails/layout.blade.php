<html>
<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
    </style>
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
        body {
            font-family: 'Roboto', sans-serif;
            color: #706e6e;
        }
        a {
            color: #706e6e;
        }
        .table{
            border-color: #F5C524;
            font-size: 12pt;
            font-family: 'Roboto', sans-serif;
        }
        .w-100 {
            width: 100%;
        }
        .mt-1 {  margin-top: 1rem;  }
        .mt-3 {  margin-top: 3rem;  }
        .table th {
            font-weight: bold;
        }
        .table th,
        .table td {
            border: 1px #F5C524 solid;
            padding: 5px 10px;
            font-size: 12pt;
        }
    </style>
    <!--[if mso]>
    <style type="text/css">
        body, table, td, p, a, h4 {font-family: Arial, Helvetica, sans-serif !important;}
    </style>
    <![endif]-->
</head>
<body>

@yield('content')
<footer>
    <img src="{{ asset('assets/images/logo_correos.png') }}" alt="Logo" width="150px">
</footer>
</body>
</html>

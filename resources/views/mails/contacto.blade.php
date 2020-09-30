@extends('mails.layout')

@section('content')
    <h4 style="font-family: 'Roboto', sans-serif;font-size: 16pt;">Nuevo contacto</h4>
    <p style="font-family: 'Roboto', sans-serif;font-size: 12pt">
    <table border="0" cellpadding="0" cellspacing="0">
        <tr><th align="left">Empresa</th><td>{{ $contacto->nombre }}</td></tr>
        <tr><th align="left">Rut</th><td>{{ $contacto->rut }}</td></tr>
        <tr><th align="left">Contacto</th><td>{{ $contacto->contacto }}</td></tr>
        <tr><th align="left">Teléfono</th><td>{{ $contacto->telefono }}</td></tr>
        <tr><th align="left">Email</th>
            <td>
                <a href="mailto: {{ $contacto->email }}" style="color: #0066cc">{{ $contacto->email }}</a>
            </td>
        </tr>
        <tr><th align="left">Comentarios</th><td>{{ $contacto->comentarios }}</td></tr>
    </table>
    </p>
@endsection
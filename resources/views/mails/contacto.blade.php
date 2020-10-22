@extends('mails.layout')

@section('content')
    <h4 style="font-family: 'Roboto', sans-serif;font-size: 16pt;">Nuevo Contacto</h4>
    <p style="font-family: 'Roboto', sans-serif;font-size: 13pt; margin-bottom: 2rem">
        <strong>Empresa:</strong> {{ $contacto->empresa }}<br/>
        <strong>Rut Empresa:</strong> {{ $contacto->rut }}<br/>
        <strong>Contacto:</strong> {{ $contacto->contacto }}<br/>
        <strong>E-Mail:</strong>
        <a href="mailto: {{ $contacto->email }}" style="color: #0066cc">{{ $contacto->email }}</a><br/>
        <strong>Teléfono:</strong> {{ $contacto->telefono }}<br/>
        <strong>Comentarios:</strong> {{ $contacto->comentarios }}<br/>
    </p>
@endsection

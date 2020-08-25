@extends('public.layout')


@section('content')
    <main class="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-7 text-center p-5" style="border:1px solid #F5C524">
                            <img src="{{ asset('assets/images/logo_pdf.png') }}" class="img-fluid mx-auto my-5" alt="Logo Pro-Gift" width="150px">
                            <h2 style="font-size: 16px" class="mt-5">GRACIAS POR CONFIAR EN NOSOTROS</h2>
                            <p style="font-size: 13px">Le hemos enviado un e-mail con el detalle de los productos que ha seleccionado para cotizar</p>
                            <p style="font-size: 13px">Más de 12 años de experiencia siendo rigurosos con la calidad de nuestros productos y plazos de entrega</p>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <img src="{{ asset('assets/images/logos_aviso.jpg') }}" class="img-fluid mx-auto" alt="Nuestros Clientes">
                    </div>
                </div>

                @include('partials.cat-menu')

            </div>
        </div>
    </main>
@endsection
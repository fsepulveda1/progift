@extends('public.layout')
@section('title')Contacto | @endsection


@section('content')

    <main class="main">

        <div class="container">

            <div class="row">
                <div class="col-lg-9">
                    <nav aria-label="breadcrumb" class="breadcrumb-nav">

                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Contacto</a></li>
                        </ol>

                    </nav>
                    <br><h2>CONTACTO</h2>
                    <p>Si no ha logrado encontrar el producto que está buscando o tiene un requerimiento especial, complete el formulario y lo contactaremos a la brevedad.</p>
                    @if(session()->has('success_msg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('success_msg') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif
                    @if(session()->has('alert_msg'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ session()->get('alert_msg') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif

                    <form action="{{ route('home.contacto') }}" method="POST" class="contact-form row">
                        {{ csrf_field() }}
                        <div class="col-lg-12">
                            <div class="form-group required-field">
                                <label for="contact-company">Empresa</label>
                                <input type="text" class="form-control" id="empresa" name="empresa" required>
                            </div><!-- End .form-group -->
                        </div><!-- End .col-lg-12 -->
                        <div class="col-lg-6">
                            <div class="form-group required-field">
                                <label for="contact-company-run">Rut de empresa</label>
                                <input type="text" class="form-control" id="rut" name="rut" required oninput="checkRut(this)">
                            </div><!-- End .form-group -->
                        </div><!-- End .col-lg-6 -->
                        <div class="col-lg-6">
                            <div class="form-group required-field">
                                <label for="contact-contact">Contacto</label>
                                <input type="text" class="form-control" id="contacto" name="contacto">
                            </div><!-- End .form-group -->
                        </div><!-- End .col-lg-6 -->
                        <div class="col-lg-6">
                            <div class="form-group required-field">
                                <label for="contact-phone">Teléfono o celular</label>
                                <input type="text" class="form-control" id="telefono" name="telefono">
                            </div><!-- End .form-group -->
                        </div><!-- End .col-lg-6 -->
                        <div class="col-lg-6">
                            <div class="form-group required-field">
                                <label for="contact-email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div><!-- End .form-group -->
                        </div><!-- End .col-lg-6 -->
                        <div class="col-lg-12">
                            <div class="form-group required-field">
                                <label for="contact-message">Comentarios</label>
                                <textarea cols="30" rows="3" id="comentarios" class="form-control" name="comentarios" required></textarea>
                            </div><!-- End .form-group -->

                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary">ENVIAR</button>
                            </div><!-- End .form-footer -->
                        </div><!-- End .col-lg-12 -->
                    </form>
                </div><!-- End .col-lg-9 -->

                @include('partials.cat-menu')
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-8"></div><!-- margin -->
    </main><!-- End .main -->

@endsection
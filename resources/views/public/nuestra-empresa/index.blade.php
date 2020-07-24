@extends('public.layout')


@section('content')

<main class="main">
    <div class="container">
        <div class="row">
    <div class="col-lg-9">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Nuestra Empresa</li>
                </ol>
            </div><!-- End .container -->
        </nav>
        <div class="col-lg-12 col-sm-12">
            <div class="banner banner-image">
                <img src="assets/images/banners/foto_nuestra_empresa.jpg" alt="banner">
            </div><!-- End .banner -->
        </div>
        <div class="about-section">
            <div class="container">
                <h2>NUESTRA EMPRESA</h2>
                <p>Pro-Gift en una empresa especializada en Merchandising con una experiencia y trayectoria de 12 en el mercado, contamos con más de 2.000 productos disponibles para nuestros Clientes. Además desarrollamos productos especialmente según las necesidades de las empresas y contamos con Convenio Marco para poder atender a todas las entidades del gobierno a través de Mercado Público.</p>
                <p>Nuestras Ejecutivas se preocupan diariamente de transmitir a nuestros Clientes el sello de excelencia en Servicio y atención personalizada que nos caracteriza. Tenemos un gran equipo de trabajo conformado por más de 20 personas y a la fecha contamos con una cartera de más de 2.500 Clientes atendidos a los largo de estos años.</p>

                <p class="lead">Lo invitamos a seleccionar uno o más productos en el sitio y cotizar on-line de una manera más fácil y rápida.</p>

            </div><!-- End .container -->
        </div><!-- End .about-section -->

    <div class="banners-group">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-sm-6">
                    <div class="banner banner-image">
                        <img src="assets/images/banners/foto_1.jpg" alt="banner">
                    </div><!-- End .banner -->

                    <div class="banner banner-image">
                        <img src="assets/images/banners/foto_3.jpg" alt="banner">
                    </div><!-- End .banner -->

                </div><!-- End .col-lg-3 -->

                <div class="col-lg-5 col-sm-6 order-lg-last">
                    <div class="banner banner-image">
                        <img src="assets/images/banners/foto_2.jpg" alt="banner">
                    </div><!-- End .banner -->

                    <div class="banner banner-image">
                        <img src="assets/images/banners/foto_4_4.jpg" alt="banner">
                    </div><!-- End .banner -->

                </div><!-- End .col-lg-3 -->        

            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .banners-group -->

        <div class="counters-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 count-container">
                        <div class="count-wrapper">
                            +<span class="count" data-from="0" data-to="2000" data-speed="2000" data-refresh-interval="50">2000</span>
                        </div><!-- End .count-wrapper -->
                        <h4 class="count-title">ARTÍCULOS PUBLICITARIOS</h4>
                    </div><!-- End .col-lg-6 -->

                    <div class="col-lg-4 count-container">
                        <div class="count-wrapper">
                            +<span class="count" data-from="0" data-to="2500" data-speed="2000" data-refresh-interval="50">2500</span>
                        </div><!-- End .count-wrapper -->
                        <h4 class="count-title">CLIENTES ATENDIDOS</h4>
                    </div><!-- End .col-lg-6 -->

                    <div class="col-lg-4 order-lg-last count-container">
                        <div class="count-wrapper">
                            +<span class="count" data-from="0" data-to="12" data-speed="2000" data-refresh-interval="50">12</span>
                        </div><!-- End .count-wrapper -->
                        <h4 class="count-title">AÑOS EN EL MERCADO</h4>
                    </div><!-- End .col-lg-6 -->

                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .counters-section -->
    </div><!-- End .col-lg-9 -->
    @include('partials.cat-menu')
        </div><!-- End .row -->
    </div><!-- End .container -->
</main><!-- End .main -->

@endsection
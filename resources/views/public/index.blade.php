@extends('public.layout')


@section('content')
    <main class="main">
        <div class="home-top-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="home-banner mb-2">
                            <div class="video-container">
                                <iframe class="video" src="https://www.youtube.com/embed/9AEXwm0x_50?autoplay=1&mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div><!-- End .home-slider -->

                        <section class="about-us-section">"<b>Merchandising</b> es una de las estrategias del mercado que más incrementa la rentabilidad de una marca"<br>
                            Pro-Gift a través de sus 12 Años de experiencia ha dado un Servicio de excelencia y atención personalizada a más de 2.500 Clientes!! Les damos las gracias por seguir prefiriéndonos y confiar en nosotros.</section>

                        <section class="featured-section">
                            <h2 class="carousel-title">ARTÍCULOS PUBLICITARIOS DESTACADOS</h2>
                            <div class="product-intro owl-carousel owl-theme" id="owl-products-carousel">
                                @foreach($products as $pro)
                                    @if($loop->odd)<div class="product-default">@endif
                                        <div class="product-details">
                                            <figure>
                                                <a href="/producto/{{$pro->slug}}">
                                                    <?php $images = json_decode($pro->imagen); ?>
                                                    <?php $count = 1; ?>
                                                    @foreach($images as $image)
                                                        <?php
                                                        if($count == 1){
                                                        ?>
                                                        <img width="100%" src="{{ asset('/storage/'.$image) }}" alt="Producto">
                                                        <?php
                                                        }
                                                        $count++;
                                                        ?>
                                                    @endforeach
                                                </a>
                                            </figure>
                                            <h2 class="product-title">
                                                <a href="/producto/{{$pro->slug}}">{{ $pro->nombre }}</a>
                                            </h2>
                                            <div class="price-box">
                                                <span class="product-price">{{ $pro->sku }}</span>
                                            <!--<span class="product-price">${{ number_format($pro->precio, 0, ',', '.') }}</span>-->
                                            </div><!-- End .price-box -->
                                            <div class="product-action">
                                                <a class="btn-icon btn-add-cart add-cart" href="/producto/{{$pro->slug}}" class="tooltip-test" style="color: #fff;" title="add to cart">
                                                    &nbsp;&nbsp; Cotizar
                                                </a>
                                            </div>
                                        </div><!-- End .product-details -->
                                        @if($loop->even || $loop->last)</div>@endif
                                @endforeach
                            </div><!-- End .owl-carousel -->
                        </section>

                        <div class="banners-group">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="banner banner-image">
                                            <a href="{{ setting('portada.enlace_oferta') }}">
                                                <img src="{{ asset('/storage/'.setting('portada.imagen_oferta')) }}" alt="banner">
                                                <div class="promo-text-cover">
                                                    <div class="promo-text bottom">
                                                        {!! setting('portada.texto_oferta') !!}
                                                        <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal">COTIZAR</button>
                                                    </div>
                                                </div>
                                            </a>
                                        </div><!-- End .banner -->

                                    </div><!-- End .col-lg-3 -->

                                    <div class="col-lg-6 col-sm-6 order-lg-last">
                                        <div class="banner banner-image">
                                            <a href="{{ setting('portada.enlace_nuevo') }}">
                                                <img src="{{ asset('/storage/'.setting('portada.imagen_nuevo')) }}" alt="banner">
                                                <div class="promo-text-cover">
                                                    <div class="promo-text middle">
                                                        <p class="product-title">
                                                            {!! setting('portada.texto_nuevo') !!}
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div><!-- End .banner -->

                                    </div><!-- End .col-lg-3 -->

                                </div><!-- End .row -->
                            </div><!-- End .container -->
                        </div><!-- End .banners-group -->

                    </div><!-- End .col-lg-9 -->

                    @include('partials.cat-menu')
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .home-top-container -->

        <div class="mb-4"></div><!-- margin -->

    </main><!-- End .main -->

@endsection

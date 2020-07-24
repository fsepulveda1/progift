@extends('public.layout')


@section('content')
<main class="main">
            <div class="home-top-container">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="home-slider owl-carousel owl-carousel-lazy">
                                <div class="home-slide">
                                    <div class="owl-lazy slide-bg" data-src="assets/images/slider/slide_1.jpg"></div>
                                    <div class="home-slide-content text-white">
										<img src="assets/images/slider/12_anos.png">
                                        <p>Liderando la venta de<br>
	                                       artículos publicitarios</p>
                                    </div><!-- End .home-slide-content -->
                                </div><!-- End .home-slide -->
                            </div><!-- End .home-slider -->
                            
            <section class="about-us-section">"<b>Merchandising</b> es una de las estrategias del mercado que más incrementa la rentabilidad de una marca"<br>
	            Pro-Gift a través de sus 12 Años de experiencia ha dado un Servicio de excelencia y atención personalizada a más de 2.500 Clientes!! Les damos las gracias por seguir prefiriéndonos y confiar en nosotros.</section>
                            
			<section class="featured-section">
                <div class="container">
                    <h2 class="carousel-title">ARTÍCULOS PUBLICITARIOS DESTACADOS</h2>
                    <div class="product-intro owl-carousel owl-theme" data-toggle="owl" data-owl-options="{
                        'margin': 20,
                        'items': 2,
                        'autoplayTimeout': 60000,
                        'responsive': {
                            '559': {
                                'items': 3
                            },
                            '975': {
                                'items': 4
                            }
                        }
                    }">
                    @foreach($products as $pro)
                        <div class="product-default">
                            <div class="product-details">
                            <figure>
                                <a href="/products/{{$pro['id']}}">
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
                                    <a href="/products/{{$pro['id']}}">{{ $pro->nombre }}</a>
                                </h2>
                                <div class="price-box">
                                    <span class="product-price">{{ $pro->sku }}</span>
                                    <!--<span class="product-price">${{ number_format($pro->precio, 0, ',', '.') }}</span>-->
                                </div><!-- End .price-box -->
                                <div class="product-action">
                                    <!-- <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-bag"></i>COTIZAR</button> -->
                                    <!--
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $pro->id }}" id="id" name="id">
                                        <input type="hidden" value="{{ $pro->nombre }}" id="name" name="name">
                                        <input type="hidden" value="{{ $pro->precio }}" id="price" name="price">
                                        <input type="hidden" value="{{ $pro->imagen }}" id="img" name="img">
                                        <input type="hidden" value="{{ $pro->slug }}" id="slug" name="slug">
                                        <input type="hidden" value="1" id="quantity" name="quantity">
                                        <div class="" style="background-color: white;">
                                              <div class="row">
                                                <button class="btn-icon btn-add-cart add-cart" class="tooltip-test" title="add to cart">
                                                    &nbsp;&nbsp;Cotizar
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    -->
                                    <a class="btn-icon btn-add-cart add-cart" href="/products/{{$pro->id}}" class="tooltip-test" style="color: #fff;" title="add to cart">
                                        &nbsp;&nbsp; Cotizar
                                    </a>
                                </div>
                            </div><!-- End .product-details -->
                        </div>
                    @endforeach
                    </div><!-- End .owl-carousel -->
                </div>
            </section>

			 <div class="banners-group">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="banner banner-image discount">
                                <a href="#">
                                    <img src="assets/images/banners/banner_25_descuento_libreta.jpg" alt="banner">
                                    <div class="promo-text-cover">
	                                    <div class="promo-text bottom">
		                                    <h2 class="product-title">Bloc Notas Makrono</h2>
		                                    <p>Obten tu descuento por compras superiores de $ 150.000</p>
		                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal">COTIZAR</button> 
	                                    </div>
                                    </div>
                                </a>
                            </div><!-- End .banner -->

                        </div><!-- End .col-lg-3 -->

                        <div class="col-lg-6 col-sm-6 order-lg-last">
                            <div class="banner banner-image recent">
                                <a href="#">
                                    <img src="assets/images/banners/banner_posavasos.jpg" alt="banner">
                                    <div class="promo-text-cover">
	                                    <div class="promo-text middle">
	                                    	<p class="product-title">Posavasos con abridor<br>metálico integrado</p>
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
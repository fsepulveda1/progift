<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Pro-Gift</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Bootstrap eCommerce Template">
    <meta name="author" content="SW-THEMES">
        
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/images/icons/favicon.ico">
    
    <script type="text/javascript">
        WebFontConfig = {
            google: { families: [ 'Open+Sans:300,400,600,700,800','Poppins:300,400,500,600,700','Segoe Script:300,400,500,600,700' ] }
        };
        (function(d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = '/assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="/assets/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/vendor/fontawesome-free/css/all.min.css"> 
</head>
<body>
    <div class="page-wrapper">
        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left header-dropdowns">
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <div class="header-dropdown dropdown-expanded">
	                        <p class="welcome-msg" class="float-left"><img src="/assets/images/icono_telefono.png"> </p>
                            <a href="#">Teléfonos</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="tel:(+56) 22 246 3180">(+56) 22 247 8162</a></li>
                                    <li><a href="tel:(+56) 22 246 2399">(+56) 22 246 2399</a></li>
                                    <li><a href="tel:(+56) 22 246 2399">(+56) 22 246 3180</a></li>
                                </ul>
                            </div><!-- End .header-menu -->
                        </div><!-- End .header-dropown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <a href="{{ url('/') }}" class="logo">
                            <img src="/assets/images/logo_pro-gift_chico.png" alt="Porto Logo">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <div class="header-search">
                            <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                            <form action="{{ route('home.buscar') }}" method="get">
                                {{ csrf_field() }}
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Buscar..." required>
                                    <button class="btn" type="submit"><i class="icon-magnifier"></i></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div><!-- End .headeer-center -->

                    <div class="header-right">
                        <button class="mobile-menu-toggler" type="button">
                            <i class="icon-menu"></i>
                        </button>
                        <div class="header-contact">
                            <a href="mailto:ventas@pro-gift.cl">ventas@pro-gift.cl</a>
                        </div><!-- End .header-contact -->

                        <div class="dropdown cart-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <span class="cart-count">{{ \Cart::getTotalQuantity()}}</span>
                            </a>

                            <div class="dropdown-menu" >
                                <div class="dropdownmenu-wrapper">
                                    <div class="dropdown-cart-header">
                                        <span>{{ \Cart::getTotalQuantity()}} Items</span>
                                    </div><!-- End .dropdown-cart-header -->
                                    <div class="dropdown-cart-products">
                                        @if(count(\Cart::getContent()) > 0)
                                            @foreach(\Cart::getContent() as $item)
                                            <div class="product">
                                            
                                                <div class="product-details">
                                                    <h4 class="product-title">
                                                        <a href="detalle-producto.html">{{$item->name}}</a>
                                                    </h4>

                                                    <span class="cart-product-info">
                                                        <span class="cart-product-qty">Cantidad: {{$item->quantity}}</span>
                                                    </span>
                                                    <br>
                                                </div><!-- End .product-details -->
                                                <figure class="product-image-container">
                                                    <a href="/products/{{$item->id}}" class="product-image">
                                                        <img src="/storage/{{$item->attributes->image}}" alt="product">
                                                    </a>
                                                    <!--<a href="#" class="btn-remove" title="Remove Product"><i class="icon-cancel"></i></a>-->
                                                    <form action="{{ route('cart.remove') }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                                        <button class="btn-remove" title="Remove Product"><i class="icon-cancel"></i></button>
                                                    </form>
                                                </figure>
                                            </div><!-- End .product -->
                                        @endforeach

                                        @else
                                            <li class="list-group-item">Carrito vacío</li>
                                        @endif

                                    </div><!-- End .cart-product -->

                                    <div class="dropdown-cart-action">
                                        <a href="{{ url('/mi-cotizacion') }}" class="btn btn-block">Carro Cotizador</a>
                                    </div><!-- End .dropdown-cart-total -->
                                </div><!-- End .dropdownmenu-wrapper -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->

            <div class="header-bottom sticky-header">
                <div class="container">
                    <nav class="main-nav">
                        <ul class="menu sf-arrows">
                            <li class="float-right {{ request()->is('tips') || request()->is('/tips/*') ? 'active' : '' }}"><a href="{{ url('/tips') }}">TIPS</a></li>
                            <li class="float-right {{ request()->is('contacto') || request()->is('/contacto/*') ? 'active' : '' }}"><a href="{{ url('/contacto') }}">CONTACTO</a></li>
                            <li class="float-right {{ request()->is('preguntas-frecuentes') || request()->is('/preguntas-frecuentes/*') ? 'active' : '' }}"><a href="{{ url('/preguntas-frecuentes') }}">PREGUNTAS FRECUENTES</a></li>
                            <li class="float-right {{ request()->is('mi-cotizacion') || request()->is('/mi-cotizacion/*') ? 'active' : '' }}"><a href="{{ url('/mi-cotizacion') }}">MI COTIZACIÓN</a></li>
                            <li class="float-right {{ request()->is('nuestra-empresa') || request()->is('/nuestra-empresa/*') ? 'active' : '' }}"><a href="{{ url('/nuestra-empresa') }}">NUESTRA EMPRESA</a></li>
                            <li class="float-right {{ request()->is('/') || request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">INICIO</a></li>
                        </ul>
                    </nav>
                </div><!-- End .header-bottom -->
            </div><!-- End .header-bottom -->
        </header><!-- End .header -->



        @yield('content')
        
        <footer class="footer">
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
	                    <div class="col-lg-12">
	                   		<div class="widget widget-newsletter">
                                <h4 class="widget-title">NEWSLETTER</h4>

                                        @if(session()->has('news_msg'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ session()->get('news_msg') }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                        @endif
                                        <form action="{{ route('home.suscribe') }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="email" class="form-control" name="email" placeholder="Ingresa aquí tu correo" required>
                                            <input type="hidden" value="1" name="estado"/>
                                            <input type="submit" class="btn" value="SUSCRIBIRSE">
                                        </form>


                            </div><!-- End .widget -->
	                    </div><!-- End .col-lg-12 -->
                        <div class="col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">CONTACTO</h4>
                                <ul class="contact-info">
                                    <li> Rosario Sur 135, Piso 4, Las Condes</li>
                                    <li>Estación metro Manquehue</li>
                                    <li><a href="tel:(+56) 22 247 8162">(+56) 22 247 8162</a> - <a href="tel:(+56) 22 246 2399">(+56) 22 246 2399</a><br>
                                        <a href="tel:(+56) 22 246 3180">(+56) 22 246 3180</a>
                                    </li>
                                    <li><a href="mailto:contacto@pro-gift.cl">contacto@pro-gift.cl</a></li>
                                </ul>
                            </div><!-- End .widget -->
                        </div><!-- End .col-lg-3 -->

                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="widget">
                                        <h4 class="widget-title">PRODUCTOS MÁS COTIZADOS</h4>

                                        <div class="row">
                                            <div class="col-sm-6 col-md-2">
												<div class="product-details">
						                            <figure>
						                                <a href="detalle-producto.html">
						                                    <img src="/assets/images/products/1_toalla.jpg">
						                                </a>
						                            </figure>
					                                <p class="product-title">
					                                    <a href="detalle-producto.html">Producto 1</a>
					                                </p>
					                            </div><!-- End .product-details -->
                                            </div><!-- End .col-sm-6 -->
                                            <div class="col-sm-6 col-md-2">
												<div class="product-details">
						                            <figure>
						                                <a href="detalle-producto.html">
						                                    <img src="/assets/images/products/2_toalla_absorbente.jpg">
						                                </a>
						                            </figure>
					                                <p class="product-title">
					                                    <a href="detalle-producto.html">Producto 2</a>
					                                </p>
					                            </div><!-- End .product-details -->
                                            </div><!-- End .col-sm-6 -->
                                            <div class="col-sm-6 col-md-2">
												<div class="product-details">
						                            <figure>
						                                <a href="detalle-producto.html">
						                                    <img src="/assets/images/products/3_tarjetero_rainol.jpg">
						                                </a>
						                            </figure>
					                                <p class="product-title">
					                                    <a href="detalle-producto.html">Producto 3</a>
					                                </p>
					                            </div><!-- End .product-details -->
                                            </div><!-- End .col-sm-6 -->
                                            <div class="col-sm-6 col-md-2">
												<div class="product-details">
						                            <figure>
						                                <a href="detalle-producto.html">
						                                    <img src="/assets/images/products/4_set_marden.jpg">
						                                </a>
						                            </figure>
					                                <p class="product-title">
					                                    <a href="detalle-producto.html">Producto 4</a>
					                                </p>
					                            </div><!-- End .product-details -->
                                            </div><!-- End .col-sm-6 -->
                                            <div class="col-sm-6 col-md-2">
												<div class="product-details">
						                            <figure>
						                                <a href="detalle-producto.html">
						                                    <img src="/assets/images/products/5_parlante.jpg">
						                                </a>
						                            </figure>
					                                <p class="product-title">
					                                    <a href="detalle-producto.html">Producto 5</a>
					                                </p>
					                            </div><!-- End .product-details -->
                                            </div><!-- End .col-sm-6 -->
                                            <div class="col-sm-6 col-md-2">
												<div class="product-details">
						                            <figure>
						                                <a href="detalle-producto.html">
						                                    <img src="/assets/images/products/6_cuaderno.jpg">
						                                </a>
						                            </figure>
					                                <p class="product-title">
					                                    <a href="detalle-producto.html">Producto 6</a>
					                                </p>
					                            </div><!-- End .product-details -->
                                            </div><!-- End .col-sm-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .widget -->
                                </div><!-- End .col-md-12 -->

                            </div><!-- End .row -->
                        </div><!-- End .col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .footer-middle -->

            <div class="container">
                <div class="footer-bottom">
                    <p class="footer-copyright">&copy; 2020 Pro-Gift. Desarrollado por <a href="https://www.bigbuda.cl/" target="_blank">Agencia Digital Bigbuda</a></p>
                </div><!-- End .footer-bottom -->
            </div><!-- End .container -->
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->

    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-cancel"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
					<li class="active"><a href="inicio.html">INICIO</a></li>
					<li><a href="{{ url('/nuestra-empresa') }}">NUESTRA EMPRESA</a></li>
					<li><a href="{{ url('/mi-cotizacion') }}">MI COTIZACIÓN</a></li>
					<li><a href="{{ url('/preguntas-frecuentes') }}">PREGUNTAS FRECUENTES</a></li>
					<li><a href="{{ url('/contacto') }}">CONTACTO</a></li>
					<li><a href="{{ url('/tips') }}">TIPS</a></li>
                </ul>
            </nav><!-- End .mobile-nav -->

            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
                <a href="#" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank"><i class="icon-instagram"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <!-- Add Cart Modal -->
    <div class="modal fade" id="addCartModal" tabindex="-1" role="dialog" aria-labelledby="addCartModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body add-cart-box text-center">
            <p>Acabas de añadir a<br>tu cotización:</p>
            <h4 id="productTitle"></h4>
            <img src="" id="productImage" width="100" height="100" alt="adding cart image">
            <div class="btn-actions">
                <a href="{{ url('/mi-cotizacion') }}"><button class="btn-primary">Mi Cotización</button></a>
                <a href="#"><button class="btn-primary" data-dismiss="modal">Continuar</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/plugins.min.js"></script>

    <!-- Main JS File -->
    <script src="/assets/js/main.min.js"></script>

    <!-- www.addthis.com share plugin -->
    <script src="https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b927288a03dbde6"></script>
</body>
</html>
		

        
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
                    <img src="/assets/images/logo_pro-gift_chico.png" alt="Logo Pro-Gift">
                </a>
            </div><!-- End .header-left -->

            <div class="header-center">
                <div class="header-search">
                    <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                    <form action="{{ route('home.buscar') }}" method="get" id="form-search">
                        {{ csrf_field() }}
                        <div class="header-search-wrapper">
                            <input type="search" class="form-control" name="q" id="q" placeholder="Buscar..." autocomplete="off" required>
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
                                                    <a href="/products/{{$item->id}}">{{$item->name}}</a>
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
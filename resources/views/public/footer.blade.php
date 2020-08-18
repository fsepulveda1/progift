<footer class="footer">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="widget widget-newsletter">
                        <h4 class="widget-title">NEWSLETTER</h4>

                        <form action="{{ route('home.suscribe') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="email" class="form-control" name="email" placeholder="Ingresa aquí tu correo" required>
                            <input type="hidden" value="1" name="estado"/>
                            <input type="submit" class="btn" value="SUSCRIBIRSE">
                        </form>

                    </div><!-- End .widget -->
                </div><!-- End .col-lg-12 -->
                <div class="col-lg-5">
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

                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="widget">
                                @php
                                    $products = App\ProductQuotationCount::with('products')->orderBy('count','desc')->take(6)->get()
                                @endphp
                                @if($products)
                                    <h4 class="widget-title">PRODUCTOS MÁS COTIZADOS</h4>
                                @endif
                                <div class="row">

                                    @foreach($products as $product)
                                        @php($img = json_decode($product->products->imagen))
                                        <div class="col-6 col-md-2">
                                            <div class="product-details">
                                                <figure>
                                                    <a href="/product/{{$product->products->id}}">
                                                        <img src="{{asset('storage/'.$img[0])}}">
                                                    </a>
                                                </figure>
                                                <p class="product-title">
                                                    <a href="/product/{{$product->products->id}}">
                                                        {{$product->products->nombre}}<br>
                                                        {{$product->products->sku}}
                                                    </a>
                                                </p>
                                            </div><!-- End .product-details -->
                                        </div><!-- End .col-sm-6 -->
                                    @endforeach
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
@extends('public.layout')
@section('title')Resultados de búsqueda | @endsection

@section('content')

    <main class="main">

        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <nav aria-label="breadcrumb" class="breadcrumb-nav">

                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Resultados de búsqueda</a></li>
                        </ol>

                    </nav>
                    <br>
                    <h2>Resultados de búsqueda para "{{$textSearch}}":</h2>
                    <div class="row row-sm product-ajax-grid">
                        @if(count($products) <= 0)
                            <p>No existen porductos relacionados a su busqueda.</p>
                        @endif
                        @foreach($products as $pro)
                            <div class="col-6 col-md-3">
                                <div class="product-default">
                                    <div class="product-details">
                                        <figure>
                                            <a href="/producto/{{$pro->slug}}">
                                                @php
                                                    $image = null;
                                                    $images = json_decode($pro->imagen);
                                                    $main_img = $pro->imagen_principal;
                                                    if($main_img !== null) {
                                                        $image = $main_img;
                                                    }
                                                    else {
                                                        $image = isset($images[0]) ? $images[0] : null;
                                                    }
                                                @endphp
                                                @if($image)
                                                    <img width="100%" src="{{ asset('/storage/'.$image) }}" alt="Producto">
                                                @endif
                                            </a>
                                        </figure>
                                        <h2 class="product-title">
                                            <a href="/producto/{{$pro->slug}}">{{ $pro->nombre }}</a>
                                        </h2>
                                        <div class="price-box">
                                            <span class="product-price">{{ $pro->sku }}</span>
                                        </div><!-- End .price-box -->

                                        <div class="product-action">
                                            <a href="/producto/{{$pro->slug}}" class="btn-icon btn-add-cart"><i class="icon-bag"></i>COTIZAR</a>
                                        </div>
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div><!-- End .col-lg-9 -->

                @include('partials.cat-menu')

            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-5"></div><!-- margin -->
    </main><!-- End .main -->

@endsection

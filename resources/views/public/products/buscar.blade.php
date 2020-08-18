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
                                            <a href="/products/{{$pro->id}}">
                                                <?php $images = json_decode($pro->imagen); ?>
                                                <?php $imageFirst = json_decode($pro->imagen); ?>
                                                <?php $count = 1; ?>
                                                @foreach($images as $image)
                                                    <?php
                                                    if($count == 1){
                                                    $imageFirst = $image;
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
                                            <a href="/products/{{$pro->id}}">{{ $pro->nombre }}</a>
                                        </h2>
                                        <div class="price-box">
                                            <span class="product-price">{{ $pro->sku }}</span>
                                        </div><!-- End .price-box -->

                                        <div class="product-action">
                                            <a href="/products/{{$pro->id}}" class="btn-icon btn-add-cart"><i class="icon-bag"></i>COTIZAR</a>
                                        </div>
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if($lastPage > 1)
                        <div class="col-12 text-center loadmore">
                            <a href="#" class="btn btn-block btn-outline" data-search="{{$textSearch}}" data-more-text="Cargar Más Productos ...">Cargar Más Productos ...</a>
                        </div>
                    @endif
                </div><!-- End .col-lg-9 -->

                @include('partials.cat-menu')

            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-5"></div><!-- margin -->
    </main><!-- End .main -->

@endsection
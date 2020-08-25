@extends('public.layout') @section('content')
@section('title'){{ $product->nombre }} | @endsection

<main class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
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
                <div class="product-single-container product-single-default">
                    <nav aria-label="breadcrumb" class="breadcrumb-nav">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">{{ $product->nombre_categoria }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $product->nombre }}</li>
                        </ol>
                    </nav>
                    <div class="row">
                        <div class="col-lg-7 col-md-6">
                            <div class="product-single-gallery">
                                <div class="product-slider-container product-item">
                                    <div class="product-single-carousel owl-carousel owl-theme">
                                        <?php $images = json_decode($product->imagen); ?>
                                        <?php $imageFirst = json_decode($product->imagen); ?>
                                        <?php $count = 1; ?>
                                        @foreach($images as $image)
                                            <?php
                                            if($count == 1){
                                                $imageFirst=$image;
                                            }
                                            $count++;
                                            ?>
                                            <div class="product-item">
                                                <img class="product-single-image" src="{{ asset('/storage/'.$image) }}" data-zoom-image="{{ asset('/storage/'.$image) }}" />
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- End .product-single-carousel -->
                                    <span class="prod-full-screen">
                                        <i class="icon-plus"></i>
                                    </span>
                                </div>
                                <div class="prod-thumbnail row owl-dots" id='carousel-custom-dots'>
                                    <?php $images = json_decode($product->imagen); ?>
                                    @foreach($images as $image)
                                        <div class="col-3 owl-dot active">
                                            <img src="{{ asset('/storage/'.$image) }}" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- End .product-single-gallery -->
                        </div>
                        <!-- End .col-lg-7 -->

                        <div class="col-lg-5 col-md-6">
                            <div class="product-single-details">
                                <h1 class="product-title">{{$product->nombre}}</h1>

                                <div class="price-box">
                                    CÓDIGO: {{ $product->sku }}
                                </div>
                                <!-- End .price-box -->

                                <div class="product-desc">
                                    <p><b>Descripción</b></p>
                                    {!!$product->descripcion_larga!!}
                                </div>
                                <!-- End .product-desc -->
                                <br/>
                                <div class="product-single-share">
                                    <label>Compartir:</label>
                                    <!-- www.addthis.com share plugin-->
                                    <div class="addthis_inline_share_toolbox"></div>
                                </div>
                                <!-- End .product single-share -->
                                <form action="{{ route('cart.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="product-filters-container">
                                        <div class="product-single-filter">
                                            <select id="color" name="color" required>
                                                <option value="" disabled selected>Color</option>
                                                @foreach($product->colors as $color)
                                                    <option value="{{$color->nombre}}">{{$color->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- End .product-single-filter -->
                                        <div class="product-single-filter">
                                            <select id="impresion" name="impresion" required>
                                                <option value="" disabled selected>Tipo de impresión</option>
                                                @foreach($impresions as $impresion)
                                                    <option value="{{$impresion->nombre}}">{{$impresion->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- End .product-single-filter -->
                                    </div>
                                    <!-- End .product-filters-container -->
                                    <div class="product-action">
                                        <div class="product-single-qty">
                                            <input class="horizontal-quantity form-control" value="100" type="number" id="quantity" name="quantity">
                                        </div>
                                        <!-- End .product-single-qty -->
                                        <input type="hidden" value="{{ $product->id }}" id="id" name="id">
                                        <div class="" style="background-color: white;">
                                            <div class="row">
                                                <button type="submit" class="btn-icon btn-add-cart paction add-cart" class="tooltip-test" title="add to cart">
                                                    <span>COTIZAR</span>
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                <!-- End .product-action -->

                            </div>
                            <!-- End .product-single-details -->
                        </div>
                        <!-- End .col-lg-5 -->
                    </div>
                    <!-- End .row -->
                </div>
                <!-- End .product-single-container -->

                <div class="featured-section pt-sm bg-white">
                    <h2 class="carousel-title">ARTÍCULOS RELACIONADOS</h2>
                    <div class="product-intro">
                        @foreach($products as $pro)
                            <div class="product-default col-sm-6 col-md-3">
                                <div class="product-details" style="display: inline-flex;">
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
                                                <img style="width: 200px;" src="{{ asset('/storage/'.$image) }}" alt="Producto">
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
                                        <a class="btn-icon btn-add-cart add-cart" href="/products/{{$pro->id}}" class="tooltip-test" style="color: #fff;" title="add to cart">
                                            &nbsp;&nbsp; Cotizar
                                        </a>
                                    </div>
                                </div><!-- End .product-details -->
                            </div>

                        @endforeach
                    </div>
                </div>
                <!-- End .featured-section -->
            </div>
            <!-- End .col-lg-9 -->
        @include('partials.cat-menu')
        <!-- End .col-lg-3 -->
        </div>
        <!-- End .row -->

        <div class="mb-lg-4"></div>
        <!-- margin -->
    </div>
    <!-- End .container -->
</main>
<!-- End .main -->

@endsection
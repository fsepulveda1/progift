@extends('public.layout')


@section('content')

<main class="main">

<div class="container">
    <div class="row">
        <div class="col-lg-9">
                        <nav aria-label="breadcrumb" class="breadcrumb-nav">

                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/"><i class="icon-home"></i></a></li>
                                </ol>

                        </nav>
                        <br>
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
                                <!--<button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-bag"></i>COTIZAR</button>-->
                                <!--
                                <form action="{{ route('cart.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $pro->id }}" id="id" name="id">
                                    <input type="hidden" value="{{ $pro->nombre }}" id="name" name="name">
                                    <input type="hidden" value="{{ $pro->precio }}" id="price" name="price">
                                    <input type="hidden" value="{{ $imageFirst }}" id="image" name="image">
                                    <input type="hidden" value="{{ $pro->sku }}" id="slug" name="slug">
                                    <input type="hidden" value="{{$pro->colors[0]->nombre}}" id="color" name="color">
                                    <input type="hidden" value="{{$pro->impresions[0]->nombre}}" id="impresion" name="impresion">
                                    <input type="hidden" value="1" id="quantity" name="quantity">
                                    <div class="card-footer" style="background-color: white;">
                                          <div class="row">
                                            <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                                                <i class="fa fa-shopping-cart"></i> Cotizar
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                -->
                            </div>
                        </div><!-- End .product-details -->
                    </div>
                </div>
                    @endforeach
            </div>

            <!--
            <div class="col-12 text-center loadmore">
                <a href="#" class="btn btn-block btn-outline">Cargar Más ...</a>
            </div>
            -->
        </div><!-- End .col-lg-9 -->

            @include('partials.cat-menu')
    
        </div><!-- End .row -->
</div><!-- End .container -->

<div class="mb-5"></div><!-- margin -->
</main><!-- End .main -->

@endsection
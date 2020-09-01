<div class="row row-sm product-ajax-grid">
    @foreach($products as $pro)
        <div class="col-6 col-md-3">
            <div class="product-default">
                <div class="product-details">
                    <figure>
                        <a href="/producto/{{$pro->slug}}">
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
                        <a href="/producto/{{$pro->slug}}">{{ $pro->nombre }}</a>
                    </h2>
                    <div class="price-box">
                        <span class="product-price">{{ $pro->sku }}</span>
                    </div><!-- End .price-box -->

                    <div class="product-action">
                        <a class="btn-icon btn-add-cart add-cart white" href="/producto/{{$pro->slug}}" style="color: #fff;">
                            &nbsp;&nbsp; Cotizar
                        </a>
                    </div>
                </div><!-- End .product-details -->
            </div>
        </div>
    @endforeach
</div>

<div class="col-lg-3 order-lg-first">
    <div class="side-custom-menu">
        <h2>CATEGORÍAS</h2>

        <div class="side-menu-body">
            <ul>
            @foreach($categories as $cat)
                <li><a href="/categories/{{$cat['id']}}">{{ $cat->nombre }}</a></li>
            @endforeach
            </ul>
        </div><!-- End .side-menu-body -->
    </div><!-- End .side-custom-menu -->
</div><!-- End .col-lg-3 -->
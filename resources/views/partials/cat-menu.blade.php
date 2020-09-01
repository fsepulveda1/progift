<div class="col-lg-3 order-lg-first">
    <div class="side-custom-menu">
        <h2>CATEGORÍAS</h2>

        <div class="side-menu-body">
            <ul>
                <li><a href="/destacados">Destacados</a></li>
                @php
                    $categories = App\Category::where('estado',1)->orderBy('orden', 'ASC')->get();
                @endphp
                @foreach($categories as $cat)
                    <li><a href="/categories/{{$cat['slug']}}">{{ $cat->nombre }}</a></li>
                @endforeach
            </ul>
        </div><!-- End .side-menu-body -->
    </div><!-- End .side-custom-menu -->
</div><!-- End .col-lg-3 -->
<div class="product-ajax-grid">
    @foreach ($posts as $post)
        <article class="entry">
            <div class="entry-media">
                <a href="/tips/{{$post->slug}}">
                    <img width="100%" src="{{ asset('/storage/'.$post->portada) }}" alt="Post">
                </a>
            </div><!-- End .entry-media -->

            <div class="entry-body">

                <h2 class="entry-title">
                    <a href="/tips/{{$post->slug}}">{{$post->titulo}}</a>
                </h2>

                <div class="entry-content">
                    <p>
                        {!! strip_tags(substr($post->contenido, 0, 410)) . '...' !!}
                    </p>
                    <a href="/tips/{{$post->slug}}" class="read-more">Leer Más <i class="icon-angle-double-right"></i></a>
                </div><!-- End .entry-content -->
            </div><!-- End .entry-body -->
        </article><!-- End .entry -->
    @endforeach
</div>


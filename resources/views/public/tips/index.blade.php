@extends('public.layout')
@section('title')Tips | @endsection

@section('content')

    <main class="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <nav aria-label="breadcrumb" class="breadcrumb-nav">
                        <div class="container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/"><i class="icon-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tips</li>
                            </ol>
                        </div><!-- End .container -->
                    </nav>
                    <br>
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
                    @if($lastPage > 1)
                        <div class="col-12 text-center loadmore">
                            <a href="#" class="btn btn-block btn-outline" data-more-text="Cargar Más ...">Cargar Más ...</a>
                        </div>
                    @endif
                </div><!-- End .col-lg-9 -->
                @include('partials.cat-menu')

            </div>
        </div>
    </main>
@endsection
            
                
       


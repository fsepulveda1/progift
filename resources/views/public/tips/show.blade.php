@extends('public.layout')
@section('title'){{$post->titulo}} | @endsection

@section('content')
	<main class="main">
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<nav aria-label="breadcrumb" class="breadcrumb-nav">
						<div class="container">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
								<li class="breadcrumb-item active" aria-current="page">Tips</li>
							</ol>
						</div><!-- End .container -->
					</nav>
					<br>
					<article class="entry single">
						<div class="entry-media">
							<a href="">
								<img src="{{ asset('/storage/'.$post->portada) }}" alt="Post">
							</a>
						</div><!-- End .entry-media -->

						<div class="entry-body">

							<h2 class="entry-title">
								{{$post->titulo}}
							</h2>

							<div class="entry-content">
								{!!$post->contenido!!}
							</div><!-- End .entry-content -->


						</div><!-- End .entry-body -->
					</article><!-- End .entry -->

				</div><!-- End .col-lg-9 -->
				@include('partials.cat-menu')
			</div><!-- End .row -->
		</div><!-- End .container -->
	</main>

@endsection
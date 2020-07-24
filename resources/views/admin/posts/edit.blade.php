@extends('admin.layout')


@section('content')


<body class="">
	@include('admin.nav.index')
	<div class="main-content">
		<!-- Navbar -->
		@include('admin.nav.navbar')
		<!-- End Navbar -->
		<!-- Header -->
		<div class="header bg-gradient-progift pb-8 pt-5 pt-md-8">
			<div class="container-fluid">
				<div class="header-body">

				</div>
			</div>
		</div>
		<div class="container-fluid mt--7">
			<div class="row">
				<div class="col-xl-12 order-xl-1">
					<div class="card bg-secondary shadow">
						<div class="card-header bg-white border-0">
							<div class="row align-items-center">
								<div class="col-8">
									<h3 class="mb-0">Editar Post</h3>
								</div>
								<div class="col-4 text-right">
									<a href="#!" class="btn btn-sm btn-success">Listar Todos</a>
								</div>
							</div>
						</div>
						<div class="card-body">
						@if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li> 
                                    @endforeach
                                </ul>
                            </div>
                        @endif
						<form method="POST" action="/posts/{{ $post->id }}" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf()
								<h6 class="heading-small text-muted mb-4">Información Post</h6>
								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-4">
										<div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" class="form-control" id="title" placeholder="Title..." value="{{ $post->title }}">
                                        </div>
										</div>
										<div class="col-lg-4">
										<div class="form-group">
                                        <label for="image">Select Image</label>
                                            <input type="file" name="image" class="form-control-file" id="profile-img" value="{{$post->image}}">
                                            <div class="row">
                                                <img src="{{ asset('/storage/images/posts_images/'.$post->image_url) }}" id="profile-img-tag" class="img-thumbnail mx-auto" alt="{{$post->image_url}}" width="250" >
                                            </div>
										</div>
										</div>
										<div class="col-lg-12">
										<div class="form-group">
                                            <label for="content">Insert Content</label>
                                            <textarea name="post_content" id="content">{{ $post->content }}</textarea>
                                        </div>
										</div>
									</div>
								</div>

								
								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-10">
											
										</div>
										<div class="form-group pt-2">
											<input class="btn btn-primary" type="submit" value="Submit">
										</div>
									</div>
								</div>
							</form>
                            
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <script>
                                    
        CKEDITOR.replace( 'post_content' );

        $(function() {

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    
                    reader.onload = function (e) {
                        $('#profile-img-tag').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            
            $("#profile-img").change(function(){
                readURL(this);
            });

        });

    </script>
@endsection
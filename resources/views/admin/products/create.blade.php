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
									<h3 class="mb-0">Nuevo Producto</h3>
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
						<form method="POST" action="/products" enctype="multipart/form-data">
    					{{ csrf_field() }}
								<h6 class="heading-small text-muted mb-4">Información Producto</h6>
								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-4">
										<div class="form-group">
											<label for="name">Nombre</label>
											<input type="text" name="name" class="form-control" id="name" placeholder="nombre..." value="{{ old('name') }}">
										</div>
                                        </div>
                                        <div class="col-lg-4">
										<div class="form-group">
											<label for="slug">Slug</label>
											<input type="text" name="slug" class="form-control" id="slug" placeholder="slug..." value="{{ old('slug') }}">
										</div>
                                        </div>
                                        <div class="col-lg-4">
										<div class="form-group">
											<label for="details">Detalles</label>
											<input type="text" name="details" class="form-control" id="details" placeholder="detalles..." value="{{ old('details') }}">
										</div>
                                        </div>
                                        <div class="col-lg-4">
										<div class="form-group">
											<label for="price">Precio</label>
											<input type="text" name="price" class="form-control" id="price" placeholder="precio..." value="{{ old('price') }}">
										</div>
                                        </div>
                                        <div class="col-lg-4">
										<div class="form-group">
											<label for="shipping_cost">Consto Envío</label>
											<input type="text" name="shipping_cost" class="form-control" id="shipping_cost" placeholder="costo envío..." value="{{ old('shipping_cost') }}">
										</div>
                                        </div>
                                        <div class="col-lg-4">
										<div class="form-group">
											<label for="category_id">Categoria</label>
											<input type="text" name="category_id" class="form-control" id="category_id" placeholder="categoria..." value="{{ old('category_id') }}">
										</div>
                                        </div>
                                        <div class="col-lg-4">
										<div class="form-group">
											<label for="brand_id">Marca</label>
											<input type="text" name="brand_id" class="form-control" id="brand_id" placeholder="marca..." value="{{ old('brand_id') }}">
										</div>
										</div>
										<div class="col-lg-4">
										<div class="form-group">
											<label for="image">Select Image</label>
											<input type="file" name="image" class="form-control-file" id="image">
										</div>
										</div>
										<div class="col-lg-12">
										<div class="form-group">
											<label for="descripcion">Descripción</label>
											<textarea name="descripcion" id="descripcion">{{ old('descripcion') }}</textarea>
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
		CKEDITOR.replace( 'descripcion' );
	</script>
@endsection
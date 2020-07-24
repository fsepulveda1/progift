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
									<h3 class="mb-0">Nueva Categoría</h3>
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
						<form method="POST" action="/categories" enctype="multipart/form-data">
    					{{ csrf_field() }}
								<h6 class="heading-small text-muted mb-4">Información Categoría</h6>
								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-5">
										<div class="form-group">
											<label for="nombre">Nombre</label>
											<input type="text" name="nombre" class="form-control" id="nombre" placeholder="nombre..." value="{{ old('nombre') }}">
										</div>
										</div>
										<div class="col-lg-5">
										<div class="form-group">
											<label for="image">Select Image</label>
											<input type="file" name="image" class="form-control-file" id="image">
										</div>
										</div>
                                        <div class="col-lg-5">
										<div class="form-group">
											<label for="orden">Orden</label>
											<input type="text" name="orden" class="form-control" id="orden" placeholder="orden..." value="{{ old('orden') }}">
										</div>
										</div>
                                        <div class="col-lg-5">
										<div class="form-group">
											<label for="estado">estado</label>
											<!--<input type="text" name="estado" class="form-control" id="estado" placeholder="estado..." value="{{ old('estado') }}">-->
										
                                            <select name="estado" class="form-control" id="estado" placeholder="estado...">
                                                <option value="0" > Activa </option> 
                                                <option value="1" > Inactiva </option> 
                                            </select>
                                        </div>
										</div>
										<div class="col-lg-12">
										<div class="form-group">
											<label for="descripcion">Descripcion</label>
											<textarea name="category_descripcion" id="descripcion">{{ old('category_descripcion') }}</textarea>
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
		CKEDITOR.replace( 'category_descripcion' );
	</script>
@endsection
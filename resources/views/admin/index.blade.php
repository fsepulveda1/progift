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
					<div class="row">
						<div class="col-xl-3 col-lg-6">
							<div class="card card-stats mb-4 mb-xl-0">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted mb-0">Monto Total</h5>
											<span class="h2 font-weight-bold mb-0 "><strong class="money">120000000</strong></span>
										</div>
										<div class="col-auto">
											<div class="icon icon-shape bg-danger text-white rounded-circle shadow">
												<i class="fas fa-chart-bar"></i>
											</div>
										</div>
									</div>
									<p class="mt-3 mb-0 text-muted text-sm">
										<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
										<span class="text-nowrap">Desde el mes pasado</span>
									</p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6">
							<div class="card card-stats mb-4 mb-xl-0">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted mb-0">Clientes</h5>
											<span class="h2 font-weight-bold mb-0">1000</span>
										</div>
										<div class="col-auto">
											<div class="icon icon-shape bg-warning text-white rounded-circle shadow">
												<i class="fas fa-chart-pie"></i>
											</div>
										</div>
									</div>
									<p class="mt-3 mb-0 text-muted text-sm">
										<span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
										<span class="text-nowrap">Desde el mes pasado</span>
									</p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6">
							<div class="card card-stats mb-4 mb-xl-0">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted mb-0">Ventas</h5>
											<span class="h2 font-weight-bold mb-0">924</span>
										</div>
										<div class="col-auto">
											<div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
												<i class="fas fa-users"></i>
											</div>
										</div>
									</div>
									<p class="mt-3 mb-0 text-muted text-sm">
										<span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
										<span class="text-nowrap">Desde el mes pasado</span>
									</p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6">
							<div class="card card-stats mb-4 mb-xl-0">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted mb-0">Total Ventas</h5>
											<span class="h2 font-weight-bold mb-0 "><strong class="money">45000000</strong></span>
										</div>
										<div class="col-auto">
											<div class="icon icon-shape bg-info text-white rounded-circle shadow">
												<i class="ni ni-money-coins"></i>
											</div>
										</div>
									</div>
									<p class="mt-3 mb-0 text-muted text-sm">
										<span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
										<span class="text-nowrap">Desde el mes pasado</span>
									</p>
								</div>
							</div>
						</div>
					</div>
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
									<h3 class="mb-0">Nueva Cotización</h3>
								</div>
								<div class="col-4 text-right">
									<a href="#!" class="btn btn-sm btn-success">Listar Todas</a>
								</div>
							</div>
						</div>
						<div class="card-body">
							<form>
								<h6 class="heading-small text-muted mb-4">Información cliente</h6>
								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-username">Nombre</label>
												<input type="text" id="name" class="form-control form-control-alternative" placeholder="Javier Sepulveda" value="">
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-validez">Validez de la cotización</label>
												<input type="text" id="validez" class="form-control form-control-alternative" placeholder="10" value="">
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-empresa">Empresa Cliente</label>
												<input type="text" id="empresa" class="form-control form-control-alternative" placeholder="Lata Digital" value="">
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-pay">Forma de Pago</label>
												<input type="text" id="paym" class="form-control form-control-alternative" placeholder="A convenir" value="">
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-email">Email Cliente</label>
												<input type="email" id="input-email" class="form-control form-control-alternative" placeholder="jesse@example.com">
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-term">Plazo de Entrega</label>
												<input type="text" id="term" class="form-control form-control-alternative" placeholder="A convenir" value="">
											</div>
										</div>
									</div>
								</div>
								<hr class="my-4" />
								<!-- Address -->
								<h6 class="heading-small text-muted mb-4">Productos</h6>
								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-2">
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">Producto</label>
												<input class="form-control form-control-alternative" type="search" value="Busca por sku/nombre..." id="example-search-input">
											</div>
										</div>
										<div class="col-lg-1">
											<div class="form-group">
												<label class="form-control-label" for="input-country">Color</label>
												<select class="form-control form-control-alternative" id="exampleFormControlSelect1">
													<option value="AZUL">0</option>
													<option value="AZUL">AZUL</option>
													<option value="ROJO">ROJO</option>
													<option value="AMARILLO">AMARILLO</option>
													<option value="TURQUESA">TURQUESA</option>
													<option value="CELESTE">CELESTE</option>
													<option value="FUCSIA">FUCSIA</option>
												  </select>
											</div>
										</div>
										<div class="col-lg-1">
											<div class="form-group">
												<label for="exampleFormControlSelect1">Imp.</label>
												<select class="form-control form-control-alternative" id="exampleFormControlSelect1">
												  <option>0</option>
												  <option>4/4</option>
												  <option>4/0</option>
												</select>
											</div>
										</div>
										<div class="col-lg-2">
											<div class="form-group">
												<label class="form-control-label" for="input-country">Imágen</label>
												<form>
													<div class="custom-file">
														<input type="file" class="custom-file-input" id="customFileLang" lang="es">
														<label class="custom-file-label" for="customFileLang">Foto</label>
													</div>
												</form>
											</div>
										</div>
										<div class="col-lg-1">
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">Cantidad</label>
												<input type="text" id="name" class="form-control form-control-alternative" placeholder="0" value="">
											</div>
										</div>
										<div class="col-lg-2">
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">Valos Unitario</label>
												<input type="text" id="name" class="form-control form-control-alternative money" placeholder="0" value="">
											</div>
										</div>
										<div class="col-lg-2">
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">IVA</label>
												<input type="text" id="name" class="form-control form-control-alternative money" placeholder="0" value="">
											</div>
										</div>
									</div>
								</div>
								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-6">
											
										</div>
										<div class="col-lg-1">
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">Cantidad</label>
												<input type="text" id="name" class="form-control form-control-alternative" placeholder="0" value="">
											</div>
										</div>
										<div class="col-lg-2">
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">Valos Unitario</label>
												<input type="text" id="name" class="form-control form-control-alternative money" placeholder="0" value="">
											</div>
										</div>
										<div class="col-lg-2">
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">IVA</label>
												<input type="text" id="name" class="form-control form-control-alternative money" placeholder="0" value="">
											</div>
										</div>
										<div class="col-lg-1">
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">Eliminar</label>
												<button type="button" class="btn btn-danger">
													<span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>
												</button>
											</div>
										</div>
									</div>
								</div>
								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-6">
											
										</div>
										<div class="col-lg-1">
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">Cantidad</label>
												<input type="text" id="name" class="form-control form-control-alternative" placeholder="0" value="">
											</div>
										</div>
										<div class="col-lg-2">
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">Valos Unitario</label>
												<input type="text" id="name" class="form-control form-control-alternative money" placeholder="0" value="">
											</div>
										</div>
										<div class="col-lg-2">
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">IVA</label>
												<input type="text" id="name" class="form-control form-control-alternative money" placeholder="0" value="">
											</div>
										</div>
										<div class="col-lg-1">
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">Eliminar</label>
												<button type="button" class="btn btn-danger">
													<span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>
												</button>
											</div>
										</div>
									</div>
								</div>

								<hr class="my-4" />
								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-2">
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">Producto</label>
												<input class="form-control form-control-alternative" type="search" value="Busca por sku/nombre..." id="example-search-input">
											</div>
										</div>
										<div class="col-lg-1">
											<div class="form-group">
												<label class="form-control-label" for="input-country">Color</label>
												<select class="form-control form-control-alternative" id="exampleFormControlSelect1">
													<option value="AZUL">0</option>
													<option value="AZUL">AZUL</option>
													<option value="ROJO">ROJO</option>
													<option value="AMARILLO">AMARILLO</option>
													<option value="TURQUESA">TURQUESA</option>
													<option value="CELESTE">CELESTE</option>
													<option value="FUCSIA">FUCSIA</option>
												  </select>
											</div>
										</div>
										<div class="col-lg-1">
											<div class="form-group">
												<label for="exampleFormControlSelect1">Imp.</label>
												<select class="form-control form-control-alternative" id="exampleFormControlSelect1">
												  <option>0</option>
												  <option>4/4</option>
												  <option>4/0</option>
												</select>
											</div>
										</div>
										<div class="col-lg-2">
											<div class="form-group">
												<label class="form-control-label" for="input-country">Imágen</label>
												<form>
													<div class="custom-file">
														<input type="file" class="custom-file-input" id="customFileLang" lang="es">
														<label class="custom-file-label" for="customFileLang">Foto</label>
													</div>
												</form>
											</div>
										</div>
										<div class="col-lg-1">
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">Cantidad</label>
												<input type="text" id="name" class="form-control form-control-alternative" placeholder="0" value="">
											</div>
										</div>
										<div class="col-lg-2">
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">Valos Unitario</label>
												<input type="text" id="name" class="form-control form-control-alternative money" placeholder="0" value="">
											</div>
										</div>
										<div class="col-lg-2">
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">IVA</label>
												<input type="text" id="name" class="form-control form-control-alternative money" placeholder="0" value="">
											</div>
										</div>
										<div class="col-lg-1">
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">Eliminar</label>
												<button type="button" class="btn btn-danger">
													<span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>
												</button>
											</div>
										</div>
									</div>
									
								</div>
								<hr class="my-4" />

								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-11">
											
										</div>
										
										
										<div class="col-lg-1">
											<div class="form-group">
												<button type="button" class="btn btn-success mt-4">
													<span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
												</button>
											</div>
										</div>
									</div>
								</div>


								<hr class="my-4"/>
								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-9">
											
										</div>
										<div class="col-lg-1">
											<label for="example-search-input" class="form-control-label">Activar</label>
											<label class="custom-toggle mt-2">
												<input type="checkbox" checked>
												<span class="custom-toggle-slider rounded-circle"></span>
											  </label>
										</div>
										
										<div class="col-lg-2">
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">% Descuento</label>
												<input type="text" id="name" class="form-control form-control-alternative" placeholder="0" value="">
											</div>
										</div>
									</div>
								</div>

								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-9">
											
										</div>
										<div class="col-lg-1">
											<label for="example-search-input" class="form-control-label">Activar</label>
											<label class="custom-toggle mt-2">
												<input type="checkbox" checked>
												<span class="custom-toggle-slider rounded-circle"></span>
											  </label>
										</div>
										
										<div class="col-lg-2">
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">Neto</label>
												<input type="text" id="name" class="form-control form-control-alternative money" placeholder="0" value="">
											</div>
										</div>
									</div>
								</div>

								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-9">
											
										</div>
										<div class="col-lg-1">
											<label for="example-search-input" class="form-control-label">Activar</label>
											<label class="custom-toggle mt-2">
												<input type="checkbox" checked>
												<span class="custom-toggle-slider rounded-circle"></span>
											  </label>
										</div>
										
										<div class="col-lg-2">
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">IVA</label>
												<input type="text" id="name" class="form-control form-control-alternative money" placeholder="0" value="">
											</div>
										</div>
									</div>
								</div>

								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-9">
											
										</div>
										<div class="col-lg-1">
											<label for="example-search-input" class="form-control-label">Activar</label>
											<label class="custom-toggle mt-2">
												<input type="checkbox" checked>
												<span class="custom-toggle-slider rounded-circle"></span>
											  </label>
										</div>
										
										<div class="col-lg-2">
											<div class="form-group">
												<label for="example-search-input" id="number" class="form-control-label FormatNumer">Total</label>
												<input type="text" id="name" class="form-control form-control-alternative money" placeholder="0" value="">
											</div>
										</div>
									</div>
								</div>
								<hr class="my-4"/>	
								
								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-10">
											
										</div>
										<div class="col-lg-2">
											<button type="button" class="btn btn-success">Guardar</button>
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
@endsection
@extends('admin.layout')

@section('css')
	<link href="/assets_admin/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
@endsection

@section('content')


	<div class="main-content">

		<div class="header bg-gradient-progift pb-8 pt-5 pt-md-8">
			<br/>
			<br/>
		</div>
		<div class="mx-md-5 mt--7">
			<div class="row">
				<div class="col-xl-12 order-xl-1">
					<div class="card bg-secondary shadow">
						<div class="card-header bg-white border-0">
							<div class="row align-items-center">
								<div class="col-md-8 col-12">
									<h3 class="mb-0">Nueva Cotización</h3>
								</div>
								<div class="col-md-4 col-12 text-right">
									<a href="{{ url('admin/cotizaciones') }}" class="btn btn-sm btn-success">Histórico Cotizaciones</a>
								</div>
							</div>
						</div>
						<div class="card-body">
							<form action="{{ route('admin.cotiza') }}"
								  method="POST"
								  enctype="multipart/form-data"
								  id="cotization_form"
								  data-colors="{{$colors}}"
								  data-impresions="{{$impresions}}">

								<h6 class="heading-small text-muted mb-4">Información cliente</h6>
								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-empresa">Empresa Cliente</label>
												<input max="250" type="text" name="empresa" class="form-control form-control-alternative" placeholder="Nombre Empresa" value="" required>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-username">RUT</label>
												<input max="13" type="text" name="rut" class="form-control form-control-alternative rut" placeholder="22222222-2" value="" oninput="checkRut(this)" required>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-username">Contacto</label>
												<input max="250" type="text" name="nombre_cliente" class="form-control form-control-alternative" placeholder="Nombre Cliente" value="" required>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-email">Email</label>
												<input max="100" type="email" name="email" class="form-control form-control-alternative" placeholder=" ejemplo@empresa.cl" required>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-pay">Forma de Pago</label>
												<input max="100" type="text" name="forma_pago" class="form-control form-control-alternative" placeholder="A convenir" value="A convenir" required>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-term">Plazo de Entrega</label>
												<input max="100" type="text" name="plazo" class="form-control form-control-alternative" placeholder="A convenir" value="A convenir" required>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-validez">Validez de la cotización</label>
												<input max="250" type="text" name="validez" class="form-control form-control-alternative" placeholder="10 días" value="" required>
											</div>
										</div>
									</div>
								</div>
								<hr class="my-4" />
								<!-- Address -->
								<h6 class="heading-small text-muted mb-4">Productos</h6>

								<div class="pl-lg-4 pduct">
									<div class="row">
										<div class="col-lg-7">
												<div class="row">
													<div class="col-lg-4 mb-0">
														<div class="form-group mb-lg-0">
															<label for="example-search-input" class="form-control-label">Producto</label>
															<input type="hidden" name="producto[0][id]" id="id"/>
															<input class="form-control form-control-alternative search" autocomplete="off" type="search" placeholder="Producto" id="nombre" name="producto[0][nombre]" required>
														</div>
														<div class="form-group mb-lg-0 mt-1">
															<input class="form-control form-control-alternative sku" autocomplete="off" type="text" placeholder="Código" id="sku" name="producto[0][sku]" required>
														</div>
														<div class="form-group mb-lg-0 mt-1">
															<textarea name="producto[0][descripcion]" placeholder="descripción" id="descripcion" class="form-control form-control-alternative descripcion textarea richTextBox" rows="2"></textarea>
														</div>
													</div>

													<div class="col-lg-3 mb-0">
														<div class="form-group mb-lg-0">
															<label class="form-control-label" for="input-country">Color</label>
															<input type="text" name="producto[0][id]" class="form-control form-control-alternative color">
														</div>
													</div>
													<div class="col-lg-3">
														<div class="form-group mb-lg-0">
															<label class="form-control-label" for="exampleFormControlSelect1">Impresión</label>
															<input name="producto[0][impresion]" id="impresion" class="form-control form-control-alternative impresion">
														</div>
													</div>
													<div class="col-lg-2">
														<div class="form-group">
															<label class="form-control-label" for="input-country">Imágen</label>
															<div class="custom-file">
																<div class="file-widget">
																	<input type="file" class="custom-file-input" name="producto[0][file_imagen]" lang="es">
																	<label class="custom-file-label text-left">Foto</label>
																</div>
																<input type="hidden" name="producto[0][imagen]" id="imagen" class="himagen"/>
																<img src="" class="imagen" style="width: 65px;"/>
															</div>
														</div>
													</div>

												</div>
										</div>
										<div class="col-lg-5">
												<div class="row">
													<div class="col-lg-3 mb-lg-0">
														<div class="form-group">
															<label for="example-search-input" class="form-control-label">Cantidad</label>
															<input type="number" name="producto[0][cantidad][]" id="cantidad" class="form-control form-control-alternative cantidad" placeholder="0" required>
														</div>
													</div>
													<div class="col-lg-3 mb-lg-0">
														<div class="form-group">
															<input type="hidden" id="precio_unitario" class="precio_unitario"/>
															<label for="example-search-input" class="form-control-label">Valor Unitario</label>
															<input type="number" name="producto[0][precio][]" id="precio" class="form-control form-control-alternative money precio" placeholder="0" required>
														</div>
													</div>
													<div class="col-lg-3 mb-lg-0">
														<div class="form-group">
															<label for="example-search-input" class="form-control-label">Total</label>
															<input type="number" name="producto[0][suma][]" id="precio_suma" class="form-control form-control-alternative money precio_suma" placeholder="0" readonly required>
														</div>
													</div>
													<div class="col-lg-3 mb-lg-0">
														<div class="form-group">
															<input type="hidden" class="orden" value="0"/>
															<input type="hidden" id="p_u" class="p_u"/>
															<label for="example-search-input" class="form-control-label">Acciones</label>
															<div class="d-flex">
																<button data-toggle="tooltip" title="Eliminar datos" type="button" class="btn btn-sm btn-danger btn-sm btn-reset-producto">
																	<span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>
																</button>
																<button data-toggle="tooltip" title="Agregar cantidad" type="button" class="btn btn-sm btn-success btn-agrega_cant">
																	<span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
																</button>
															</div>
														</div>
													</div>
												</div>
												<div class="cant-add">

												</div>
										</div>
									</div>
								</div>

								<hr class="my-4" />
								<div class="pl-lg-4 nuevos_productos">

								</div>
								<div class="pl-lg-4">
									<div class="row justify-content-end">
										<div class="col-lg-1">
											<div class="form-group">
												<button data-toggle="tooltip" title="Agregar Producto" type="button" class="btn btn-success mt-4 btn-agrega_producto">
													<span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
												</button>
											</div>
										</div>
									</div>
								</div>
								<div class="pl-lg-4">
									<div class="row justify-content-end">
										<div class="col-lg-1">
											<label for="example-search-input" class="form-control-label">Activar</label>
											<label class="custom-toggle mt-2">
												<input type="checkbox" checked name="activar_descuento">
												<span class="custom-toggle-slider rounded-circle"></span>
											</label>
										</div>

										<div class="col-lg-2">
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">% Descuento</label>
												<input type="text" id="descuento" name="descuento" class="form-control form-control-alternative" placeholder="0" value="0">
											</div>
										</div>
									</div>
								</div>

								<div id="total-fields">
									<div class="pl-lg-4">
										<div class="row justify-content-end">
											<div class="col-lg-1">
												<label for="example-search-input" class="form-control-label">Activar</label>
												<label class="custom-toggle mt-2">
													<input type="checkbox" name="activar_totales" checked>
													<span class="custom-toggle-slider rounded-circle"></span>
												</label>
											</div>

											<div class="col-lg-2">
												<div class="form-group">
													<label for="example-search-input" class="form-control-label">Neto</label>
													<input type="number" id="neto" name="neto" class="form-control form-control-alternative money neto" placeholder="0" readonly>
												</div>
											</div>
										</div>
									</div>

									<div class="pl-lg-4">
										<div class="row justify-content-end">
											<div class="col-lg-2">
												<div class="form-group">
													<label for="example-search-input" class="form-control-label">IVA</label>
													<input type="number" id="iva" name="iva" class="form-control form-control-alternative money iva" placeholder="0" readonly>
												</div>
											</div>
										</div>
									</div>
								</div>


								<div class="pl-lg-4">
									<div class="row justify-content-end">
										<div class="col-lg-2">
											<div class="form-group">
												<label for="example-search-input" id="number" class="form-control-label FormatNumer">Total</label>
												<input type="number" id="total" name="total" class="form-control form-control-alternative money total" placeholder="0" readonly>
											</div>
										</div>
									</div>
								</div>
								<hr class="my-4"/>

								<div class="pl-lg-4">
									<div class="d-dlex justify-content-end">
										<div style="text-align: right;">
											<button type="submit" class="btn btn-success" onclick="$('form').attr('target', '');$('form').attr('action', '/admin/cotiza/nueva/guarda');">Guardar</button>
											<button class="btn btn-danger" onclick="$('form').attr('target', '_blank');$('form').attr('action', '/admin/genera');">PDF</button>
											<button type="submit" class="btn btn-warning" onclick="$('form').attr('target', '');$('form').attr('action', '/admin/cotiza');">Enviar Cotización a e-mail Cliente</button>
										</div>
									</div>
								</div>
								{{ csrf_field() }}
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@section('javascript')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
	<script src="/assets_admin/js/cotizations.js" type="text/javascript"></script>
@endsection
@endsection
@extends('admin.layout')


@section('content')

	<!-- Favicon -->
	{{--<link href="/assets_admin/img/brand/favicon.png" rel="icon" type="image/png">--}}
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<!-- Icons -->
	<link href="/assets_admin/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
	<link href="/assets_admin/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
	<link href="/assets_admin/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />

	<div class="main-content">

		<div class="header bg-gradient-progift pb-8 pt-5 pt-md-8">
			<br/>
			<br/>
		</div>
		<div class="container-fluid mt--7">
			<div class="row">
				<div class="col-xl-12 order-xl-1">
					<div class="card bg-secondary shadow">
						<div class="card-header bg-white border-0">
							<div class="row align-items-center">
								<div class="col-8">
									<h3 class="mb-0">Editando Cotización ID: {{$cotizacion->id}}</h3>
								</div>
								<div class="col-4 text-right">
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
								<input type="hidden" name="id" value="{{$cotizacion->id}}"/>
								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-empresa">Empresa Cliente</label>
												<input type="text" name="empresa" readonly="readonly" class="form-control form-control-alternative" placeholder="Nombre Empresa" value="{{$cliente->nombre}}" required>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-username">RUT</label>
												<input type="text" name="rut" readonly="readonly" class="form-control form-control-alternative" placeholder="22222222-2" value="{{$cliente->rut}}" oninput="checkRut(this)" required>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-username">Contacto</label>
												<input type="text" name="nombre_cliente" readonly="readonly" class="form-control form-control-alternative" placeholder="Nombre Cliente" value="{{$cliente->contacto}}" required>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-email">Email</label>
												<input type="email" name="email" readonly="readonly" class="form-control form-control-alternative" value="{{$cliente->email}}" placeholder="ejemplo@empresa.cl" required>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-pay">Forma de Pago</label>
												<input type="text" name="forma_pago" class="form-control form-control-alternative" placeholder="A convenir" value="{{$cotizacion->forma_pago}}" required>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-term">Plazo de Entrega</label>
												<input type="text" name="plazo" class="form-control form-control-alternative" placeholder="A convenir" value="{{$cotizacion->entrega}}" required>
												<input type="hidden" name="tipo" id="tipo" value="Normal">
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-validez">Validez de la cotización</label>
												<input type="text" name="validez" class="form-control form-control-alternative" placeholder="10 días" value="{{$cotizacion->validez}}" required>
											</div>
										</div>
									</div>
								</div>
								<hr class="my-4" />
								<!-- Address -->
								<h6 class="heading-small text-muted mb-4">Productos</h6>

								@php $detalle = json_decode($cotizacion->detalle, true); @endphp
								@foreach ($detalle as $key => $d)
									@php $cnt = $key; @endphp
									<div class="pl-lg-4 pduct">
										<div class="row">
											<div class="col-lg-6">
												<fieldset>
													<h6 class="heading-small text-muted mb-4">Detalle</h6>
													<div class="row">
														<div class="col-lg-4 mb-0">
															<div class="form-group mb-lg-0">
																<label for="example-search-input" class="form-control-label">Producto</label>
																<input type="hidden" name="producto[{{$cnt}}][id]" id="id"/>
																<input class="form-control form-control-alternative search" autocomplete="off" type="search" placeholder="Busca por sku/nombre..." id="nombre" name="producto[{{$cnt}}][nombre]" value="{{$d['nombre']}}" required>
															</div>
														</div>
														<div class="col-lg-2 mb-0">
															<div class="form-group mb-lg-0">
																<label for="example-search-input" class="form-control-label">SKU</label>
																<input class="form-control form-control-alternative sku" autocomplete="off" type="text" placeholder="SKU" id="sku" value="{{$d['sku']}}" name="producto[{{$cnt}}][sku]" required>
															</div>
														</div>
														<div class="col-lg-3 mb-0">
															<div class="form-group mb-lg-0">
																<label class="form-control-label" for="input-country">Color</label>
																@php $colors = App\Color::all(); @endphp
																<select name="producto[{{$cnt}}][color]" id="color" required class="form-control form-control-alternative color">
																	<option value=""></option>
																	@foreach($colors as $color)
																		<option value="{{ $color->nombre }}" @if($d['color'] == $color->nombre) selected @endif>
																			{{$color->nombre}}
																		</option>
																	@endforeach
																</select>
															</div>
														</div>
														<div class="col-lg-3">
															<div class="form-group mb-lg-0">
																<label class="form-control-label" for="exampleFormControlSelect1">Impresión</label>
																@php $impresions = App\Impresion::all(); @endphp
																<select name="producto[{{$cnt}}][impresion]" id="impresion" class="form-control form-control-alternative">
																	<option value=""></option>
																	@foreach($impresions as $impresion)
																		<option value="{{$impresion->nombre}}" @if($d['imprenta'] == $impresion->nombre) selected @endif>
																			{{$impresion->nombre}}
																		</option>
																	@endforeach
																</select>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-4">
															<div class="form-group">
																<label class="form-control-label" for="input-country">Imágen</label>
																<div class="custom-file">
																	<div class="file-widget @if( !empty($d['imagen'])) hide @endif">
																		<input type="file" class="custom-file-input" value="{{$d['imagen']}}" name="producto[{{$cnt}}][file_imagen]" lang="es">
																		<label class="custom-file-label text-left">Foto</label>
																	</div>
																	<input type="hidden" name="producto[{{$cnt}}][imagen]" id="imagen" class="himagen"/>
																	<img src="{{$d['imagen']}}" class="imagen" style="width: 65px;"/>
																</div>
															</div>
														</div>
														<div class="col-lg-8">
															<div class="form-group">
																<label class="form-control-label" for="descripcion">Descripción</label>
																<textarea name="producto[{{$cnt}}][descripcion]" id="descripcion" class="form-control form-control-alternative desciprion" rows="2">@if(isset($d['descripcion'])){{$d['descripcion']}}@endif</textarea>
															</div>
														</div>
													</div>
												</fieldset>
											</div>
											<div class="col-lg-6">
												<fieldset>
													<h6 class="heading-small text-muted mb-4">Cantidades</h6>
													<div class="row">
														<div class="col-lg-2 mb-lg-0">
															<div class="form-group">
																<label for="example-search-input" class="form-control-label">Cantidad</label>
																<input type="number" value="{{$d['cantidad'][0]}}" name="producto[{{$cnt}}][cantidad][]" id="cantidad" class="form-control form-control-alternative cantidad" placeholder="0" required>
															</div>
														</div>
														<div class="col-lg-4 mb-lg-0">
															<div class="form-group">
																<input type="hidden" id="precio_unitario" class="precio_unitario"/>
																<label for="example-search-input" class="form-control-label">Valor Unitario</label>
																<input type="number" value="{{$d['precio'][0]}}" name="producto[{{$cnt}}][precio][]" id="precio" class="form-control form-control-alternative money precio" placeholder="0" required>
															</div>
														</div>
														<div class="col-lg-4 mb-lg-0">
															<div class="form-group">
																<label for="example-search-input" class="form-control-label">Total</label>
																<input type="number" value="{{$d['suma'][0]}}" name="producto[{{$cnt}}][suma][]" id="precio_suma" class="form-control form-control-alternative money precio_suma" placeholder="0" required readonly>
															</div>
														</div>
														<div class="col-lg-2 mb-lg-0">
															<div class="form-group">
																<input type="hidden" class="orden" value="{{$cnt}}"/>
																<label for="example-search-input" class="form-control-label">Agregar</label>
																<button type="button" class="btn btn-success d-{{str_replace(' ', '', $d['nombre'])}} btn-agrega_cant">
																	<span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
																</button>
															</div>
														</div>
													</div>
													@php
														$clase = 'd-'.str_replace(' ', '', $d['nombre']);
													@endphp
													<div class="cant-add">

														@if (is_array($d['cantidad']))
															@foreach($d['cantidad'] as $key => $cantidad)
																@if($key != 0)
																	@php
																		$num = rand(1, 9999);
																	@endphp
																	<div class="row" id="{{$num}}">
																		<div class="col-lg-2 mb-lg-0">
																			<div class="form-group">
																				<label for="example-search-input" class="form-control-label">Cantidad</label>
																				<input type="number" value="{{$cantidad}}" name="producto[{{$cnt}}][cantidad][]" id="cantidad" class="form-control form-control-alternative cantidad" placeholder="0" required="" />
																			</div>
																		</div>
																		<div class="col-lg-4 mb-lg-0">
																			<div class="form-group">
																				<input type="hidden" id="precio_unitario" class="precio_unitario" /><label for="example-search-input" class="form-control-label">Valor Unitario</label>
																				<input type="number" value="{{$d['precio'][$key]}}" name="producto[{{$cnt}}][precio][]" id="precio" class="form-control form-control-alternative money precio p_{{$num}}" placeholder="0" required="" />
																			</div>
																		</div>
																		<div class="col-lg-4 mb-lg-0">
																			<div class="form-group">
																				<label for="example-search-input" class="form-control-label">Valor total</label>
																				<input type="number" value="{{$d['suma'][$key]}}" name="producto[{{$cnt}}][suma][]" id="precio_suma" class="form-control form-control-alternative money precio_suma" placeholder="0" required="" readonly />
																			</div>
																		</div>
																		<div class="col-lg-2 mb-lg-0">
																			<div class="form-group">
																				<label for="example-search-input" class="form-control-label">Eliminar</label>
																				<button type="button" class="btn btn-danger btn-elimina_cant" data-id="{{$num}}">
																					<span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>
																				</button>
																			</div>
																		</div>
																	</div>
																@endif
															@endforeach
														@else

														@endif
													</div>
												</fieldset>
											</div>
										</div>
									</div>
								@endforeach

								<hr class="my-4" />
								<div class="pl-lg-4 nuevos_productos">

								</div>
								<div class="pl-lg-4">
									<div class="row justify-content-end">
										<div class="col-lg-1">
											<div class="form-group">
												<button type="button" class="btn btn-success mt-4 btn-agrega_producto">
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
												<input type="text" id="descuento" name="descuento" class="form-control form-control-alternative" placeholder="0" value="{{$cotizacion->descuento}}">
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
													<input type="number" id="neto" name="neto" value="{{$cotizacion->neto}}" class="form-control form-control-alternative money neto" placeholder="0">
												</div>
											</div>
										</div>
									</div>

									<div class="pl-lg-4">
										<div class="row justify-content-end">
											<div class="col-lg-2">
												<div class="form-group">
													<label for="example-search-input" class="form-control-label">IVA</label>
													<input type="number" id="iva" name="iva" value="{{$cotizacion->iva}}" class="form-control form-control-alternative money iva" placeholder="0">
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
												<input type="number" id="total" name="total" value="{{$cotizacion->total}}" class="form-control form-control-alternative money total" placeholder="0" readonly>
											</div>
										</div>
									</div>
								</div>
								<hr class="my-4"/>

								<div class="pl-lg-4">
									<div class="d-dlex justify-content-end">

										<div style="text-align: right;">
											<button class="btn btn-danger" onclick="$('form').attr('target', '_blank');$('form').attr('action', '/admin/genera');">PDF</button><br/>
											<button type="submit" class="btn btn-success" onclick="$('form').attr('target', '');$('form').attr('action', '/admin/cotiza/guarda');">Guardar Cambios en esta Cotización</button>&nbsp;o&nbsp;
											<button type="submit" class="btn btn-success" onclick="$('form').attr('target', '');$('form').attr('action', '/admin/cotiza/guarda/nueva');">Guardar y crear Nueva Cotización</button><br/>
											<button type="submit" class="btn btn-warning" onclick="$('form').attr('target', '');$('form').attr('action', '/admin/cotiza/guarda/envia');">Enviar Cotización a e-mail Cliente</button>
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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
	<script src="/assets_admin/js/cotizations.js" type="text/javascript"></script>
@endsection
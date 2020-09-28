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
									<h3 class="mb-0">Editando Cotización ID: {{$cotizacion->id}}</h3>
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
								<input type="hidden" name="id" value="{{$cotizacion->id}}"/>
								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-empresa">Empresa</label>
												<input max="250" type="text" name="empresa" readonly="readonly" class="form-control form-control-alternative" placeholder="Empresa" value="{{$cliente->nombre}}" >
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-username">RUT</label>
												<input max="13" type="text" name="rut" readonly="readonly" class="form-control form-control-alternative" placeholder="22222222-2" value="{{$cliente->rut}}" oninput="checkRut(this)" >
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-username">Contacto</label>
												<input max="250" type="text" name="nombre_cliente" readonly="readonly" class="form-control form-control-alternative" placeholder="Nombre Cliente" value="{{$cliente->contacto}}" >
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-email">Email</label>
												<input max="100" type="text" name="email" readonly="readonly" class="form-control form-control-alternative" value="{{$cliente->email}}" placeholder="ejemplo@empresa.cl" >
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-pay">Forma de Pago</label>
												<input max="100" type="text" name="forma_pago" class="form-control form-control-alternative" placeholder="A convenir" value="{{$cotizacion->forma_pago}}" >
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-term">Plazo de Entrega</label>
												<input max="100" type="text" name="plazo" class="form-control form-control-alternative" placeholder="A convenir" value="{{$cotizacion->entrega}}" >
												<input type="hidden" name="tipo" id="tipo" value="{{$cotizacion->tipo}}">
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-validez">Validez de la cotización</label>
												<input max="100" type="text" name="validez" class="form-control form-control-alternative" placeholder="10 días" value="{{$cotizacion->validez}}" >
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="form-control-label" style="color: #22a7f0" for="input-validez">Comentarios</label>
												<textarea style="border-color: #22a7f0" class="form-control form-control-alternative" readonly name="comentarios" id="comentarios" cols="" rows="1">{{ $cotizacion->client->comentarios }}</textarea>
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
									<div class="pl-lg-4 pduct" id="row_pduct_{{$cnt}}">
										<div class="row">
											<div class="col-lg-7">
												<div class="row">
													<div class="col-lg-4 mb-0">
														<div class="form-group mb-lg-0">
															<label for="example-search-input" class="form-control-label">Producto</label>
															<input type="hidden" name="producto[{{$cnt}}][id]" id="id"/>
															<input class="form-control form-control-alternative search" autocomplete="off" type="search" placeholder="Producto" id="nombre" name="producto[{{$cnt}}][nombre]" value="{{$d['nombre']}}" >
														</div>
														<div class="form-group mt-1">
															<textarea name="producto[{{$cnt}}][descripcion]" id="descripcion" placeholder="Descripción" class="form-control form-control-alternative descripcion textarea richTextBox" rows="2">@if(isset($d['descripcion'])){!! strip_tags($d['descripcion']) !!}@endif</textarea>
														</div>
													</div>
													<div class="col-lg-3 mb-0">
														<div class="form-group mb-lg-0">
															<label class="form-control-label" for="input-country">Color</label>
															<input type="text" name="producto[{{$cnt}}][color]" value="{{$d['color']}}" id="color"  class="form-control form-control-alternative color">
														</div>
													</div>
													<div class="col-lg-3">
														<div class="form-group mb-lg-0">
															<label class="form-control-label" for="exampleFormControlSelect1">Impresión</label>
															<input type="text" name="producto[{{$cnt}}][impresion]" value="{{$d['imprenta']}}" id="impresion" class="form-control form-control-alternative impresion">
														</div>
													</div>
													<div class="col-lg-2">
														<div class="form-group">
															<label class="form-control-label" for="input-country">Imágen</label>
															<div class="custom-file">
																<div class="file-widget @if( !empty($d['imagen'])) hide @endif">
																	<input type="file" class="custom-file-input" value="" name="producto[{{$cnt}}][file_imagen]" lang="es">
																	<label class="custom-file-label text-left">Foto</label>
																</div>
																<input type="hidden" name="producto[{{$cnt}}][imagen]" value="{{$d['imagen']}}" id="imagen" class="himagen"/>
																<img src="{{$d['imagen']}}" class="imagen"/>
																<span class="delete-image"><i class="fas fa-trash-alt"></i></span>
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
															<input type="number" value="@if(is_array($d['cantidad'])){{$d['cantidad'][0]}}@else{{(int)$d['cantidad']}}@endif" name="producto[{{$cnt}}][cantidad][]" id="cantidad" class="form-control form-control-alternative cantidad" placeholder="0" >
														</div>
													</div>
													<div class="col-lg-3 mb-lg-0">
														<div class="form-group">
															<input type="hidden" id="precio_unitario" class="precio_unitario"/>
															<label for="example-search-input" class="form-control-label">Valor Unitario</label>
															<input type="number" value="{{$d['precio'][0]}}" name="producto[{{$cnt}}][precio][]" id="precio" class="form-control form-control-alternative money precio" placeholder="0" >
														</div>
													</div>
													<div class="col-lg-3 mb-lg-0">
														<div class="form-group">
															<label for="example-search-input" class="form-control-label">Total</label>
															<input type="number" value="{{$d['suma'][0]}}" name="producto[{{$cnt}}][suma][]" id="precio_suma" class="form-control form-control-alternative money precio_suma" placeholder="0"  readonly>
														</div>
													</div>
													<div class="col-lg-3 mb-lg-0">
														<div class="form-group">
															<input type="hidden" class="orden" value="{{$cnt}}"/>
															<label for="example-search-input" class="form-control-label">Acciones</label>
															<div class="d-flex">
																@if($cnt == 0)
																	<button data-toggle="tooltip" title="Eliminar datos" type="button" class="btn btn-sm btn-danger btn-sm btn-reset-producto">
																		<span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>
																	</button>
																@else
																	<button data-toggle="tooltip" title="Eliminar Producto" type="button" class="btn btn-danger btn-sm btn-eliminar_producto" data-id="row_pduct_{{$cnt}}">
																		<span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>
																	</button>
																@endif

																<button data-toggle="tooltip" title="Agregar cantidad" type="button" class="btn btn-sm btn-success d-{{str_replace(' ', '', $d['nombre'])}} btn-agrega_cant">
																	<span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
																</button>
															</div>
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
																	$hasQty = true;
																	$num = rand(1, 9999);
																@endphp
																<div class="row" id="{{$num}}">
																	<div class="col-lg-3 mb-lg-0">
																		<div class="form-group">
																			<label for="example-search-input" class="form-control-label">Cantidad</label>
																			<input type="number" value="{{$cantidad}}" name="producto[{{$cnt}}][cantidad][{{$key}}]" id="cantidad" class="form-control form-control-alternative cantidad" placeholder="0" />
																		</div>
																	</div>
																	<div class="col-lg-3 mb-lg-0">
																		<div class="form-group">
																			<input type="hidden" id="precio_unitario" class="precio_unitario" /><label for="example-search-input" class="form-control-label">Valor Unitario</label>
																			<input type="number" value="{{$d['precio'][$key]}}" name="producto[{{$cnt}}][precio][{{$key}}]" id="precio" class="form-control form-control-alternative money precio p_{{$num}}" placeholder="0" />
																		</div>
																	</div>
																	<div class="col-lg-3 mb-lg-0">
																		<div class="form-group">
																			<label for="example-search-input" class="form-control-label">Valor total</label>
																			<input type="number" value="{{$d['suma'][$key]}}" name="producto[{{$cnt}}][suma][{{$key}}]" id="precio_suma" class="form-control form-control-alternative money precio_suma" placeholder="0" readonly />
																		</div>
																	</div>
																	<div class="col-lg-3 mb-lg-0">
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
												<button data-toggle="tooltip" title="Agregar Producto" type="button" class="btn btn-success mt-4 btn-agrega_producto">
													<span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
												</button>
											</div>
										</div>
									</div>
								</div>

								<div id="total-fields" @if(isset($hasQty)) style="display: none" @endif>

									<div class="pl-lg-4">
										<div class="row justify-content-end">
											<div class="col-lg-1">
												<label for="example-search-input" class="form-control-label">Activar</label>
												<label class="custom-toggle mt-2">
													<input type="checkbox" name="activar_descuento"  @if($cotizacion->activa_descuento) checked @endif>
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

									<div class="pl-lg-4">
										<div class="row justify-content-end">
											<div class="col-lg-1">
												<label for="example-search-input" class="form-control-label">Activar</label>
												<label class="custom-toggle mt-2">
													<input type="checkbox" name="activar_totales" @if($cotizacion->activa_total) checked @endif>
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
								</div>

								<hr class="my-4"/>

								<div class="pl-lg-4">
									<div class="d-dlex justify-content-end">

										<div style="text-align: right;">
											<button class="btn btn-danger" onclick="$('#cotization_form').attr('target', '_blank');$('#cotization_form').attr('action', '/admin/genera');">PDF</button><br/>
											<button type="submit" class="btn btn-success save" onclick="$('#cotization_form').attr('target', '');$('#cotization_form').attr('action', '/admin/cotiza/guarda');">Guardar Cambios en esta Cotización</button>&nbsp;o&nbsp;
											<button type="submit" class="btn btn-success" onclick="$('#cotization_form').attr('target', '');$('#cotization_form').attr('action', '/admin/cotiza/guarda/nueva');">Guardar y crear Nueva Cotización</button><br/>
											<button type="submit" class="btn btn-warning" onclick="$('#cotization_form').attr('target', '');$('#cotization_form').attr('action', '/admin/cotiza/guarda/envia');">Enviar Cotización a e-mail Cliente</button>
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
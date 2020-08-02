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

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

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
									<h3 class="mb-0">Nueva Cotización</h3>
								</div>
								<div class="col-4 text-right">
									<a href="{{ url('admin/cotizaciones') }}" class="btn btn-sm btn-success">Histórico Cotizaciones</a>
								</div>
							</div>
						</div>
						<div class="card-body">
							<form action="{{ route('admin.cotiza') }}" method="POST">
								{{ csrf_field() }}
								<h6 class="heading-small text-muted mb-4">Información cliente</h6>
								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-empresa">Empresa Cliente</label>
												<input type="text" name="empresa" class="form-control form-control-alternative" placeholder="Nombre Empresa" value="" required>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-username">RUT</label>
												<input type="text" name="rut" class="form-control form-control-alternative rut" placeholder="22222222-2" value="" oninput="checkRut(this)" required>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-username">Contacto</label>
												<input type="text" name="nombre_cliente" class="form-control form-control-alternative" placeholder="Nombre Cliente" value="" required>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-email">Email</label>
												<input type="email" name="email" class="form-control form-control-alternative" placeholder=" ejemplo@empresa.cl" required>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-pay">Forma de Pago</label>
												<input type="text" name="forma_pago" class="form-control form-control-alternative" placeholder="A convenir" value="A convenir" required>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-term">Plazo de Entrega</label>
												<input type="text" name="plazo" class="form-control form-control-alternative" placeholder="A convenir" value="A convenir" required>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label class="form-control-label" for="input-validez">Validez de la cotización</label>
												<input type="text" name="validez" class="form-control form-control-alternative" placeholder="10 días" value="10" required>
												<input type="hidden" name="tipo" id="tipo" value="Normal">
											</div>
										</div>
										<div class="col-lg-3" style="display: none;">
											<div class="form-group">
												<label class="form-control-label" for="input-term">Tipo de cotización</label>
												<select class="form-control form-control-alternative" name="tipo" id="tipo" required>
													<option value="Normal">Normal</option>
													<option value="Descuento">Descuento</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<hr class="my-4" />
								<!-- Address -->
								<h6 class="heading-small text-muted mb-4">Productos</h6>

								<div class="pl-lg-4 pduct">
									<div class="row">
										<div class="col-lg-2">
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">Producto</label>
												<input type="hidden" name="producto[0][id]" id="id"/>
												<input class="form-control form-control-alternative search" autocomplete="off" type="search" placeholder="Busca por sku/nombre..." id="nombre" name="producto[0][nombre]" required>
											</div>
										</div>
										<div class="col-lg-1">
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">SKU</label>
												<input class="form-control form-control-alternative sku" autocomplete="off" type="text" placeholder="SKU" id="sku" name="producto[0][sku]" required>
											</div>
										</div>
										<div class="col-lg-1">
											<div class="form-group">
												<label class="form-control-label" for="input-country">Color</label>
												<select class="form-control form-control-alternative" name="producto[0][color]" id="color" required>
													<option value="">Seleccione</option>
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
												<label class="form-control-label" for="exampleFormControlSelect1">Impresión</label>
												<select class="form-control form-control-alternative" name="producto[0][impresion]" id="impresion">
													<option value="">Seleccione</option>
													<option value="4/4">4/4</option>
													<option value="4/0">4/0</option>
												</select>
											</div>
										</div>
										<div class="col-lg-2">
											<div class="form-group" style="text-align: center;">
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
										<div class="col-lg-1">
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">Cantidad</label>
												<input type="number" name="producto[0][cantidad][]" id="cantidad" class="form-control form-control-alternative cantidad" placeholder="0" required>
											</div>
										</div>
										<div class="col-lg-2">
											<div class="form-group">
												<input type="hidden" id="precio_unitario" class="precio_unitario"/>
												<label for="example-search-input" class="form-control-label">Valor Unitario</label>
												<input type="number" name="producto[0][precio][]" id="precio" class="form-control form-control-alternative money precio" placeholder="0" required>
											</div>
										</div>
										<div class="col-lg-1">
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">Total</label>
												<input type="number" name="producto[0][suma][]" id="precio_suma" class="form-control form-control-alternative money precio_suma" placeholder="0" readonly required>
											</div>
										</div>
										<div class="col-lg-1">
											<div class="form-group">
												<input type="hidden" class="orden" value="0"/>
												<input type="hidden" id="p_u" class="p_u"/>
												<label for="example-search-input" class="form-control-label">Agregar</label>
												<button type="button" class="btn btn-success btn-agrega_cant">
													<span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
												</button>
											</div>
										</div>
									</div>
									<div class="cant-add">

									</div>
								</div>

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
												<input type="checkbox" checked name="activa_descuento">
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
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<script type="text/javascript">

		function complete(){

			var path = "{{ url('/admin/typeahead') }}";
			$('.search').typeahead({
				minLength: 2,
				source:  function (query, process) {
					return $.get(path, { query: query }, function (data) {
						return process(data);
					});
				},
				afterSelect: function(args){
					var imagen = args.imagen.split(',');
					imagen = imagen[0].replace('["','');
					imagen = imagen.replace('"','');
					imagen = imagen.replace(']','');
					console.log(imagen);
					this.$element.parent().parent().parent().find('.imagen').attr('src', '/storage/'+imagen);
					this.$element.parent().parent().parent().find('.himagen').val('/storage/'+imagen);
					this.$element.parent().parent().parent().find('.precio').val(args.precio);
					this.$element.parent().parent().parent().find('.sku').val(args.sku);
					this.$element.parent().parent().parent().find('.precio').val(args.precio);
					this.$element.parent().parent().parent().find('.cantidad').val(1);
					this.$element.parent().parent().parent().find('.precio_unitario').val(args.precio);
					this.$element.parent().parent().parent().find('.p_u').val(args.precio);
					this.$element.parent().parent().parent().find('.precio_suma').val(args.precio);

					calculaTotales();
				}
			});

			$(document).on('keyup','.precio, .cantidad', function () {
				var parent = getProductParentLine($(this));
				calculateProductLine(parent);
				calculaTotales();
			});
		}
		complete();

		function getProductParentLine(elem) {
			if(elem.closest('.row-qty').length) {
				return elem.closest('.row-qty');
			}
			else {
				return elem.closest('.pduct');
			}
		}
		function calculateProductLine(lineContainer) {
			var price = lineContainer.find('.precio').val();
			var total = lineContainer.find('.cantidad').val() * price;
			lineContainer.find('.precio_suma').val(total);
		}

		function ShowHideTotalsFields() {
			if($(document).find('.row-qty').length > 0) {
				$('#total-fields').hide();
				$('input[name="activar_totales"]').prop("checked", false);
			}
			else {
				$('#total-fields').show();
			}
		}

		$('#descuento').on('keyup', function () {
			calculaTotales();
		});

		function calculaTotales() {
			var neto = 0;
			var descuento = parseInt($('#descuento').val(), 10);

			$(".precio_suma").each(function () {
				neto += parseInt($(this).val(), 10);
			});

			if (descuento > 0) {
				descuento = neto * (descuento / 100);
				neto = neto - descuento;
			}

			var iva = neto * 0.19;
			var total = neto + iva;

			$('.iva').val(Math.round(iva));
			$('.neto').val(Math.round(neto));
			$('.total').val(Math.round(total));
		}

		$(document).on('change','.custom-file input[type="file"]', function () {
			var label = $(this).closest('.custom-file').find('label');
			var value = $(this).val();
			var filename = value.split('\\').pop();
			label.text(filename);
		});

		$('body').on('click', '.btn-agrega_cant', function() {
			var i = "row_qty_" + ($('.row-qty').length + 1);

			var a = $(this).parent().find('.orden').val();
			var pr = $(this).parent().find('.p_u').val();
			$(this).parent().parent().parent().parent().find('.cant-add').append('<div class="pl-lg-4">'+
					'<div class="row row-qty" id="'+i+'">'+
					'<div class="col-lg-6">'+
					'</div>'+
					'<div class="col-lg-1">'+
					'<div class="form-group">'+
					'<label for="example-search-input" class="form-control-label">Cantidad</label>'+
					'<input type="number" name="producto['+a+'][cantidad][]" id="cantidad" class="form-control form-control-alternative cantidad" value="1" placeholder="0" required>'+
					'</div>'+
					'</div>'+
					'<div class="col-lg-2">'+
					'<div class="form-group">'+
					'<input type="hidden" id="precio_unitario" class="precio_unitario"/>'+
					'<label for="example-search-input" class="form-control-label">Valor Unitario</label>'+
					'<input type="number" name="producto['+a+'][precio][]" id="precio" class="form-control form-control-alternative money precio p_'+i+'" value="'+pr+'" placeholder="0" required autocomplete="off">'+
					'</div>'+
					'</div>'+
					'<div class="col-lg-2">'+
					'<div class="form-group">'+
					'<label for="example-search-input" class="form-control-label">Valor total</label>'+
					'<input type="number" name="producto['+a+'][suma][]" id="precio_suma" class="form-control form-control-alternative money precio_suma" value="'+pr+'" placeholder="0" readonly required>'+
					'</div>'+
					'</div>'+
					'<div class="col-lg-1">'+
					'<div class="form-group">'+
					'<label for="example-search-input" class="form-control-label">Eliminar</label>'+
					'<button type="button" class="btn btn-danger btn-elimina_cant" data-id='+i+'>'+
					'<span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>'+
					'</button>'+
					'</div>'+
					'</div>'+
					'</div>'+
					'</div>');
			$('.p_'+i).val($(this).parent().parent().parent().find('.precio'));
			$(this).parent().parent().parent().find('.precio_unitario').val($(this).parent().parent().parent().find('.precio'));

			ShowHideTotalsFields();

		});

		$('body').on('click', '.btn-elimina_cant', function() {
			$('#'+$(this).data('id')).remove();
			ShowHideTotalsFields();
		});

		$('body').on('click', '.btn-eliminar_producto', function() {
			$('#'+$(this).data('id')).remove();
			$('.'+$(this).data('id')).remove();
			ShowHideTotalsFields();
		});

		$('body').on('click', '.btn-agrega_producto', function() {

			var c = $('.pduct').length;
			var i = "row_pduct_" + ($('.row-qty').length + 1);

			$('.nuevos_productos').append('<div id="'+i+'" class="pduct"><div class="row">'+
					'<div class="col-lg-2">'+
					'<div class="form-group">'+
					'<label for="example-search-input" class="form-control-label">Producto</label>'+
					'<input type="hidden" name="producto['+c+'][id]" id="id"/>'+
					'<input class="form-control form-control-alternative search" autocomplete="off" type="search" placeholder="Busca por sku/nombre..." id="nombre" name="producto['+c+'][nombre]">'+
					'</div>'+
					'</div>'+
					'<div class="col-lg-1">'+
					'<div class="form-group">'+
					'<label for="example-search-input" class="form-control-label">SKU</label>'+
					'<input class="form-control form-control-alternative sku" autocomplete="off" type="text" placeholder="SKU" id="sku" name="producto['+c+'][sku]" required>'+
					'</div>'+
					'</div>'+
					'<div class="col-lg-1">'+
					'<div class="form-group">'+
					'<label class="form-control-label" for="input-country">Color</label>'+
					'<select class="form-control form-control-alternative" name="producto['+c+'][color]" id="color" required>'+
					'<option value="">Seleccione</option>'+
					'<option value="AZUL">AZUL</option>'+
					'<option value="ROJO">ROJO</option>'+
					'<option value="AMARILLO">AMARILLO</option>'+
					'<option value="TURQUESA">TURQUESA</option>'+
					'<option value="CELESTE">CELESTE</option>'+
					'<option value="FUCSIA">FUCSIA</option>'+
					'</select>'+
					'</div>'+
					'</div>'+
					'<div class="col-lg-1">'+
					'<div class="form-group">'+
					'<label class="form-control-label" for="exampleFormControlSelect1">Impresión</label>'+
					'<select class="form-control form-control-alternative" name="producto['+c+'][impresion]" id="impresion" required>'+
					'<option value="">Seleccione</option>'+
					'<option>4/4</option>'+
					'<option>4/0</option>'+
					'</select>'+
					'</div>'+
					'</div>'+
					'<div class="col-lg-2">'+
					'<div class="form-group" style="text-align: center;">'+
					'<label class="form-control-label" for="input-country">Imágen</label>'+
					'<div class="custom-file">'+
					'<div class="file-widget">'+
					'<input type="file" class="custom-file-input" name="producto[0][file_imagen]" lang="es">' +
					'<label class="custom-file-label text-left">Foto</label>' +
					'</div>' +
					'<img src="" class="imagen" style="width: 65px;"/>'+
					'<input type="hidden" name="producto['+c+'][imagen]" id="imagen" class="himagen"/>'+
					'</div>'+
					'</div>'+
					'</div>'+
					'<div class="col-lg-1">'+
					'<div class="form-group">'+
					'<label for="example-search-input" class="form-control-label">Cantidad</label>'+
					'<input type="number" name="producto['+c+'][cantidad][]" id="cantidad" class="form-control form-control-alternative cantidad" placeholder="0">'+
					'</div>'+
					'</div>'+
					'<div class="col-lg-2">'+
					'<div class="form-group">'+
					'<input type="hidden" id="precio_unitario" class="precio_unitario"/>'+
					'<label for="example-search-input" class="form-control-label">Valor Unitario</label>'+
					'<input type="number" name="producto['+c+'][precio][]" id="precio" class="form-control form-control-alternative money precio" placeholder="0">'+
					'</div>'+
					'</div>'+
					'<div class="col-lg-1">'+
					'<div class="form-group">'+
					'<label for="example-search-input" class="form-control-label">Total</label>'+
					'<input type="number" name="producto['+c+'][suma][]" id="precio_suma" class="form-control form-control-alternative money precio_suma" readonly placeholder="0">'+
					'</div>'+
					'</div>'+
					'<div class="col-lg-1">'+
					'<div class="form-group">'+
					'<input type="hidden" class="orden" value="'+c+'"/>'+
					'<label for="example-search-input" class="form-control-label">Acciones</label>'+
					'<button type="button" class="btn btn-danger btn-sm btn-eliminar_producto" data-id="'+i+'">'+
					'<span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>'+
					'</button>'+
					'<button type="button" class="btn btn-warning btn-sm btn-agrega_cant">'+
					'<span class="btn-inner--icon"><i class="fas fa-plus"></i></span>'+
					'</button>'+
					'</div>'+
					'</div>'+
					'<hr class="my-4"/>'+
					'</div>'+
					'<div class="cant-add '+i+'"></div></div>');
			// i++;
			complete();
			ShowHideTotalsFields();
		});
	</script>

@endsection
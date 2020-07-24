@extends('admin.layout')


@section('content')

<!-- Favicon -->
<link href="/assets_admin/img/brand/favicon.png" rel="icon" type="image/png">
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<!-- Icons -->
<link href="/assets_admin/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
<link href="/assets_admin/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
<!-- CSS Files -->
<link href="/assets_admin/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  

	<div class="main-content">
		<!-- Navbar -->
		<!-- End Navbar -->
		<!-- Header -->
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
										<div class="col-lg-2">
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
												<label class="form-control-label" for="exampleFormControlSelect1">impresión</label>
												<select class="form-control form-control-alternative" name="producto[0][impresion]" id="impresion">
												  <option value="">Seleccione</option>
												  <option value="4/4">4/4</option>
												  <option value="4/0">4/0</option>
												</select>
											</div>
										</div>
										<div class="col-lg-1">
											<div class="form-group" style="text-align: center;">
												<label class="form-control-label" for="input-country">Imágen</label>
													<div class="custom-file">
														<!--<input type="file" class="custom-file-input" id="customFileLang" lang="es">-->
														<!--<label class="custom-file-label" for="customFileLang">Foto</label>-->
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
												<input type="number" name="producto[0][suma][]" id="precio_suma" class="form-control form-control-alternative money precio_suma" placeholder="0" required>
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
									<div class="row">
										<div class="col-lg-11">
											
										</div>
										
										
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
									<div class="row">
										<div class="col-lg-9">
											
										</div>
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

								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-9">
											
										</div>
										
										<div class="col-lg-1">
											<!--
											<label for="example-search-input" class="form-control-label">Activar</label>
											<label class="custom-toggle mt-2">
												<input type="checkbox" checked>
												<span class="custom-toggle-slider rounded-circle"></span>
											  </label>
											-->
										</div>
										
										<div class="col-lg-2">
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">Neto</label>
												<input type="number" id="neto" name="neto" class="form-control form-control-alternative money neto" placeholder="0">
											</div>
										</div>
									</div>
								</div>

								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-9">
											
										</div>
										
										<div class="col-lg-1">
											<!--
											<label for="example-search-input" class="form-control-label">Activar</label>
											<label class="custom-toggle mt-2">
												<input type="checkbox" checked>
												<span class="custom-toggle-slider rounded-circle"></span>
											  </label>
											-->
										</div>
										
										<div class="col-lg-2">
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">IVA</label>
												<input type="number" id="iva" name="iva" class="form-control form-control-alternative money iva" placeholder="0">
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
												<input type="checkbox" checked name="activa_total">
												<span class="custom-toggle-slider rounded-circle"></span>
											  </label>
										</div>
										
										<div class="col-lg-2">
											<div class="form-group">
												<label for="example-search-input" id="number" class="form-control-label FormatNumer">Total</label>
												<input type="number" id="total" name="total" class="form-control form-control-alternative money total" placeholder="0">
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
											<button type="submit" class="btn btn-success" onclick="$('form').attr('target', '');$('form').attr('action', '/admin/cotiza/nueva/guarda');">Guardar</button>
											<button class="btn btn-danger" onclick="$('form').attr('target', '_blank');$('form').attr('action', '/admin/genera');">PDF</button>
											<button type="submit" class="btn btn-warning" onclick="$('form').attr('target', '');$('form').attr('action', '/admin/cotiza');">Enviar Cotización a e-mail Cliente</button>
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
		function checkRut(){
			this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
		}

		function complete(){
			(function(root,factory){"use strict";if(typeof module!=="undefined"&&module.exports){module.exports=factory(require("jquery"))}else if(typeof define==="function"&&define.amd){define(["jquery"],function($){return factory($)})}else{factory(root.jQuery)}})(this,function($){"use strict";var Typeahead=function(element,options){this.$element=$(element);this.options=$.extend({},$.fn.typeahead.defaults,options);this.matcher=this.options.matcher||this.matcher;this.sorter=this.options.sorter||this.sorter;this.select=this.options.select||this.select;this.autoSelect=typeof this.options.autoSelect=="boolean"?this.options.autoSelect:true;this.highlighter=this.options.highlighter||this.highlighter;this.render=this.options.render||this.render;this.updater=this.options.updater||this.updater;this.displayText=this.options.displayText||this.displayText;this.source=this.options.source;this.delay=this.options.delay;this.$menu=$(this.options.menu);this.$appendTo=this.options.appendTo?$(this.options.appendTo):null;this.fitToElement=typeof this.options.fitToElement=="boolean"?this.options.fitToElement:false;this.shown=false;this.listen();this.showHintOnFocus=typeof this.options.showHintOnFocus=="boolean"||this.options.showHintOnFocus==="all"?this.options.showHintOnFocus:false;this.afterSelect=this.options.afterSelect;this.addItem=false;this.value=this.$element.val()||this.$element.text()};Typeahead.prototype={constructor:Typeahead,select:function(){var val=this.$menu.find(".active").data("value");this.$element.data("active",val);if(this.autoSelect||val){var newVal=this.updater(val);if(!newVal){newVal=""}this.$element.val(this.displayText(newVal)||newVal).text(this.displayText(newVal)||newVal).change();this.afterSelect(newVal)}return this.hide()},updater:function(item){return item},setSource:function(source){this.source=source},show:function(){var pos=$.extend({},this.$element.position(),{height:this.$element[0].offsetHeight});var scrollHeight=typeof this.options.scrollHeight=="function"?this.options.scrollHeight.call():this.options.scrollHeight;var element;if(this.shown){element=this.$menu}else if(this.$appendTo){element=this.$menu.appendTo(this.$appendTo);this.hasSameParent=this.$appendTo.is(this.$element.parent())}else{element=this.$menu.insertAfter(this.$element);this.hasSameParent=true}if(!this.hasSameParent){element.css("position","fixed");var offset=this.$element.offset();pos.top=offset.top;pos.left=offset.left}var dropup=$(element).parent().hasClass("dropup");var newTop=dropup?"auto":pos.top+pos.height+scrollHeight;var right=$(element).hasClass("dropdown-menu-right");var newLeft=right?"auto":pos.left;element.css({top:newTop,left:newLeft}).show();if(this.options.fitToElement===true){element.css("width",this.$element.outerWidth()+"px")}this.shown=true;return this},hide:function(){this.$menu.hide();this.shown=false;return this},lookup:function(query){var items;if(typeof query!="undefined"&&query!==null){this.query=query}else{this.query=this.$element.val()||this.$element.text()||""}if(this.query.length<this.options.minLength&&!this.options.showHintOnFocus){return this.shown?this.hide():this}var worker=$.proxy(function(){if($.isFunction(this.source)){this.source(this.query,$.proxy(this.process,this))}else if(this.source){this.process(this.source)}},this);clearTimeout(this.lookupWorker);this.lookupWorker=setTimeout(worker,this.delay)},process:function(items){var that=this;items=$.grep(items,function(item){return that.matcher(item)});items=this.sorter(items);if(!items.length&&!this.options.addItem){return this.shown?this.hide():this}if(items.length>0){this.$element.data("active",items[0])}else{this.$element.data("active",null)}if(this.options.addItem){items.push(this.options.addItem)}if(this.options.items=="all"){return this.render(items).show()}else{return this.render(items.slice(0,this.options.items)).show()}},matcher:function(item){var it=this.displayText(item);return~it.toLowerCase().indexOf(this.query.toLowerCase())},sorter:function(items){var beginswith=[];var caseSensitive=[];var caseInsensitive=[];var item;while(item=items.shift()){var it=this.displayText(item);if(!it.toLowerCase().indexOf(this.query.toLowerCase()))beginswith.push(item);else if(~it.indexOf(this.query))caseSensitive.push(item);else caseInsensitive.push(item)}return beginswith.concat(caseSensitive,caseInsensitive)},highlighter:function(item){var html=$("<div></div>");var query=this.query;var i=item.toLowerCase().indexOf(query.toLowerCase());var len=query.length;var leftPart;var middlePart;var rightPart;var strong;if(len===0){return html.text(item).html()}while(i>-1){leftPart=item.substr(0,i);middlePart=item.substr(i,len);rightPart=item.substr(i+len);strong=$("<strong></strong>").text(middlePart);html.append(document.createTextNode(leftPart)).append(strong);item=rightPart;i=item.toLowerCase().indexOf(query.toLowerCase())}return html.append(document.createTextNode(item)).html()},render:function(items){var that=this;var self=this;var activeFound=false;var data=[];var _category=that.options.separator;$.each(items,function(key,value){if(key>0&&value[_category]!==items[key-1][_category]){data.push({__type:"divider"})}if(value[_category]&&(key===0||value[_category]!==items[key-1][_category])){data.push({__type:"category",name:value[_category]})}data.push(value)});items=$(data).map(function(i,item){if((item.__type||false)=="category"){return $(that.options.headerHtml).text(item.name)[0]}if((item.__type||false)=="divider"){return $(that.options.headerDivider)[0]}var text=self.displayText(item);i=$(that.options.item).data("value",item);i.find("a").html(that.highlighter(text,item));if(text==self.$element.val()){i.addClass("active");self.$element.data("active",item);activeFound=true}return i[0]});if(this.autoSelect&&!activeFound){items.filter(":not(.dropdown-header)").first().addClass("active");this.$element.data("active",items.first().data("value"))}this.$menu.html(items);return this},displayText:function(item){return typeof item!=="undefined"&&typeof item.name!="undefined"&&item.name||item},next:function(event){var active=this.$menu.find(".active").removeClass("active");var next=active.next();if(!next.length){next=$(this.$menu.find("li")[0])}next.addClass("active")},prev:function(event){var active=this.$menu.find(".active").removeClass("active");var prev=active.prev();if(!prev.length){prev=this.$menu.find("li").last()}prev.addClass("active")},listen:function(){this.$element.on("focus",$.proxy(this.focus,this)).on("blur",$.proxy(this.blur,this)).on("keypress",$.proxy(this.keypress,this)).on("input",$.proxy(this.input,this)).on("keyup",$.proxy(this.keyup,this));if(this.eventSupported("keydown")){this.$element.on("keydown",$.proxy(this.keydown,this))}this.$menu.on("click",$.proxy(this.click,this)).on("mouseenter","li",$.proxy(this.mouseenter,this)).on("mouseleave","li",$.proxy(this.mouseleave,this)).on("mousedown",$.proxy(this.mousedown,this))},destroy:function(){this.$element.data("typeahead",null);this.$element.data("active",null);this.$element.off("focus").off("blur").off("keypress").off("input").off("keyup");if(this.eventSupported("keydown")){this.$element.off("keydown")}this.$menu.remove();this.destroyed=true},eventSupported:function(eventName){var isSupported=eventName in this.$element;if(!isSupported){this.$element.setAttribute(eventName,"return;");isSupported=typeof this.$element[eventName]==="function"}return isSupported},move:function(e){if(!this.shown)return;switch(e.keyCode){case 9:case 13:case 27:e.preventDefault();break;case 38:if(e.shiftKey)return;e.preventDefault();this.prev();break;case 40:if(e.shiftKey)return;e.preventDefault();this.next();break}},keydown:function(e){this.suppressKeyPressRepeat=~$.inArray(e.keyCode,[40,38,9,13,27]);if(!this.shown&&e.keyCode==40){this.lookup()}else{this.move(e)}},keypress:function(e){if(this.suppressKeyPressRepeat)return;this.move(e)},input:function(e){var currentValue=this.$element.val()||this.$element.text();if(this.value!==currentValue){this.value=currentValue;this.lookup()}},keyup:function(e){if(this.destroyed){return}switch(e.keyCode){case 40:case 38:case 16:case 17:case 18:break;case 9:case 13:if(!this.shown)return;this.select();break;case 27:if(!this.shown)return;this.hide();break}},focus:function(e){if(!this.focused){this.focused=true;if(this.options.showHintOnFocus&&this.skipShowHintOnFocus!==true){if(this.options.showHintOnFocus==="all"){this.lookup("")}else{this.lookup()}}}if(this.skipShowHintOnFocus){this.skipShowHintOnFocus=false}},blur:function(e){if(!this.mousedover&&!this.mouseddown&&this.shown){this.hide();this.focused=false}else if(this.mouseddown){this.skipShowHintOnFocus=true;this.$element.focus();this.mouseddown=false}},click:function(e){e.preventDefault();this.skipShowHintOnFocus=true;this.select();this.$element.focus();this.hide()},mouseenter:function(e){this.mousedover=true;this.$menu.find(".active").removeClass("active");$(e.currentTarget).addClass("active")},mouseleave:function(e){this.mousedover=false;if(!this.focused&&this.shown)this.hide()},mousedown:function(e){this.mouseddown=true;this.$menu.one("mouseup",function(e){this.mouseddown=false}.bind(this))}};var old=$.fn.typeahead;$.fn.typeahead=function(option){var arg=arguments;if(typeof option=="string"&&option=="getActive"){return this.data("active")}return this.each(function(){var $this=$(this);var data=$this.data("typeahead");var options=typeof option=="object"&&option;if(!data)$this.data("typeahead",data=new Typeahead(this,options));if(typeof option=="string"&&data[option]){if(arg.length>1){data[option].apply(data,Array.prototype.slice.call(arg,1))}else{data[option]()}}})};$.fn.typeahead.defaults={source:[],items:8,menu:'<ul class="typeahead dropdown-menu" role="listbox"></ul>',item:'<li><a class="dropdown-item" href="#" role="option"></a></li>',minLength:1,scrollHeight:0,autoSelect:true,afterSelect:$.noop,addItem:false,delay:0,separator:"category",headerHtml:'<li class="dropdown-header"></li>',headerDivider:'<li class="divider" role="separator"></li>'};$.fn.typeahead.Constructor=Typeahead;$.fn.typeahead.noConflict=function(){$.fn.typeahead=old;return this};$(document).on("focus.typeahead.data-api",'[data-provide="typeahead"]',function(e){var $this=$(this);if($this.data("typeahead"))return;$this.typeahead($this.data())})});
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
					//this.$element.parent().parent().parent().find('.iva').val(this.$element.parent().parent().parent().find('.precio').val()*0.19);
					calculaTotales();
				}
			});

			$('.precio').on('keyup', function () {
				$(this).parent().parent().parent().find('.precio_suma').val($(this).val()*$(this).parent().parent().parent().find('.cantidad'));
				calculaTotales();
			});
			$('.cantidad').on('keyup', function () {
				$(this).parent().parent().parent().find('.precio').val($(this).parent().parent().parent().find('.precio_unitario').val()*$(this).val());
				$(this).parent().parent().parent().find('.precio_suma').val($(this).parent().parent().parent().find('.precio').val()*$(this).val());

				calculaTotales();
			});
		}
		complete();

		$('#descuento').on('keyup', function () {
			calculaTotales();
		});

		function calculaDescuento(){
			var total = parseInt($('.total').val(), 10);
			var descuento = parseInt($('#descuento').val(), 10);
			descuento = total*(descuento/100);
			total = total-descuento;
			$('.total').val(total);
		}
		function calculaTotales(){
			var total = 0;
			$( ".precio_suma" ).each(function() {
				total += parseInt($(this).val(), 10);
			});
			$('.total').val(Math.round(total));
			var iva = total*0.19;
			$('.iva').val(Math.round(iva));
			var neto = total-iva;
			$('.neto').val(Math.round(neto));
			calculaDescuento();
		}

		$('body').on('click', '.btn-agrega_cant', function() {
			i = Math.round(Math.random()*10000);

			var a = $(this).parent().find('.orden').val();
			var pr = $(this).parent().find('.p_u').val();
			$(this).parent().parent().parent().parent().find('.cant-add').append('<div class="pl-lg-4">'+
									'<div class="row" id="'+i+'">'+
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
																	'<input type="number" name="producto['+a+'][suma][]" id="precio_suma" class="form-control form-control-alternative money precio_suma" value="'+pr+'" placeholder="0" required>'+
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
		});
		$('body').on('click', '.btn-elimina_cant', function() { 
			$('#'+$(this).data('id')).remove();
		});
		$('body').on('click', '.btn-eliminar_producto', function() { 
			$('#'+$(this).data('id')).remove();
			$('.'+$(this).data('id')).remove();
		});
		$('body').on('click', '.btn-agrega_producto', function() { 
        // i = $('#tab_logic tr').length; 
        //var i =  $('#ipapprove tr:last').data('id');
		var c = $('.pduct').length;
        i = Math.round(Math.random()*10000);
        $('.nuevos_productos').append('<div id="'+i+'" class="pduct"><div class="row">'+
										'<div class="col-lg-2">'+
											'<div class="form-group">'+
												'<label for="example-search-input" class="form-control-label">Producto</label>'+
												'<input type="hidden" name="producto['+c+'][id]" id="id"/>'+
												'<input class="form-control form-control-alternative search" autocomplete="off" type="search" placeholder="Busca por sku/nombre..." id="nombre" name="producto['+c+'][nombre]">'+
												'</div>'+
												'</div>'+
												'<div class="col-lg-2">'+
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
																		'<div class="col-lg-1">'+
																			'<div class="form-group" style="text-align: center;">'+
																				'<label class="form-control-label" for="input-country">Imágen</label>'+
																					'<div class="custom-file">'+
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
																												'<input type="number" name="producto['+c+'][suma][]" id="precio_suma" class="form-control form-control-alternative money precio_suma" placeholder="0">'+
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
    });
	</script>

<script>
    function checkRut(rut) {
	rut.value = rut.value.replace(/[^0-9kK]/g, '').replace(/(\..*)\./g, '$1');
    // Despejar Puntos
    var valor = rut.value.replace('.','');
    // Despejar Guión
    valor = valor.replace('-','');
    
    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0,-1);
    dv = valor.slice(-1).toUpperCase();
    
    // Formatear RUN
    rut.value = cuerpo + '-'+ dv
    
    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}
    
    // Calcular Dígito Verificador
    suma = 0;
    multiplo = 2;
    
    // Para cada dígito del Cuerpo
    for(i=1;i<=cuerpo.length;i++) {
    
        // Obtener su Producto con el Múltiplo Correspondiente
        index = multiplo * valor.charAt(cuerpo.length - i);
        
        // Sumar al Contador General
        suma = suma + index;
        
        // Consolidar Múltiplo dentro del rango [2,7]
        if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
  
    }
    
    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);
    
    // Casos Especiales (0 y K)
    dv = (dv == 'K')?10:dv;
    dv = (dv == 0)?11:dv;
    
    // Validar que el Cuerpo coincide con su Dígito Verificador
    if(dvEsperado != dv) { rut.setCustomValidity("RUT no válido"); return false; }
    
    // Si todo sale bien, eliminar errores (decretar que es válido)
    rut.setCustomValidity('');
}
</script>

@endsection
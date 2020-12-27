(function($) {

    function stripHtml(html) {
        var tmp = document.createElement("DIV");
        tmp.innerHTML = html;
        return tmp.textContent || tmp.innerText || "";
    }

    function initTypeAhead() {
        $('.search').typeahead({
            minLength: 2,
            items: 'all',
            source: function (query, process) {
                return $.get("/admin/typeahead", {query: query}, function (data) {
                    return process(data);
                });
            },
            displayText: function (item) {
                return item.name+" - Cód: "+item.sku;
            },
            matcher: function (item) {
                var it = item.name+" "+item.sku;
                return ~it.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, "").indexOf(this.query.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, ""));
            },
            sorter: function (items) {
                var beginswith = [];
                var caseSensitive = [];
                var caseInsensitive = [];
                var exactMatch = [];
                var item;

                while ((item = items.shift())) {
                    var code = item.sku;
                    var name = item.name;

                    if(code.toLowerCase() == this.query.toLowerCase()) {
                        exactMatch.push(item);
                    }
                    else if(name.toLowerCase() == this.query.toLowerCase()) {
                        exactMatch.push(item);
                    }
                    else if (!code.toLowerCase().indexOf(this.query.toLowerCase())) {
                        beginswith.push(item);
                    }
                    else if (!name.toLowerCase().indexOf(this.query.toLowerCase())) {
                        beginswith.push(item);
                    }
                    else if (~code.indexOf(this.query)) {
                        caseSensitive.push(item);
                    }
                    else if (~name.indexOf(this.query)) {
                        caseSensitive.push(item);
                    }
                    else {
                        caseInsensitive.push(item);
                    }

                }

                return exactMatch.concat(beginswith,caseSensitive, caseInsensitive);
            },
            afterSelect: function (args) {

                var imagen = args.imagen.split(',');
                imagen = imagen[0].replace('["', '');
                imagen = imagen.replace('"', '');
                imagen = imagen.replace(']', '');

                this.$element.closest('.pduct').find('.has-error').removeClass('has-error');
                this.$element.closest('.pduct').find('.error-message').remove();
                this.$element.closest('.pduct').find('.imagen').attr('src', '/storage/' + imagen);
                this.$element.closest('.pduct').find('.himagen').val('/storage/' + imagen);
                this.$element.closest('.pduct').find('.precio').val(args.precio);
                this.$element.closest('.pduct').find('.descripcion').val(stripHtml(args.descripcion));
                this.$element.closest('.pduct').find('.precio').val(args.precio);
                this.$element.closest('.pduct').find('.cantidad').val(1);
                this.$element.closest('.pduct').find('.precio_unitario').val(args.precio);
                this.$element.closest('.pduct').find('.p_u').val(args.precio);
                this.$element.closest('.pduct').find('.precio_suma').val(args.precio);
                this.$element.closest('.pduct').find('.file-widget').addClass('hide');

                calculaTotales();
            }
        });
    }

    $(document).on('keyup','.precio, .cantidad', function () {
        var parent = getProductParentLine($(this));
        calculateProductLine(parent);
        calculaTotales();
    });


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

    $('input[name="activar_descuento"]').on('change', function () {
        calculaTotales();
    });

    $('input[name="activar_totales"]').on('change', function () {
        calculaTotales();
    });

    function calculaTotales() {
        var neto = 0;
        var descuento = parseInt($('#descuento').val(), 10);

        $( ".precio_suma" ).each(function() {
            if($(this).val()!="")
                neto += parseInt($(this).val(), 10);
        });

        var total = neto;

        if($('input[name="activar_descuento"]').is(':checked')) {
            if (descuento > 0) {
                descuento = neto * (descuento / 100);
                total = neto = neto - descuento;
            }
        }
        else {
            $('#descuento').val(0)
        }


        if($('input[name="activar_totales"]').is(':checked')) {
            var iva = neto * 0.19;
            total = neto + iva;
            $('.iva').val(Math.round(iva));
            $('.neto').val(Math.round(neto));
        }
        else {
            $('.iva').val(0);
            $('.neto').val(0);
            total = 0
        }

        $('.total').val(Math.round(total));
    }

    $('body').on('click', '.btn-agrega_cant', function() {
        var num = $('.row-qty').length + 1;
        var i = "row_qty_" + (num);

        var a = $(this).closest('.form-group').find('.orden').val();
        var pr = $(this).closest('.form-group').find('.p_u').val();
        $(this).closest('.pduct').find('.cant-add').append(
            '<div class="row row-qty" id="'+i+'">'+
            '<div class="col-lg-3 mb-lg-0">'+
            '<div class="form-group">'+
            '<label for="example-search-input" class="form-control-label">Cantidad</label>'+
            '<input type="number" name="producto['+a+'][cantidad]['+num+']" id="cantidad" class="form-control form-control-alternative cantidad" value="0" placeholder="0" >'+
            '</div>'+
            '</div>'+
            '<div class="col-lg-3 mb-lg-0">'+
            '<div class="form-group">'+
            '<input type="hidden" id="precio_unitario" class="precio_unitario"/>'+
            '<label for="example-search-input" class="form-control-label">Valor Unitario</label>'+
            '<input type="number" name="producto['+a+'][precio]['+num+']" id="precio" class="form-control form-control-alternative money precio" value="0" placeholder="0" >'+
            '</div>'+
            '</div>'+
            '<div class="col-lg-3 mb-lg-0">'+
            '<div class="form-group">'+
            '<label for="example-search-input" class="form-control-label">Valor total</label>'+
            '<input type="number" name="producto['+a+'][suma]['+num+']" id="precio_suma" class="form-control form-control-alternative money precio_suma" value="0" placeholder="0" readonly >'+
            '</div>'+
            '</div>'+
            '<div class="col-lg-3 mb-lg-0">'+
            '<div class="form-group">'+
            '<label for="example-search-input" class="form-control-label d-block">Eliminar</label>'+
            '<button type="button" class="btn btn-danger btn-elimina_cant" data-id='+i+'>'+
            '<span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>'+
            '</button>'+
            '</div>'+
            '</div>'+
            '</div>');
        $('.p_'+i).val($(this).parent().parent().parent().find('.precio'));
        $(this).parent().parent().parent().find('.precio_unitario').val($(this).parent().parent().parent().find('.precio'));

        ShowHideTotalsFields();
        calculaTotales();

    });
    $('body').on('click', '.btn-elimina_cant', function() {
        $('#'+$(this).data('id')).remove();
        ShowHideTotalsFields();
        calculaTotales();
    });
    $('body').on('click', '.btn-eliminar_producto', function() {
        $('#'+$(this).data('id')).remove();
        $('.'+$(this).data('id')).remove();
        ShowHideTotalsFields();
        calculaTotales();
    });
    $('body').on('click', '.btn-agrega_producto', function() {

        var c = $('.pduct').length;
        var i = "row_pduct_" + (c + 1);

        var appendProduct = $('<div id="'+i+'" class="pduct"><div class="row">'+
            '<div class="col-lg-7">'+
            '<div class="row">'+
            '<div class="col-lg-4 mb-0">'+
            '<div class="form-group mb-0">'+
            '<label for="example-search-input" class="form-control-label">Producto</label>'+
            '<input type="hidden" name="producto['+c+'][id]" id="id"/>'+
            '<input class="form-control form-control-alternative search" autocomplete="off" type="search" placeholder="Producto" id="nombre" name="producto['+c+'][nombre]">'+
            '</div>'+
            '<div class="form-group mt-1">'+
            '<textarea name="producto['+c+'][descripcion]" placeholder="Descripción" id="descripcion" class="form-control form-control-alternative descripcion" rows="2"></textarea>'+
            '</div>'+
            '</div>'+
            '<div class="col-lg-3 mb-0">'+
            '<div class="form-group">'+
            '<label class="form-control-label" for="input-country">Color</label>'+
            '<input type="text" class="form-control form-control-alternative color" name="producto['+c+'][color]" id="color_'+c+'" >'+
            '</div>'+
            '</div>'+
            '<div class="col-lg-3 mb-0">'+
            '<div class="form-group">'+
            '<label class="form-control-label" for="exampleFormControlSelect1">Impresión</label>'+
            '<input type="text" class="form-control form-control-alternative impresions" name="producto['+c+'][impresion]" id="impresion_'+c+'" >'+
            '</div>'+
            '</div>'+
            '<div class="col-lg-2">'+
            '<div class="form-group">'+
            '<label class="form-control-label" for="input-country">Imágen</label>'+
            '<div class="custom-file">'+
            '<div class="file-widget">'+
            '<input type="file" class="custom-file-input" name="producto['+c+'][file_imagen]" lang="es">' +
            '<label class="custom-file-label text-left">Foto</label>' +
            '</div>' +
            '<input type="hidden" name="producto['+c+'][imagen]" id="imagen" class="himagen"/>'+
            '<img src="" class="imagen"/>'+
            '<span class="delete-image"><i class="fas fa-trash-alt"></i></span>'+
            '</div>'+
            '</div>'+
            '</div>'+
            '</div>'+
            '</div>'+
            '<div class="col-lg-5">'+
            '<div class="row">'+
            '<div class="col-lg-3 mb-lg-0">'+
            '<div class="form-group">'+
            '<label for="example-search-input" class="form-control-label">Cantidad</label>'+
            '<input type="number" name="producto['+c+'][cantidad][0]" id="cantidad" class="form-control form-control-alternative cantidad" value="0" placeholder="0">'+
            '</div>'+
            '</div>'+
            '<div class="col-lg-3 mb-lg-0">'+
            '<div class="form-group">'+
            '<input type="hidden" id="precio_unitario" class="precio_unitario"/>'+
            '<label for="example-search-input" class="form-control-label">Valor Unitario</label>'+
            '<input type="number" name="producto['+c+'][precio][0]" id="precio" class="form-control form-control-alternative money precio" value="0" placeholder="0">'+
            '</div>'+
            '</div>'+
            '<div class="col-lg-3 mb-lg-0">'+
            '<div class="form-group">'+
            '<label for="example-search-input" class="form-control-label">Total</label>'+
            '<input type="number" name="producto['+c+'][suma][0]" id="precio_suma" class="form-control form-control-alternative money precio_suma" value="0" readonly placeholder="0">'+
            '</div>'+
            '</div>'+
            '<div class="col-lg-3 mb-lg-0">'+
            '<div class="form-group">'+
            '<input type="hidden" class="orden" value="'+c+'"/>'+
            '<label for="example-search-input" class="form-control-label">Acciones</label>'+
            '<div class="d-flex">' +
            '<button data-toggle="tooltip" title="Eliminar Producto" type="button" class="btn btn-danger btn-sm btn-eliminar_producto" data-id="'+i+'">'+
            '<span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>'+
            '</button>'+
            '<button data-toggle="tooltip" title="Agregar Cantidad" type="button" class="btn btn-warning btn-sm btn-agrega_cant">'+
            '<span class="btn-inner--icon"><i class="fas fa-plus"></i></span>'+
            '</button>'+
            '</div>'+
            '</div>'+
            '</div>'+
            '<hr class="my-4"/>'+
            '</div>'+
            '<div class="cant-add '+i+'"></div></div></div>');



        $('.nuevos_productos').append(appendProduct);
        $("[data-toggle='tooltip']").tooltip({trigger: 'hover'});

        appendProduct.find('select').select2({});

        ShowHideTotalsFields();
        initTypeAhead();
        calculaTotales();
    });

    initTypeAhead();

    $('select').select2({});

    $('.btn-reset-producto').on('click',function () {
        var container = $(this).closest('.pduct');
        container.find('.has-error').removeClass('has-error');
        container.find('.error-message').remove();
        container.find("input[type='text']").val('');
        container.find("input[type='search']").val('');
        container.find("input[type='number']").val('');
        container.find("textarea").val('');
        container.find('.file-widget').removeClass('hide');
        container.find('.file-widget').show();
        container.find('img').attr('src','');

        var colorSelect = container.find('.color');

        if(colorSelect.hasClass('select2-hidden-accessible')) {
            colorSelect.select2('destroy');
            var parentSelect = colorSelect.parent();
            var newColorInput = $("" +
                "<input type='text' " +
                "name='" + colorSelect.attr('name') + "' " +
                "class='" + colorSelect.attr('class') + "' " +
                "id='" + colorSelect.attr('id') + "'>");
            parentSelect.append(newColorInput);
            colorSelect.remove();
        }


    });

    $("[data-toggle='tooltip']").tooltip({trigger: 'hover'});

    $(document).on('change','.custom-file input[type="file"]', function () {

        var formData = new FormData(document.getElementById("cotization_form"));
        var img = $(this).closest('.custom-file').find('img');
        var container = $(this).closest('.file-widget');
        var input = $(this).closest('.custom-file').find('.himagen');
        var current = $(this).closest('.pduct').find('.orden').val();

        container.addClass('loading');

        $.ajax({
            url: '/admin/upload-image?num='+current,
            type: "post",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        }).done( function(res) {
            img.attr('src',res);
            input.val(res);
            container.addClass('hide');
            container.removeClass('loading');
        }).fail( function(e, res, xhr) {
            container.removeClass('loading');
            var arr = e.responseJSON.errors;
            $.each(arr['producto.'+current+'.file_imagen'], function (index,value) {
                toastr.error(value);
            });
        });

    });

    $(document).on('click','.custom-file .delete-image', function () {
        var container = $(this).closest('.custom-file');
        container.find('img').attr('src','');
        container.find('.file-widget').removeClass('hide');
        container.find('.himagen').val('');
    });

    $(document).on('submit','#cotization_form', function (e) {
        e.preventDefault();

        var action = $(this).attr('action');
        var loading = $('#voyager-loader');
        var data = $(this).serialize();
        var pdf = false;

        if(action == '/admin/genera') {
            pdf = true;
            action = '/admin/cotiza/nueva/guarda'
        }

        loading.show();

        $.ajax({
            url: action,
            type: "post",
            dataType: "json",
            data: data,
        }).done( function(res) {

            toastr.success(res.message);

            if(typeof res.id !== "undefined") {
                $('input[name="id"]').val(res.id);
            }

            if(typeof res.new_id !== "undefined") {
                location.href = '/admin/cotizador/editar/'+res.new_id
            }
            else {
                loading.hide();
            }

            if(pdf) {
                var win = window.open('/admin/genera?id='+$('input[name="id"]').val(), '_blank');
                win.focus();
            }

        }).fail( function(e, res, xhr) {
            loading.hide();
            if(typeof e.responseJSON.errors === "undefined")
                return;

            var errors = e.responseJSON.errors;

            if(! errors)
                return false;

            $.each(errors, function (index,message) {
                var name = index;
                if(index.indexOf('.') >-1){
                    var name_parts =  index.split('.');
                    name = name_parts[0];
                    $.each(name_parts, function (key,value) {
                        if(key !== 0) {
                            name = name+"["+value+"]";
                        }
                    })
                }

                var field = $('[name="'+name+'"]').closest('.form-group');
                field.addClass('has-error');
                if(field.find('.error-message').length) {
                    field.find('.error-message').text(message);
                }
                else {
                    field.append('<span class="error-message text-danger">' + message + '</span>');
                }

            });


            $('html, body').animate({ scrollTop: $('.has-error').first().offset().top - 100}, 'slow');
        });
    })

    $(document).on('change','input, select, textarea', function () {
        var field = $(this).closest('.form-group');
        field.removeClass('has-error');
        field.find('.error-message').text('');
    })

})(jQuery);

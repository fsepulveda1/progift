(function($) {

    function stripHtml(html) {
        var tmp = document.createElement("DIV");
        tmp.innerHTML = html;
        return tmp.textContent || tmp.innerText || "";
    }

    function initTypeAhead() {
        $('.search').typeahead({
            minLength: 2,
            source: function (query, process) {
                return $.get("/admin/typeahead", {query: query}, function (data) {
                    return process(data);
                });
            },
            afterSelect: function (args) {
                var imagen = args.imagen.split(',');
                imagen = imagen[0].replace('["', '');
                imagen = imagen.replace('"', '');
                imagen = imagen.replace(']', '');
                this.$element.closest('.pduct').find('.imagen').attr('src', '/storage/' + imagen);
                this.$element.closest('.pduct').find('.himagen').val('/storage/' + imagen);
                this.$element.closest('.pduct').find('.precio').val(args.precio);
                this.$element.closest('.pduct').find('.descripcion').val(stripHtml(args.descripcion));
                this.$element.closest('.pduct').find('.sku').val(args.sku);
                this.$element.closest('.pduct').find('.precio').val(args.precio);
                this.$element.closest('.pduct').find('.cantidad').val(1);
                this.$element.closest('.pduct').find('.precio_unitario').val(args.precio);
                this.$element.closest('.pduct').find('.p_u').val(args.precio);
                this.$element.closest('.pduct').find('.precio_suma').val(args.precio);
                this.$element.closest('.pduct').find('.file-widget').hide();
                var colorSelect = this.$element.closest('.pduct').find('.color');

                if(colorSelect.hasClass('select2-hidden-accessible')) {
                    colorSelect.select2('destroy');
                }

                var parentSelect = colorSelect.parent();
                var newColorSelect = $("" +
                    "<select " +
                    "name='"+colorSelect.attr('name')+"' " +
                    "class='"+colorSelect.attr('class')+"' " +
                    "id='"+colorSelect.attr('id')+"'></select>");
                newColorSelect.append('<option value=""></option>');
                parentSelect.append(newColorSelect);
                colorSelect.remove();

                $.each(args.colors, function (index, value) {
                    newColorSelect.append('<option value="' + value + '">' + value + '</option>');
                });

                newColorSelect.select2({});

                console.log('asd');

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
        $(this).closest('.pduct').find('.cant-add').append(
            '<div class="row row-qty" id="'+i+'">'+
            '<div class="col-lg-3 mb-lg-0">'+
            '<div class="form-group">'+
            '<label for="example-search-input" class="form-control-label">Cantidad</label>'+
            '<input type="number" name="producto['+a+'][cantidad][]" id="cantidad" class="form-control form-control-alternative cantidad" value="1" placeholder="0" required>'+
            '</div>'+
            '</div>'+
            '<div class="col-lg-3 mb-lg-0">'+
            '<div class="form-group">'+
            '<input type="hidden" id="precio_unitario" class="precio_unitario"/>'+
            '<label for="example-search-input" class="form-control-label">Valor Unitario</label>'+
            '<input type="number" name="producto['+a+'][precio][]" id="precio" class="form-control form-control-alternative money precio p_'+i+'" value="'+pr+'" placeholder="0" required autocomplete="off">'+
            '</div>'+
            '</div>'+
            '<div class="col-lg-3 mb-lg-0">'+
            '<div class="form-group">'+
            '<label for="example-search-input" class="form-control-label">Valor total</label>'+
            '<input type="number" name="producto['+a+'][suma][]" id="precio_suma" class="form-control form-control-alternative money precio_suma" value="'+pr+'" placeholder="0" readonly required>'+
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
    });
    $('body').on('click', '.btn-agrega_producto', function() {

        var c = $('.pduct').length;
        var i = "row_pduct_" + ($('.row-qty').length + 1);


        var appendProduct = $('<div id="'+i+'" class="pduct"><div class="row">'+
            '<div class="col-lg-7">'+
            '<div class="row">'+
            '<div class="col-lg-4 mb-0">'+
            '<div class="form-group mb-0">'+
            '<label for="example-search-input" class="form-control-label">Producto</label>'+
            '<input type="hidden" name="producto['+c+'][id]" id="id"/>'+
            '<input class="form-control form-control-alternative search" autocomplete="off" type="search" placeholder="Producto" id="nombre" name="producto['+c+'][nombre]">'+
            '</div>'+
            '<div class="form-group mt-1 mb-0">'+
            '<input class="form-control form-control-alternative sku" autocomplete="off" type="text" placeholder="Código" id="sku" name="producto['+c+'][sku]" required>'+
            '</div>'+
            '<div class="form-group mt-1">'+
            '<textarea name="producto['+c+'][descripcion]" placeholder="Descripción" id="descripcion" class="form-control form-control-alternative descripcion" rows="2"></textarea>'+
            '</div>'+
            '</div>'+
            '<div class="col-lg-3 mb-0">'+
            '<div class="form-group">'+
            '<label class="form-control-label" for="input-country">Color</label>'+
            '<input type="text" class="form-control form-control-alternative color" name="producto['+c+'][color]" id="color_'+c+'" required>'+
            '</div>'+
            '</div>'+
            '<div class="col-lg-3 mb-0">'+
            '<div class="form-group">'+
            '<label class="form-control-label" for="exampleFormControlSelect1">Impresión</label>'+
            '<input type="text" class="form-control form-control-alternative impresions" name="producto['+c+'][impresion]" id="impresion_'+c+'" required>'+
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
            '<img src="" class="imagen" style="width: 65px;"/>'+
            '<input type="hidden" name="producto['+c+'][imagen]" id="imagen" class="himagen"/>'+
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
            '<input type="number" name="producto['+c+'][cantidad][]" id="cantidad" class="form-control form-control-alternative cantidad" placeholder="0">'+
            '</div>'+
            '</div>'+
            '<div class="col-lg-3 mb-lg-0">'+
            '<div class="form-group">'+
            '<input type="hidden" id="precio_unitario" class="precio_unitario"/>'+
            '<label for="example-search-input" class="form-control-label">Valor Unitario</label>'+
            '<input type="number" name="producto['+c+'][precio][]" id="precio" class="form-control form-control-alternative money precio" placeholder="0">'+
            '</div>'+
            '</div>'+
            '<div class="col-lg-3 mb-lg-0">'+
            '<div class="form-group">'+
            '<label for="example-search-input" class="form-control-label">Total</label>'+
            '<input type="number" name="producto['+c+'][suma][]" id="precio_suma" class="form-control form-control-alternative money precio_suma" readonly placeholder="0">'+
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

    $(document).on('change','.custom-file-input',function () {
        alert('subir archivo');
    })

})(jQuery);

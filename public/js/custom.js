function fixAside() {
    console.log('asd');
    if ($(window).width() > 768) {
        $('.app-container').addClass('expanded');
        $('.hamburger').hide();
    }
    else {
        $('.hamburger').show();
        $('.app-container').removeClass('expanded');
    }
}
$(window).on('load resize', function () {
    fixAside();
});

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
    // if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}

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
    // if(dvEsperado != dv) { rut.setCustomValidity("RUT no válido"); return false; }
    //
    // rut.setCustomValidity('');
}

function tinymce_setup_callback(editor) {
    editor.settings.height = 200;
    editor.settings.min_height = 100;
    editor.settings.plugins = "link, code, table, textcolor, lists"
    return editor;
}

$('.btn-show-comments').on('click', function (e) {

    e.preventDefault();
    var modalContainer = $('#modal-comments');
    var loading = $('#voyager-loader');
    loading.show();

    $.ajax({
        url: $(this).attr('href'),
        type: "get",
        dataType: "html",
    }).done( function(res) {
        console.log(modalContainer);
        modalContainer.find('#modal-comment-text').text(res);
        modalContainer.modal('show');
        loading.hide()
    }).fail( function(e, res, xhr) {
        loading.hide();
    });

});

$('.custom-datepicker').datetimepicker({ format:'DD-MM-YYYY'});

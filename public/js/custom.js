
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

    rut.setCustomValidity('');
}

function tinymce_setup_callback(editor) {
    tinymce.init({
        menubar: false,
        selector: "textarea.richTextBox",
        skin_url:
        $('meta[name="assets-path"]').attr("content") + "?path=js/skins/voyager",
        min_height: 100,
        height: 200,
        resize: "vertical",
        plugins: "link, code, table, textcolor, lists",
        extended_valid_elements:
            "input[id|name|value|type|class|style|required|placeholder|autocomplete|onclick]",
        file_browser_callback: function (field_name, url, type, win) {
            if (type == "image") {
                $("#upload_file").trigger("click")
            }
        },
        toolbar:
            "styleselect bold italic underline | forecolor backcolor | alignleft aligncenter alignright | bullist numlist outdent indent | link image table | code",
        convert_urls: false,
        image_caption: true,
        image_title: true,
    })
}
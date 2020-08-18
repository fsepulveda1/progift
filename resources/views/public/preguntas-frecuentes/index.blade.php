@extends('public.layout')
@section('title')Preguntas Frecuentes | @endsection


@section('content')

<main class="main">
    <div class="container">
        <div class="row">
    <div class="col-lg-9">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Preguntas Frecuentes</li>
                </ol>
            </div><!-- End .container -->
        </nav>
        <div class="col-lg-12 col-sm-12">
            <br><h2>PREGUNTAS FRECUENTES</h2><br>
                <div class="product-single-collapse" id="productAccordion">
                    <div class="product-collapse-panel">
                        <h3 class="product-collapse-title">
                            <a class="collapsed"  data-toggle="collapse" href="#pregunta-1" role="button" aria-expanded="false" aria-controls="pregunta-1">Cómo puedo Cotizar Productos en Pro-Gift?</a>
                        </h3>

                        <div class="product-collapse-body collapse" id="pregunta-1" data-parent="#productAccordion">
                            <div class="collapse-body-wrapper">
                                <div class="product-desc-content">
                                    <p>Existen 3 maneras de solicitar una Cotización:</p>
                                    <ol>
                                        <li>1.- Cotizar Online en www.pro-gift.cl: Debes seleccionar uno o más productos  indicando la cantidad y el color de impresión del Logotipo y hacer Click en el botón “Cotizar”. Luego para finalizar se debe completar algunos datos (RUT Empresa, Nombre, e-mail y Teléfono) y nosotros te enviaremos la Cotización de los productos seleccionados por e-mail a la brevedad.</li>
                                        <li>2.- Envío de e-mail: Puedes enviar un e-mail a ventas@pro-gift.cl y te lo responderemos con los valores de los productos solicitados a la brevedad.</li>
                                        <li>3.- Teléfono: Puedes llamar por teléfono e indicando el RUT de la empresa señalar los productos que necesitas cotizar, dejas tus datos y te enviaremos la Cotización vía e-mail.</li>
                                    </ol>
                                </div><!-- End .product-desc-content -->
                            </div><!-- End .collapse-body-wrapper -->
                        </div><!-- End .product-collapse-body -->
                    </div><!-- End .product-collapse-panel -->

                        <div class="product-collapse-panel">
                        <h3 class="product-collapse-title">
                            <a class="collapsed" data-toggle="collapse" href="#pregunta-2" role="button" aria-expanded="false" aria-controls="pregunta-2">Cómo se realizan los Despachos?</a>
                        </h3>

                        <div class="product-collapse-body collapse" id="pregunta-2" data-parent="#productAccordion">
                            <div class="collapse-body-wrapper">
                                <div class="product-desc-content">
                                    <p>Pro-Gift realiza despachos en la Región Metropolitana a través de sus 4 Furgones y a todo Chile a través de distintas compañías de Encomiendas (Lit Cargo, Starken, Chilexpress, etc) previa confirmación para que sea a través del Courier de preferencia del Cliente.</p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- End .collapse-body-wrapper -->
                        </div><!-- End .product-collapse-body -->
                    </div><!-- End .product-collapse-panel -->

                        <div class="product-collapse-panel">
                        <h3 class="product-collapse-title">
                            <a class="collapsed" data-toggle="collapse" href="#pregunta-3" role="button" aria-expanded="false" aria-controls="pregunta-3">Existe una cantidad mínima para comprar productos?</a>
                        </h3>

                        <div class="product-collapse-body collapse" id="pregunta-3" data-parent="#productAccordion">
                            <div class="collapse-body-wrapper">
                                <div class="product-desc-content">
                                    <p>Nuestra empresa trabaja con la cantidad de productos que el Cliente requiera, pero esto tiene directa relación con el valor de los productos, a mayor cantidad siempre podremos hacer un mejor precio.</p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- End .collapse-body-wrapper -->
                        </div><!-- End .product-collapse-body -->
                    </div><!-- End .product-collapse-panel -->
                    
                        <div class="product-collapse-panel">
                        <h3 class="product-collapse-title">
                            <a class="collapsed" data-toggle="collapse" href="#pregunta-4" role="button" aria-expanded="false" aria-controls="pregunta-4">Puedo pedir muestras?</a>
                        </h3>

                        <div class="product-collapse-body collapse" id="pregunta-4" data-parent="#productAccordion">
                            <div class="collapse-body-wrapper">
                                <div class="product-desc-content">
                                    <p>Se pueden solicitar muestras de los productos a través de una Ejecutiva de Ventas y serán enviadas lo antes posible a través de una moto. </p>
                                    <p>Podemos también imprimirlas con el Logotipo que se requiera una vez que el Cliente nos confirme la compra.</p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- End .collapse-body-wrapper -->
                        </div><!-- End .product-collapse-body -->
                    </div><!-- End .product-collapse-panel -->

                    <div class="product-collapse-panel">
                        <h3 class="product-collapse-title">
                            <a class="collapsed" data-toggle="collapse" href="#pregunta-5" role="button" aria-expanded="false" aria-controls="pregunta-5">Tienen Garantía los productos?</a>
                        </h3>

                        <div class="product-collapse-body collapse" id="pregunta-5" data-parent="#productAccordion">
                            <div class="collapse-body-wrapper">
                                <div class="product-desc-content">
                                    <p>Todos nuestros productos están garantizados por nuestra empresa, la idea es darle al Cliente una satisfacción del 100% en todo el proceso de compra.</p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- End .collapse-body-wrapper -->
                        </div><!-- End .product-collapse-body -->
                    </div><!-- End .product-collapse-panel -->
                    
                        <div class="product-collapse-panel">
                        <h3 class="product-collapse-title">
                            <a class="collapsed" data-toggle="collapse" href="#pregunta-6" role="button" aria-expanded="false" aria-controls="pregunta-6">Cómo enviar mis Comentarios y Sugerencias a la empresa?</a>
                        </h3>

                        <div class="product-collapse-body collapse" id="pregunta-6" data-parent="#productAccordion">
                            <div class="collapse-body-wrapper">
                                <div class="product-desc-content">
                                    <p>Pueden enviar sus Comentarios o Sugerencias por e-mail a contacto@pro-gift.cl</p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- End .collapse-body-wrapper -->
                        </div><!-- End .product-collapse-body -->
                    </div><!-- End .product-collapse-panel -->

                </div><!-- End .product-single-collapse -->
        </div>

    </div><!-- End .col-lg-9 -->
    @include('partials.cat-menu')
        </div><!-- End .row -->
    </div><!-- End .container -->
</main><!-- End .main -->

@endsection
@extends('public.layout')


@section('content')

<main class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <nav aria-label="breadcrumb" class="breadcrumb-nav">

                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Mi Cotización</a></li>
                        </ol>

                </nav>
                <br><h2>MI COTIZACIÓN</h2>
                @if(session()->has('success_msg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('success_msg') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
                @if(session()->has('alert_msg'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session()->get('alert_msg') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
                @if(count($errors) > 0)
                    @foreach($errors0>all() as $error)
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ $error }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endforeach
                @endif
                <!--
                @if(\Cart::getTotalQuantity()>0)
                    <h4>{{ \Cart::getTotalQuantity()}} Product(s) In Your Cart</h4><br>
                @else
                    <h4>No Product(s) In Your Cart</h4><br>
                    <a href="/" class="btn btn-dark">Cotizar más productos</a>
                @endif
                -->
                <div class="cart-table-container">
                    <table class="table table-cart">
                        <thead>
                            <tr>
                                <th class="product-col">PRODUCTO</th>
                                <th class="">IMAGEN</th>
                                <th class="price-col">COLOR</th>
                                <th class="qty-col">CANTIDAD</th>
                                <th>IMPRESIÓN</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($cartCollection as $item)
                            <tr class="product-row">
                                <td class="product-col">
                                    <h2 class="product-title">
                                    <a href="detalle-producto.html">{{$item->name}}</a>
                                    </h2>
                                </td>
                                <td>
                                    <div class="product-col">
                                        <figure class="product-image-container">
                                            <a href="product.html" class="product-image">
                                                <img src="/storage/{{$item->attributes->image}}" alt="product">
                                            </a>
                                        </figure>
                                    </div>
                                </td>
                                <td>{{$item->attributes->color}}</td>
                                <td>
                                    <input class="vertical-quantity form-control" value="{{ $item->quantity}}" type="text" onchange="myChangeFunction(this, document.getElementById('quantity-{{ $item->id}}'))">
                                    <!--
                                    <form action="{{ route('cart.update') }}" method="POST" style="margin-bottom: -6px;">
                                    {{ csrf_field() }}
                                        <div class="form-group row">
                                            <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                                            <input type="text" onchange="myChangeFunction(this, document.getElementById('quantity-{{ $item->id}}'))" class="vertical-quantity form-control" value="{{ $item->quantity }}"
                                                id="quantity" name="quantity" style="width: 70px; margin-right: 10px;">
                                            <button class="btn btn-link" style="margin-right: 25px;"><i class="fa fa-edit"></i></button>
                                        </div>
                                    </form>
                                    -->
                                </td>
                                <td>{{$item->attributes->impresion}}</td>
                            </tr>
                            <tr class="product-action-row">
                                <td colspan="5" class="clearfix">
                                    <div class="float-right">
                                        <!--<a href="#" title="Editar" class="btn-edit"><span class="sr-only">Editar</span><i class="icon-pencil"></i></a>-->
                                        <!--<a href="#" title="Remover" class="btn-remove"><span class="sr-only">Remover</span></a>-->
                                        <form action="{{ route('cart.update') }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                                            <input type="hidden" class="form-control" value="{{ $item->quantity }}"
                                                id="quantity-{{ $item->id}}" name="quantity">
                                            <button class="btn-edit btn btn-link"><i class="icon-pencil"></i></button>
                                        </form>
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                            <button class="btn-remove btn btn-link"></button>
                                        </form>
                                    </div><!-- End .float-right -->
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <td colspan="5" class="clearfix">
                                    <div class="float-left">
                                        <a href="{{ url('/') }}" class="btn btn-outline-secondary">COTIZAR MÁS PRODUCTOS</a>
                                    </div><!-- End .float-left -->
                                    @if(count($cartCollection)>0)
                                        <div class="float-right">
                                            <form action="{{ route('cart.clear') }}" method="POST" style="margin-bottom: 0;display: contents;">
                                                {{ csrf_field() }}
                                                <button class="btn btn-outline-secondary btn-clear-cart">LIMPIAR CARRO</button>
                                            </form>

                                            <!--<a href="#" class="btn btn-outline-secondary btn-update-cart">ACTUALIZAR CARRO</a>-->
                                        </div><!-- End .float-right -->
                                    @endif
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- End .cart-table-container -->

                <div class="cart-form">
                    <h2>INFORMACIÓN PARA COTIZAR</h2>
                    <form action="{{ route('cart.cotiza') }}" method="POST" class="contact-form">
                        {{ csrf_field() }}
                        <div class="col-lg-12">	
                            <div class="form-group required-field">
                                <label for="contact-company">Empresa</label>
                                <input type="text" class="form-control" id="contact-company" name="empresa" required>
                            </div><!-- End .form-group -->
                        </div><!-- End .col-lg-12 -->
                        <div class="col-lg-6">	
                            <div class="form-group required-field">
                                <label for="contact-company-run">Rut de empresa</label>
                                <input type="text" class="form-control" id="contact-email" name="rut" required oninput="checkRut(this)">
                            </div><!-- End .form-group -->
                        </div><!-- End .col-lg-6 -->
                        <div class="col-lg-6">
                            <div class="form-group required-field">
                                <label for="contact-contact">Contacto</label>
                                <input type="text" class="form-control" id="contact-contact" name="contacto" required>
                            </div><!-- End .form-group -->
                        </div><!-- End .col-lg-6 -->
                        <div class="col-lg-6">
                            <div class="form-group required-field">
                                <label for="contact-phone">Teléfono o celular</label>
                                <input type="text" class="form-control" id="contact-phone" name="telefono" required>
                            </div><!-- End .form-group -->
                        </div><!-- End .col-lg-6 -->
                        <div class="col-lg-6">	
                            <div class="form-group required-field">
                                <label for="contact-email">Email</label>
                                <input type="email" class="form-control" id="contact-email" name="email" required>
                            </div><!-- End .form-group -->
                        </div><!-- End .col-lg-6 -->
                        <div class="col-lg-12">	
                            <div class="form-group required-field">
                                <label for="contact-message">Comentarios</label>
                                <textarea cols="30" rows="3" id="contact-message" class="form-control" name="comentarios" required></textarea>
                            </div><!-- End .form-group -->

                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary">ENVIAR</button>
                            </div><!-- End .form-footer -->
                        </div><!-- End .col-lg-12 -->
                    </form>
                </div><!-- End .cart-discount -->
            </div><!-- End .col-lg-9 -->
            @include('partials.cat-menu')
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-6"></div><!-- margin -->
</main><!-- End .main -->
<script>
    function checkRut(rut) {
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
<script type="text/javascript">
    function myChangeFunction(input1, devol) {
      //var input2 = document.getElementById('devol');
      devol.value = input1.value;
    }
</script>
@endsection
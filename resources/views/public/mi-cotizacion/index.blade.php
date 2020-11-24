@extends('public.layout')
@section('title')Carro | @endsection


@section('content')

    <main class="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <nav aria-label="breadcrumb" class="breadcrumb-nav">

                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/"><i class="icon-home"></i></a></li>
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
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                                    <td class="product-col d-table-cell">
                                        <h2 class="product-title mb-1">
                                            <a href="/producto/{{$item->model->slug}}">{{$item->name}}</a>
                                        </h2><br>
                                        <div class="product-price">{{$item->model->sku}}</div>
                                    </td>
                                    <td>
                                        <div class="product-col">
                                            <figure class="product-image-container">
                                                <a href="/producto/{{$item->model->slug}}" class="product-image">
                                                    <img src="/storage/{{$item->attributes->image}}" alt="product">
                                                </a>
                                            </figure>
                                        </div>
                                    </td>
                                    <td>{{$item->attributes->color}}</td>
                                    <td>
                                        <input class="vertical-quantity form-control" value="{{ $item->quantity}}" type="number" onchange="myChangeFunction(this, document.getElementById('quantity-{{ $item->id}}'))">
                                    </td>
                                    <td>{{$item->attributes->impresion}}</td>
                                </tr>
                                <tr class="product-action-row">
                                    <td colspan="5" class="clearfix">
                                        <div class="float-right">
                                            <form action="{{ route('cart.update') }}" method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                                                <input type="hidden" class="form-control" value="{{ $item->quantity }}"
                                                       id="quantity-{{ $item->id}}" name="quantity">
                                                <button data-toggle="tooltip" title="Actualizar" class="btn-edit btn btn-link"><i class="fas fa-sync"></i></button>
                                            </form>
                                            <form action="{{ route('cart.remove') }}" method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                                <button data-toggle="tooltip" title="Eliminar" class="btn-edit btn btn-link"><i class="fas fa-times"></i></button>
                                            </form>
                                        </div><!-- End .float-right -->
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                            <tfoot>
                            <tr>
                                <td colspan="5" class="clearfix">
                                    <div class="float-right">
                                        <a href="{{ url('/') }}" class="btn btn-outline-secondary">COTIZAR MÁS PRODUCTOS</a>
                                    </div><!-- End .float-left -->
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div><!-- End .cart-table-container -->

                    <div class="cart-form">
                        <h2>INFORMACIÓN PARA COTIZAR</h2>
                        <form action="{{ route('cart.cotiza') }}" method="POST" class="contact-form row">
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
                                <div class="form-group">
                                    <label for="contact-message">Comentarios</label>
                                    <textarea cols="30" rows="3" id="contact-message" class="form-control" name="comentarios"></textarea>
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

    <script type="text/javascript">
        function myChangeFunction(input1, devol) {
            devol.value = input1.value;
        }
    </script>
@endsection

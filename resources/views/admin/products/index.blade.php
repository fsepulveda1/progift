



@extends('admin.layout')


@section('content')


<body class="">
	@include('admin.nav.index')
	<div class="main-content">
		<!-- Navbar -->
		@include('admin.nav.navbar')
		<!-- End Navbar -->
		<!-- Header -->
		<div class="header bg-gradient-progift pb-8 pt-5 pt-md-8">
			<div class="container-fluid">
				<div class="header-body">

				</div>
			</div>
		</div>
		<div class="container-fluid mt--7">
			<div class="row">
				<div class="col-xl-12 order-xl-1">
					<div class="card bg-secondary shadow">
						<div class="card-header bg-white border-0">
							<div class="row align-items-center">
								<div class="col-8">
									<h3 class="mb-0">Listado Productos</h3>
								</div>
								<div class="col-4 text-right">
									<a href="/products/create" class="btn btn-sm btn-success">Agregar Producto</a>
								</div>
							</div>
						</div>
						<div class="card-body">
							<!-- tabla -->

                            <div class="data-table">
                                <table class="table">
                                <thead>
                                <tr>
                                    <th class="table-head">#</th>
                                    <th class="table-head">Nombre</th>
                                    <th class="table-head">Slug</th>
                                    <th class="table-head">Detalles</th>
                                    <th class="table-head">Precio</th>
                                    <th class="table-head">Costo Envío</th>
                                    <th class="table-head">Descripción</th>
                                    <th class="table-head">Categoría</th>
                                    <th class="table-head">Marca</th>
                                    <th class="table-head">Imagen</th>
                                    <th class="table-head">Herramientas</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->slug }}</td>
                                        <td>{{ $product->details }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->shipping_cost }}</td>
                                        <td>{!! getShorterString($product['description'], 50) !!}</td>
                                        <td>{{ $product->category_id }}</td>
                                        <td>{{ $product->brand_id }}</td>
                                        <td><img src="{{ asset('/storage/images/products_images/'.$product['image_path']) }}" alt="{{ $product['image_path'] }}" width="100"></td>
                                        <td>
                                            <a href="/products/{{ $product['id'] }}/edit"><i class="fa fa-edit"></i></a>
                                            <a href="#"  data-toggle="modal" data-target="#deleteModal" data-productid="{{$product['id']}}"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                                </table>
                            </div>

                            </div>

                    <!-- fin tabla -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <!-- delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Estas seguro que quieres eliminar el producto?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">Selecciona "Eliminar" si deseas eliminar el producto.</div>
            <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <form method="POST" action="/products/{{ $product->id }}">
                @method('DELETE')
                @csrf
                <input type="hidden" id="product_id" name="product_id" value="DELETE">
                <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Eliminar</a>
            </form>
            </div>
        </div>
        </div>
    </div>
@endsection

@section('js_product_page')
    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var product_id = button.data('productid') 

            var modal = $(this)
            modal.find('.modal-footer #product_id').val(product_id)
        })
    </script>
@endsection
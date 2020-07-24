



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
                    <!-- Header -->
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
									<h3 class="mb-0">Listado Categorías</h3>
								</div>
								<div class="col-4 text-right">
									<a href="/categories/create" class="btn btn-sm btn-success">Agregar Categoría</a>
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
                                    <th class="table-head">Descripcion</th>
                                    <th class="table-head">Imagen</th>
                                    <th class="table-head">Orden</th>
                                    <th class="table-head">Estado</th>
                                    <th class="table-head">Herramientas</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->nombre }}</td>
                                        <td>{!! getShorterString($category['descripcion'], 50) !!}</td>
                                        <td><img src="{{ asset('/storage/images/categories_images/'.$category['image_url']) }}" alt="{{ $category['image_url'] }}" width="100"></td>
                                        <td>{{ $category->orden }}</td>
                                        <td>
                                            @if($category->estado == 0)
                                                Activa
                                            @else
                                                Inactiva
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/categories/{{ $category['id'] }}/edit"><i class="fa fa-edit"></i></a>
                                            <a href="#"  data-toggle="modal" data-target="#deleteModal" data-categoryid="{{$category['id']}}"><i class="fas fa-trash-alt"></i></a>
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
            <h5 class="modal-title" id="exampleModalLabel">Estas seguro que quieres eliminar la categoría?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">Selecciona "Eliminar" si deseas eliminar la categoría.</div>
            <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <form method="POST" action="/categories/{{ $category->id }}">
                @method('DELETE')
                @csrf
                <input type="hidden" id="category_id" name="category_id" value="DELETE">
                <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Eliminar</a>
            </form>
            </div>
        </div>
        </div>
    </div>
@endsection

@section('js_category_page')
    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var category_id = button.data('categoryid') 

            var modal = $(this)
            modal.find('.modal-footer #category_id').val(category_id)
        })
    </script>
@endsection


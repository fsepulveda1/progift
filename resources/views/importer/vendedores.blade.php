@extends('admin.layout')

@section('content')
    <div class="page-content container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4 style="margin: 0; padding: 10px">Vendedores</h4></div>
                    <div class="panel-body" style="padding-top: 10px">
                        <p>Tenga en cuenta que al editar un mail de una vendedora, se actualizaran todos los RUTs asociados a ese email.
                            Proceda con cautela.</p>

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade in show" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif
                        <form method='post' action='{{ route('email.vendedores') }}' enctype='multipart/form-data' class="form-horizontal">
                            {{ csrf_field() }}

                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>#</th>
                                    <th>Vendedor</th>
                                    <th>Acciones</th>
                                </tr>
                                @foreach($emails as $key=>$email)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            <span class="text-email">{{ $email }}</span>
                                            <input class="form-control hide" name="emails[{{$key}}][new]" type="text" value="{{ $email }}">
                                            <input class="form-control"  name="emails[{{$key}}][old]" type="hidden" value="{{ $email }}">
                                        </td>
                                        <td>
                                            <div class="botonera_default">
                                                <a data-toggle="tooltip" title="" href="#" class="btn btn-warning btn-sm btn_edit" data-original-title="Editar"><i class="glyphicon glyphicon-pencil"></i></a>
                                            </div>
                                            <div class="botonera_oculta hide">
                                                <a data-toggle="tooltip" title="" href="#" class="btn btn-danger btn-sm btn_cancel" data-original-title="Cancelar Edición"><i class="fa fa-minus"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <input type="submit" value="Guardar Cambios" class="btn btn-primary pull-right">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ voyager_asset('js/app.js') }}"></script>
    <script>
        $('.btn_edit').click(function (e) {
            e.preventDefault();
            var row = $(this).closest('tr');
            row.find('input[type="text"]').removeClass('hide');
            row.find('.text-email').addClass('hide');
            row.find('.botonera_default').addClass('hide');
            row.find('.botonera_oculta').removeClass('hide');
        });

        $('.btn_cancel').click(function (e) {
            e.preventDefault();
            var row = $(this).closest('tr');
            row.find('input[type="text"]').addClass('hide');
            row.find('.text-email').removeClass('hide');
            row.find('input[type="text"]').val(row.find('input[type="hidden"]').val());
            row.find('.botonera_default').removeClass('hide');
            row.find('.botonera_oculta').addClass('hide');
        });

        $('[data-toggle="tooltip"]').tooltip({});
    </script>
    <script>
                @if($errors->has('file'))
        let alerts = {!! json_encode($errors->first('file')) !!};
        toastr.error(alerts)
        @endif
    </script>
@endsection